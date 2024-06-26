<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClientSubUsers extends Model
{
    use HasFactory;

    protected $table = 'user_client_subusers';

    protected $fillable = [
        'ref_client_id', 'name', 'email', 'password', 'phone', 'status', 'configuration', 'call_log_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
