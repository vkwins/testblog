<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang="{{ config('app.locale') }}">

@include('layouts.linkhead')
<body>
    @include('layouts.header')
         @yield('content')
                    

  @include('layouts.footer')

   
    </body>
</html>         