@extends('UserSideTheme.masters.master')
@section('herotitle')
    Our Blogs
@endsection
@section('breadcrumbs')
    blogs
@endsection
@section('blog-active', 'active')
@section('content')
    <section style="background: rgb(240,240,240)">
        <div class="container">
            <div class="col-12 d-flex justify-content-end">
                <a href="createblog" class="btn btn-primary mt-3 mr-3 ml-3">Create Blog</a>
            </div>
        </div>
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
                        <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                alt=""></span>
                        <span class="username"><a href="javascript:;">{{ session('username') }}
                                {{ session('userlastname') }}</a>
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
                        <div class="user"><img src="https://bootdey.com/img/Content/avatar/avatar3.png"></div>
                        <div class="input">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-left"
                                        placeholder="Write a comment...">
                                    <button class="btn btn-custom-primary f-s-12 rounded-right"
                                        type="button">Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end timeline-body -->
            </li>
        </ul>
        </div>

    </section>

@endsection
