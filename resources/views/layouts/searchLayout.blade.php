@include('components.head.main')
@include('components.header.main')
@include('components.main.side.filter')
<div class="main_contents">
    @yield('content')
</div>
@include('components.footer.main')