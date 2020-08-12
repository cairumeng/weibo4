<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weibo</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="d-flex flex-column bd-highlight mb-3">
    <div class="container">
        <div class="p-2 bd-highlight">
            @include('layouts._header')
        </div>
        <div class="p-2 bd-highlight mt-5">
            @include('shared._messages')
            @yield('content')
        </div>
    </div>
    @include('layouts._footer')

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>