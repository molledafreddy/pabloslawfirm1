<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ url('css/vue2-animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico">
    <title>{{ env('app.name', 'PablosLawFirm') }}</title>
</head>
    <body>
        <div id="app" class="container-fluid pl-0 pr-0">
            <div class="container-fluid pl-0 pr-0">
                <nav-bar/>
            </div>
            <div class="container-fluid pl-0 pr-0" style="padding-bottom: 3rem;">
                <router-view></router-view>
            </div>
            <div class="container-fluid footer pl-0 pr-0">
                <foot/>
            </div>
        </div>
        <script src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/vue.table/1.5.3/vue-table.js"></script>
        @yield('scripts')
    </body>
</html>