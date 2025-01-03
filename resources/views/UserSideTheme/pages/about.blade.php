@extends('UserSideTheme.masters.master')
@section('herotitle')
    About us
@endsection
@section('breadcrumbs')
    about
@endsection
@section('about-active', 'active')

@section('content')
    @include('UserSideTheme.pages.aboutussections.aboutdishlicious')
    @include('UserSideTheme.pages.aboutussections.percentage', [
        'blogPostsCount' => $blogPostsCount,
        'activeUsersCount' => $activeUsersCount,
        'recipesCount' => $recipesCount,
        'ingredientsCount' => $ingredientsCount
    ])    @include('UserSideTheme.pages.aboutussections.values')
    @include('UserSideTheme.pages.aboutussections.testimonials')
    @include('UserSideTheme.pages.aboutussections.creator')
    
 
@endsection
