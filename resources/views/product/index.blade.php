@extends('layouts.app')
@section('title', 'Список продуктов' )
@section('description',  'Список продуктов описание' )
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title pull-left">Список продуктов</h3>
            @includeIf('partials.product_filter')
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>ид продукта</th>
                    <th>наименование продукта</th>
                    <th>наименование поставщика</th>
                    <th>цена</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->vendor->name}}</td>
                        <td>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control price" data-product-id="{{$item->id}}" name="price" value="{{number_format($item->price,2)}}">
                                    <div class="input-group-addon">Руб.</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">{{$model->links()}}</div>
    </div>

@endsection

