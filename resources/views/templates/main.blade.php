<!DOCTYPE html>
<html lang="ru">
@include('components.head')
<body>
    <div class="wrapper">
        @include('components.header')
        <main class="main">
            @yield('content')
        </main>
        @include('components.footer')
    </div>
</body>
</html>
