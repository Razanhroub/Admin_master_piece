<!DOCTYPE html>
<html lang="en">

@include('theme.partials.head')

<body>

   @include('theme.partials.preloader')

    
    <div id="main-wrapper">

       @include('theme.partials.nav')

        @include('theme.partials.sidebar')

        
        @yield('content')
       
        @include('theme.partials.footer')

    </div>
   @include('theme.partials.scripts')

</body>

</html>
