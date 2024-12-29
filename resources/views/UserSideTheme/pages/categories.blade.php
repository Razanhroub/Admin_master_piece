@extends('UserSideTheme.masters.master')
@section('herotitle')
Categories
@endsection

@section('breadcrumbs')
    categories
@endsection
@section('categories-active', 'active')
@section('content')
@include('UserSideTheme.pages.home.homecategories')
@endsection