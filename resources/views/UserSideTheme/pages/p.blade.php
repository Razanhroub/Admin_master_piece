@extends('UserSideTheme.pages.profile.profile')
@section('active-blogs')
active show
@endsection

@section('main_content')
<!-- begin profile-content -->
<div class="profile-content">
    <!-- begin tab-content -->
    <div class="tab-content p-0">
        <!-- begin #profile-post tab -->
        <div class="tab-pane fade active show" id="profile-post">
            <!-- begin timeline -->
            <ul class="timeline">
                <li>
                    <!-- begin timeline-time -->
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <!-- end timeline-time -->
                    <!-- begin timeline-icon -->
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <!-- end timeline-icon -->
                    <!-- begin timeline-body -->
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="userimage"><img
                                    src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                    alt=""></span>
                            <span class="username"><a href="javascript:;">{{ session('username') }}</a>
                                <small></small></span>
                        </div>
                        <div class="timeline-content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
                                faucibus turpis quis tincidunt luctus.
                                Nam sagittis dui in nunc consequat, in imperdiet nunc sagittis.
                            </p>
                        </div>
                        <div class="timeline-likes">
                            <div class="stats-right">
                                <span class="stats-text">21 Comments</span>
                            </div>
                            <div class="stats">
                                <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                </span>
                                <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="stats-total">4.3k</span>
                            </div>
                        </div>
                        <div class="timeline-footer">
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-bookmark fa-fw fa-lg m-r-3"></i> save</a>
                        </div>
                        <div class="timeline-comment-box">
                            <div class="user"><img
                                    src="https://bootdey.com/img/Content/avatar/avatar3.png"></div>
                            <div class="input">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded-left"
                                            placeholder="Write a comment...">
                                        <button class="btn btn-custom-primary f-s-12 rounded-right" type="button">Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end timeline-body -->
                </li>
                <li>
                    <!-- begin timeline-time -->
                    <div class="timeline-time">
                        <span class="date">yesterday</span>
                        <span class="time">20:17</span>
                    </div>
                    <!-- end timeline-time -->
                    <!-- begin timeline-icon -->
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <!-- end timeline-icon -->
                    <!-- begin timeline-body -->
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="userimage"><img
                                    src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                    alt=""></span>
                            <span class="username">{{ session('username') }}</span>
                        </div>
                        <div class="timeline-content">
                            <p>Location: United States</p>
                        </div>
                        <div class="timeline-footer">
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-bookmark fa-fw fa-lg m-r-3"></i> save</a>
                        </div>
                    </div>
                    <!-- end timeline-body -->
                </li>
                <li>
                    <!-- begin timeline-time -->
                    <div class="timeline-time">
                        <span class="date">24 February 2014</span>
                        <span class="time">08:17</span>
                    </div>
                    <!-- end timeline-time -->
                    <!-- begin timeline-icon -->
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <!-- end timeline-icon -->
                    <!-- begin timeline-body -->
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="userimage"><img
                                    src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                    alt=""></span>
                            <span class="username">{{ session('username') }}</span>
                        </div>
                        <div class="timeline-content">
                            <p class="lead">
                                <i class="fa fa-quote-left fa-fw pull-left"></i>
                                Quisque sed varius nisl. Nulla facilisi. Phasellus consequat sapien
                                sit amet nibh molestie placerat. Donec nulla quam, ullamcorper ut
                                velit vitae, lobortis condimentum magna. Suspendisse mollis in sem
                                vel mollis.
                                <i class="fa fa-quote-right fa-fw pull-right"></i>
                            </p>
                        </div>
                        <div class="timeline-footer">
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-bookmark fa-fw fa-lg m-r-3"></i> save</a>
                        </div>
                    </div>
                    <!-- end timeline-body -->
                </li>
                <li>
                    <!-- begin timeline-time -->
                    <div class="timeline-time">
                        <span class="date">10 January 2014</span>
                        <span class="time">20:43</span>
                    </div>
                    <!-- end timeline-time -->
                    <!-- begin timeline-icon -->
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <!-- end timeline-icon -->
                    <!-- begin timeline-body -->
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="userimage"><img
                                    src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                    alt=""></span>
                            <span class="username">{{ session('username') }}</span>
                        </div>
                        <div class="timeline-content">
                            <h4 class="template-title">
                                795 Folsom Ave, Suite 600 San Francisco, CA 94107
                            </h4>
                            <p>In hac habitasse platea dictumst. Pellentesque bibendum id sem nec
                                faucibus. Maecenas molestie, augue vel accumsan rutrum, massa mi
                                rutrum odio, id luctus mauris nibh ut leo.</p>
                            <p class="m-t-20">
                                <img src="../assets/img/gallery/gallery-5.jpg" alt="">
                            </p>
                        </div>
                        <div class="timeline-footer">
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                    class="fa fa-bookmark fa-fw fa-lg m-r-3"></i> save</a>
                        </div>
                    </div>
                    <!-- end timeline-body -->
                </li>
                <li>
                    <!-- begin timeline-icon -->
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <!-- end timeline-icon -->
                    <!-- begin timeline-body -->
                    <div class="timeline-body">
                        Loading...
                    </div>
                    <!-- begin timeline-body -->
                </li>
            </ul>
            <!-- end timeline -->
        </div>
        <!-- end #profile-post tab -->
    </div>
    <!-- end tab-content -->
</div>
<!-- end profile-content -->
@endsection
