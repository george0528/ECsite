@include('components.head.top')
@include('components.header.main')
@include('components.main.side.main')
<div class="main_contents">
    @yield('content')
</div>
@include('components.footer.main')

