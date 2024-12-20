<!DOCTYPE html>
<html lang="en">

@include('UserSideTheme.partials.head')

<body>

    @include('UserSideTheme.partials.nav')
    {{-- nav --}}

    @include('UserSideTheme.partials.heropages')
    {{-- heropages --}}


    @yield('content')
    {{-- content --}}

    @include('UserSideTheme.partials.footer')
    {{-- footer --}}

    @include('UserSideTheme.partials.loader')
    {{-- loader --}}

    @include('UserSideTheme.partials.scripts')
    {{-- scripts --}}

</body>

</html>
