@extends('UserSideTheme.masters.master')

@section('herotitle')
    Our Blogs
@endsection

@section('breadcrumbs')
    blogs
@endsection

@section('blog-active', 'active')

@section('content')
    <section class="ftco-section" style="background: rgb(240,240,240)">
        <div class="container">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('createblog') }}" class="btn btn-primary mt-3 mr-3 ml-3">Create Blog</a>
            </div>
        </div>
        <ul class="timeline" id="blog-timeline">
            @foreach ($blogs as $blog)
                <li>
                    <div class="timeline-time">
                        <span class="date">{{ $blog->created_at->format('d M Y') }}</span>
                        <span class="time">{{ $blog->created_at->format('H:i') }}</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <div style="display: flex; justify-content:space-between">
                                <div>
                                    <span class="userimage"><img src="{{ asset('Userassets/images/profileimg.jpg') }}"
                                            alt="profile image"></span>
                                    <span class="username"><a href="javascript:;">{{ $blog->user->name }}
                                            {{ $blog->user->last_name }}</a></span>
                                </div>
                                <div class="icons" style="display: flex; justify-content: space-around; gap: 20px;">
                                    <p><i class="fas fa-user"></i>{{ $blog->recipe->ppl_number }}</p>
                                    <p><i class="fas fa-thermometer-half"></i>{{ $blog->recipe->oven_heat }}</p>
                                    <p><i class="fas fa-clock"></i> {{ $blog->recipe->recipe_time }} </p>
                                    <p><i class="fas fa-fire"></i> {{ $blog->recipe->calories }} per serving</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-content">
                            <h5>{{ $blog->recipe->recipe_name }}</h5>
                            @if ($blog->iframelink)
                                <div class="video-container">
                                    <iframe src="{{ $blog->iframelink }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            @elseif($blog->recipe->recipe_img)
                                <img src="{{ asset('Userassets/images/recipes/' . $blog->recipe->recipe_img) }}"
                                    alt="Recipe Image">
                            @endif
                            <p>{{ $blog->recipe->instructions }}</p>
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
                                    class="fa fa-bookmark fa-fw fa-lg m-r-3"></i> Save</a>
                        </div>
                        <div class="timeline-comment-box">
                            <div class="user"><img src="{{ asset('Userassets/images/profileimg.jpg') }}"></div>
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
                </li>
            @endforeach
        </ul>
        <div class="text-center">
            @if ($blogs->previousPageUrl())
                <a href="{{ $blogs->previousPageUrl() }}" id="prev-page" class="btn btn-primary">Previous</a>
            @endif
            @if ($blogs->nextPageUrl())
                <a href="{{ $blogs->nextPageUrl() }}" id="next-page" class="btn btn-primary">Next</a>
            @endif
        </div>
    </section>
@endsection