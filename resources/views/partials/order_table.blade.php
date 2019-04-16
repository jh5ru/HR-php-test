<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>ид заказа</th>
        <th>дата доставки</th>
        <th>название партнера</th>
        <th>стоимость заказа</th>
        <th>состав заказа</th>
        <th>статус заказа</th>
        <th>Управление</th>
    </tr>
    </thead>
    <tbody>
    @foreach($model as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->delivery_dt->diffForHumans()}}</td>
            <td>{{$item->partner->name}}</td>
            <td>{{number_format($item->order_products->sum('total'),2)}} Руб.</td>
            <td>
                <p>
                    <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample{{$item->id}}"
                       role="button" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
                        Показать состав заказа
                    </a>
                </p>
                <div class="collapse" id="collapseExample{{$item->id}}">
                    @foreach($item->order_products as $product)
                        <small>{{$product->product->name}}</small>
                        @if(!$loop->last) <br> @endif
                    @endforeach
                </div>
            </td>
            <td>{{$item->status}}</td>
            <td>
                <a class="btn btn-sm btn-success" href="{{url("/order/edit/{$item->id}")}}">
                    Редактировать
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
