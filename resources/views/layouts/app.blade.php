<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Studio | Starter Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <link href="assets/css/vendor.min.css" rel="stylesheet"/>
    <link href="assets/css/app.min.css" rel="stylesheet"/>

</head>
<body>
<div id="app" class="app">
    @include('layouts.includes._header')
    @include('layouts.includes._navbar')

    <div id="content" class="app-content">
        @yield('content')
    </div>

    @include('layouts.includes._footer')
</div>

<script src="assets/js/vendor.min.js" type="text/javascript"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>

</body>
</html>
