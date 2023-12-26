<!DOCTYPE html>
<html lang="en">
@include('components.head')

<title>
    @yield('title')
</title>

<body>

    <div class="container">
        @include('components.navbar')

        <div class="flex-div">
            <div>
                @include('components.sidebar')
            </div>
            <main class="mt-5 mb-5">
                @include('components.errors')
                @include('components.status')
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
