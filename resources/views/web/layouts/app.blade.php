<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/real-villa/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jan 2024 07:49:32 GMT -->

<head>
    @include('web.layouts.head.meta-data')

    @include('web.layouts.head.style')
</head>

<body>

    <!--=================================
    header -->
    @include('web.layouts.navigation.main')
    @include('web.layouts.modal.login')


    <!--=================================
   header -->

   @yield('contents')

@include('web.layouts.footer')
    @include('web.layouts.scripts')

</body>


</html>
