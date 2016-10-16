<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bird Database 1.0</title>

    <!-- Bootstrap CSS served from a CDN -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<body>
<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar>"></span>
                <span class="icon-bar>"></span>
                <span class="icon-bar>"></span>
            </button>

            <a class="navbar-brand" href="/">Bird Observations</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <a href="/birds">Birds</a>
                </li>
                <li>
                    <a href="/locations">Locations</a>
                </li>
                <li class="active">
                    <a href="/observations">Observations</a>
                </li>
                <li class="active">
                    <a href="/persons">Persons</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success {{Session::has('flash_message_important') ? 'alert-important' : ''}}">
                @if(Session::has('flash_message_important'))
                    <button type="'button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @endif

                {{session('flash_message')}}
            </div>
        @endif
    </div>
    <script>$('div.alert').not('.alert-important').delay(3000).slideUp(300)</script>
    @yield('content')
    @yield('addcontent')
</div>
</body>
</html>