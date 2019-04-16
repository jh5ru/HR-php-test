@extends('layouts.app')
@section('title', 'Погода' )
@section('description',  'Описание сервиса погода' )
@section('content')

    <!-- Данные кешируются на 60 минут (у яндекс api многое теперь только на тестовый период), в Laravel 5.8 который я сейчас использую, уже на 60 секунд.  /-->

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div style="margin: 0 auto"><img style="height: 100px;" src="{{$model['icon']}}"></div>
                <h5 class="card-title">Погода в Брянске</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Температура: {{$model['temp']}} °C</li>
                    <li class="list-group-item">Ощущаемая температура: {{$model['like']}} °C</li>
                    <li class="list-group-item">Скорость ветра: {{$model['wind']}} м/с</li>
                    <li class="list-group-item">Давление: {{$model['pressure']}} мм рт. ст.</li>
                </ul>
            </div>
            <div class="panel-footer">Данные получены: {{$model['date']->diffForHumans()}}</div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div style="margin: 0 auto"><img style="height: 100px;" src="{{$model['icon']}}"></div>
                <h5 class="card-title">Погода</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Температура: {{$model['temp']}} °C</li>
                </ul>
            </div>
            <div class="panel-footer">Данные получены: {{$model['date']->diffForHumans()}}</div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div style="margin: 0 auto"><img style="height: 100px;" src="{{$model['icon']}}"></div>
                <h5 class="card-title">Погода</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Температура: {{$model['temp']}} °C</li>
                </ul>
            </div>
            <div class="panel-footer">Данные получены: {{$model['date']->diffForHumans()}}</div>
        </div>
    </div>

@endsection

