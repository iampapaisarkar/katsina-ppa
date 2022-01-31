@include('layouts.headers.sidebar')
<!--=============== Left side End ================-->
@include('layouts.headers.app')
<!-- ============ Body content start ============= -->
@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- Footer Start -->
@include('layouts.footers.app') 
<!-- Footer end -->