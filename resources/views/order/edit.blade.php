@extends('layouts.app')
@section('title', 'Редактирование заказа' )
@section('description',  'Редактирование заказа описание' )
@section('content')


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Список заказов</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#panel1">Редактирование заказа №{{$model->id}}</a></li>
                        <li><a data-toggle="tab" href="#panel2">Состав заказа (Стоимость заказа: {{number_format($model->order_products->sum('price'),2)}} Руб.)</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="panel1" class="tab-pane fade in active">
                            <form class="form needs-validation" method="post" action="{{url('order/save',['id'=>$model->id])}}" novalidate>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">Стоимость заказа: {{number_format($model->order_products->sum('price'),2)}} Руб.</div>
                                        @includeIf('partials.form_order',$model)
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" value="Сохранить" class="btn btn-md btn-success col-2">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="panel2" class="tab-pane fade">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Наименование
                                    </th>
                                    <th>
                                        Количество
                                    </th>
                                    <th>
                                        Цена за штуку
                                    </th>
                                    <th>
                                        Сумма
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($model->order_products as $product)
                                    <tr>
                                        <td>
                                            {{$product->product->name}}
                                        </td>
                                        <td>
                                            {{$product->quantity}}
                                        </td>
                                        <td>
                                            {{number_format($product->price,2)}} Руб.
                                        </td>
                                        <td>
                                            {{number_format($product->total,2)}} Руб.
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection

