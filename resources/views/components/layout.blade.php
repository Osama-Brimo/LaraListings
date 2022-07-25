<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('app.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>LaraListings</title>
</head>

<body>



    <x-navbar></x-navbar>

    <x-flash></x-flash>

    <div id="site-content">
        {{ $slot }}
    </div>

    @unless (isset($displayFooter) && !$displayFooter)
        <x-footer></x-footer>
    @endunless


</body>

</html>
