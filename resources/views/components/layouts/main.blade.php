<!DOCTYPE html>
<html lang="en" data-theme="royal">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=alegreya:400|alegreya-sans:400" rel="stylesheet" />
    <title>{{$title ?? env('APP_NAME')}}</title>
    @vite('resources/js/app.js')
</head>

<body class="bg-base-100">
    <x-navigation></x-navigation>
    {{$slot}}
</body>

</html>