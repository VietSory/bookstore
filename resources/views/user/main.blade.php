<!doctype html>
<html lang="en">

<head>
    @include('user.head')
</head>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('user.sidebar')

        <!-- TOP Nav Bar -->
        @include('user.navbar')
        
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper END -->
    
    <!-- Footer -->
    @include('user.footer')
</body>

</html>
