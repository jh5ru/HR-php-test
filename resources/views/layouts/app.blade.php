<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description',config('site.description'))">
    <title>@yield('title',config('site.title'))</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Начал с Bootstrap 4 с webpack (scss), после того, как прочитал ещё раз тестовое задание, пришлось в быстром темпе всё переделывать на 3 bootstrap  /-->
</head>
<body>
<div class="container" id="app">


    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item @if($current == '/') active @endif">
                        <a class="nav-link" href="{{route('home')}}">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(strpos($current, 'weather') == true) active @endif">
                        <a class="nav-link" href="{{route('weather')}}">Погода</a>
                    </li>
                    <li class="nav-item @if(strpos($current, 'order') == true) active @endif">
                        <a class="nav-link" href="{{route('order')}}">Cписок заказов</a>
                    </li>
                    <li class="nav-item @if(strpos($current, 'product') == true) active @endif">
                        <a class="nav-link" href="{{route('product')}}">Список продуктов</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    @if (session('status'))
        <div class="alert alert-{{session('status')}} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{ session('text') }}
        </div>
    @endif

    @yield('content')

    @includeIf('partials.footer')

</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>


</body>
</html>
