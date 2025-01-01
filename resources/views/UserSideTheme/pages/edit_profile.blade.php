@extends('UserSideTheme.masters.masteruserprofile')
@section('userprofile-active', 'active')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="row">
    <div class=" backgroundprofile col-md-12">
        <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
                <div class="profile-header">
                    <!-- BEGIN profile-header-cover -->
                    <div class="profile-header-cover"></div>
                    <!-- END profile-header-cover -->
                    <!-- BEGIN profile-header-content -->
                    <div class="profile-header-content">
                        <!-- BEGIN profile-header-img -->
                        <div class="profile-header-img">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="pfp">
                        </div>
                        <!-- END profile-header-img -->
                        <!-- BEGIN profile-header-info -->
                        <div class="profile-header-info">
                            <h4 class="m-t-10 m-b-5">{{ session('username') }}</h4>
                            <p class="m-b-10">UXUI + Frontend Developer</p>
                            <a href="#" class="btn btn-sm btn-info mb-2">Edit Profile</a>
                        </div>
                        <!-- END profile-header-info -->
                    </div>
                    <!-- END profile-header-content -->
                    <!-- BEGIN profile-header-tab -->
                    <ul class="profile-header-tab nav nav-tabs">
                        <li class="nav-item">
                            <a href="https://www.bootdey.com/snippets/view/bs4-profile-with-timeline-posts" target="__blank" class="nav-link_">blogs</a></li>
                        <li class="nav-item">
                            <a href="edit-profile" class="nav-link_">edit profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.bootdey.com/snippets/view/bs4-profile-friend-list" target="__blank" class="nav-link_ active show">followers</a>
                        </li>
                    </ul>
                    <!-- END profile-header-tab -->
                </div>
            </div>
            <!-- end profile -->
            @yield('main_content')
        </div>
    </div>
</div>
@endsection