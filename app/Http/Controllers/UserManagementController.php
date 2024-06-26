<?php

namespace App\Http\Controllers;

use App\Models\UserClient;
use App\Models\UserClientSubUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    public function getPage()
    {
        $last_login_ip_address = session('last_login_ip_address');
        $last_login_time = session('last_login_time');
        $profile_pic = session('profile_pic');

        return view('user-management.index')
                    ->with('title', "User Management")
                    ->with('last_login_ip_address', $last_login_ip_address)
                    ->with('last_login_time', $last_login_time)
                    ->with('profile_pic', $profile_pic);
    }

    public function getAllSubUsers(Request $request)
    {
        try {

            // $validatedData = $request->validate([
            //     'client_id' => 'required',
            // ]);

            $client = UserClient::where('id', Auth::id())->first();
            $sub_users = UserClientSubUsers::where('ref_client_id', Auth::id())->get();
            $sub_users_count = $sub_users->count();

            $message = "Sub users list retrieved successfully";
            $status = true;

            return response()->json([
                'status' => $status,
                'message' => $message,
                'sub_user_list' => $sub_users,
                'sub_users_limit' => $client->sub_user_limit,
                'sub_users_count' => $sub_users_count,
                'page_name' => "User Management",
            ], 200);

        } catch (\Exception $e) {
            $message = 'Error: ' . $e->getMessage();
            $status = false;

            return response()->json(['status' => $status, 'message' => $message], 500);
        }
    }

    public function addUsers(Request $request)
    {
        $storage = new CreateStorage();

        try {

            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email', 
                'phone' => 'required|string',
                'password' => 'required',
                'profile_pic' => 'nullable|string', // Adjust as needed
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ], 422);
            }

            // Create a new user or sub-user
            $user = new UserClientSubUsers();
            $user->ref_client_id = 1;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->phone = $request->input('phone');
            $user->status = '1';
            $user->save();

            if ($request->has('profile_pic') && preg_match('/^data:image\/(\w+);base64,/', $request->input('profile_pic'), $matches)) {

                $imageExtension = $matches[1];
                $imageName = 'profile_pic.' . $imageExtension;
                $imageData = base64_decode(substr($request->input('profile_pic'), strpos($request->input('profile_pic'), ',') + 1));
    
                // Define the path to store the image
                $path = 'user/client_' . $user->id . '/' . $imageName;
                Storage::disk('files_disk')->put($path, $imageData); // Ensure 'public' disk is configured
    
                // Save the image path to the user
                $user->profile_pic = "https://files.ntscabs.com/public/skyvoice/" . $path;

                $user->save();

            }            

            // Return a successful response
            return response()->json([
                'status' => true,
                'message' => 'User added successfully',
                'user' => $user,
            ], 200);

        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }

    }

    public function updateUser(Request $request, $id)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email', // Ensure email is unique
                'phone' => 'required',
                'password' => 'required',
                // 'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as needed
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ], 422);
            }

            // Find the user or sub-user by ID
            $user = UserClientSubUsers::find($id);
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found',
                ], 404);
            }

            // Update user details
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');

            // Update password only if provided
            if ($request->filled('password')) {
                $user->password = $request->input('password');
            }

            // Handle file upload if there's a new profile picture
            // if ($request->hasFile('profile_pic')) {
            //     $image = $request->file('profile_pic');
            //     $imagePath = $image->store('profile_pics', 'public'); // Store in the 'public' disk
            //     $user->profile_pic = $imagePath;
            // }

            $user->save();

            // Return a successful response
            return response()->json([
                'status' => true,
                'message' => 'User updated successfully',
                'user' => $user,
            ], 200);

        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteUser($id)
    {
        try {
            // Find the user by id
            $subUser = UserClientSubUsers::where('ref_client_id', Auth::id())->where('id', $id)->first();

            // Check if user exists
            if (!$subUser) {
                return response()->json([
                    'status' => false,
                    'message' => 'Sub-user not found',
                ], 404);
            }

            // Delete the user
            $subUser->delete();

            return response()->json([
                'status' => true,
                'message' => 'User deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while deleting the sub-user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
