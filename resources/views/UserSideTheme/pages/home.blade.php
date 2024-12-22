@extends('UserSideTheme.masters.masterwithslider')
@section('home-active', 'active')
@section('content')
    @include('UserSideTheme.pages.aboutussections.aboutdishlicious')
    @include('UserSideTheme.pages.aboutussections.percentage')
    @include('UserSideTheme.pages.aboutussections.values')


    @include('UserSideTheme.pages.home.menus')

    @include('UserSideTheme.pages.aboutussections.testimonials')
    @include('UserSideTheme.pages.aboutussections.creator')


@endsection
