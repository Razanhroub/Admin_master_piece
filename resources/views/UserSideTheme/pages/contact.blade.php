@extends('UserSideTheme.masters.master')
@section('herotitle')
    Contact us
@endsection
@section('breadcrumbs')
    contact
@endsection
@section('contact-active', 'active')

@section('content')
    @include('UserSideTheme.pages.contact.contactinfo')
    @include('UserSideTheme.pages.contact.contactform')

@endsection
