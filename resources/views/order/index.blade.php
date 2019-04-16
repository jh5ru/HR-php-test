@extends('layouts.app')
@section('title', 'Список заказов' )
@section('description',  'Список заказов описание' )
@section('content')



    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Список заказов</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#panel1">просроченные</a></li>
                <li><a data-toggle="tab" href="#panel2">текущие</a></li>
                <li><a data-toggle="tab" href="#panel3">новые</a></li>
                <li><a data-toggle="tab" href="#panel4">выполненные</a></li>
            </ul>

            <div class="tab-content">
                <div id="panel1" class="tab-pane fade in active">
                    @includeIf('partials.order_table',['model'=>$model['overdue']])
                </div>
                <div id="panel2" class="tab-pane fade">
                    @includeIf('partials.order_table',['model'=>$model['current']])
                </div>
                <div id="panel3" class="tab-pane fade">
                    @includeIf('partials.order_table',['model'=>$model['new']])
                </div>
                <div id="panel4" class="tab-pane fade">
                    @includeIf('partials.order_table',['model'=>$model['success']])
                </div>
            </div>
        </div>
    </div>

@endsection

