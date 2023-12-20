<!DOCTYPE html>
<html lang="en">
@include('components.head')

<title>
    @yield('title')
</title>

<body>
    <div class="container">
        @include('components.navbar')
        <main class="mt-5 mb-5">
            @yield('content')
        </main>
    </div>
</body>

</html>
