<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
    <title>@yield('title', '360°')</title>
</head>
<body>
    @include('../layouts/header')

    @yield('main')

    <script src="../javascript/modal.js"></script>
</body>
</html>
