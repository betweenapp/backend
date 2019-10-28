<!DOCTYPE html>
<html lang="{{ config('app.locale')  }}">
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="">

    <meta name="robots" content="noindex, nofollow">

    <title>Backend{{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>

</html>
<body>
<div id="backend" v-cloak>
</div>


<script src="{{asset('extensions.js')}}"></script>
<script src="{{asset('vendor/betweenapp/backend/main.js')}}"></script>
</body>
