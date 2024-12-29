@extends('UserSideTheme.masters.masterwithslider')
@section('userhome-active', 'active')
@section('content')
{{-- @foreach (session()->all() as $key => $value)
<li><strong>{{ $key }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</li>
@endforeach --}}
    @include('UserSideTheme.pages.aboutussections.aboutdishlicious')
    @include('UserSideTheme.pages.aboutussections.percentage')
    @include('UserSideTheme.pages.aboutussections.values')


    @include('UserSideTheme.pages.home.homecategories')

    @include('UserSideTheme.pages.aboutussections.testimonials')
    @include('UserSideTheme.pages.aboutussections.creator')


@endsection
