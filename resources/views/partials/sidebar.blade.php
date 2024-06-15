<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar overflow-scroll">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img width="50" height="50" src="{{asset('assets/images/favicon.png')}}" alt="logo image" class="logo-lg">
            </a>
        </div>

        @include('partials.user_card')

        @include('partials.teacher_navigation')

    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
