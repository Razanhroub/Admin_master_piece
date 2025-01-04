<x-app-layout>
   <x-slot name="header">
       {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Dashboard') }}
       </h2> --}}
   </x-slot>

   
<html lang="en">

@include('theme.partials.head')

<body>

  @include('theme.partials.preloader')

   
   {{-- <div id="main-wrapper"> --}}

      @include('theme.partials.nav')

       @include('theme.partials.sidebar')

       
       @yield('content')
      
       @include('theme.partials.footer')

   {{-- </div> --}}
  @include('theme.partials.scripts')

</body>

</html>


</x-app-layout>
