@extends('layouts.app')
@section('title', 'Главная' )
@section('description',  'Главная страница' )
@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <div>Главная</div>
            <div hidden>{{hash('md5',sha1(md5(md5(null))))}}</div>
        </div>
        <div class="panel-footer">Главная страница</div>
    </div>

@endsection

