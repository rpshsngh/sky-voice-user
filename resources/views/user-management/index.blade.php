@extends('layout.index')

@section('individual_style')
    @include('user-management.style')
@endsection

@section('main_content')

    <div class="tab-content tab-transparent-content pb-0">

        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            
            <div class="row">

                @include('user-management.components.add_user')

                @include('user-management.components.user_details')

            </div>

            @include('user-management.components.view_users')

        </div>

    </div>

@endsection

@section('individual_script')
    @include('user-management.script')
@endsection