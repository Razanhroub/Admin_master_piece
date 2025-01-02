@extends('UserSideTheme.masters.masterwithslider')
@section('userhome-active', 'active')
@section('content')
    @include('UserSideTheme.pages.aboutussections.aboutdishlicious')
    @include('UserSideTheme.pages.aboutussections.percentage', [
        'blogPostsCount' => $blogPostsCount,
        'activeUsersCount' => $activeUsersCount,
        'recipesCount' => $recipesCount,
        'ingredientsCount' => $ingredientsCount
    ])
    {{-- @dd($blogPostsCount , $recipesCount , $ingredientsCount , $activeUsersCount) --}}
    @include('UserSideTheme.pages.home.homecategories', ['categories' => $categories])
    @include('UserSideTheme.pages.aboutussections.values')
    @include('UserSideTheme.pages.aboutussections.testimonials')
    @include('UserSideTheme.pages.aboutussections.creator')
@endsection