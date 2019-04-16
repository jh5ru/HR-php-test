<h2>Товары в заказе №{{ $orderId }}</h2>

<table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:2px solid #000000;">
    <tr>
        <td width="10%" bgcolor="#999999" style="padding:20px;">
            Ид
        </td>
        <td width="50%" bgcolor="#888888" style="padding:20px;">
            Наименование
        </td>
        <td width="50%" bgcolor="#888888" style="padding:20px;">
            Цена
        </td>
    </tr>
    @foreach($orderProducts as $product)
    <tr>
        <td width="10%" bgcolor="#777777" style="padding:20px;">
            {{$product->product->id}}
        </td>
        <td width="50%" bgcolor="#666666" style="padding:20px;">
            {{$product->product->name}}
        </td>
        <td width="50%" bgcolor="#666666" style="padding:20px;">
            {{number_format($product->product->price,2)}} Руб.
        </td>
    </tr>
    @endforeach
</table>


<div style="font-size:20px;margin-top:25px;">
    Общая сумма заказа: {{ $orderTotal }} Руб.
</div>

<style type="text/css">
    table td {border-collapse: collapse;}
</style>



