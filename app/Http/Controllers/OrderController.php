<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index()
    {
        $model['overdue'] = $this->getOrders('overdue');
        $model['current'] = $this->getOrders('current');
        $model['new'] = $this->getOrders('new');
        $model['success'] = $this->getOrders('success');
        return view('order.index', compact('model'));
    }

    public function edit($id)
    {
        $model = Order::with('partner', 'order_products')->findOrFail($id);
        return view('order.edit', compact('model'));
    }


    public function save(Request $request, $id)
    {

        $messages = [
            'status.required' => 'Не выбран статус заказа!',
            'partner_id.required' => 'Идентификатор партнёра не найден!',
            'partner_id.exists' => 'Идентификатор партнёра не найден!',
            'partner_name.required' => 'Поле партнёр не заполнено!',
            'client_email.required' => 'Поле email клиента не заполнено!',
            'client_email.email' => 'Поле email клиента не содержит Email адрес!',
        ];

        $request->validate([
            'status' => [
                'required', 'integer',
                Rule::in([0, 10, 20]),
            ],
            'partner_name' => 'required|max:255|min:2',
            'partner_id' => 'required|integer|exists:partners,id',
            'client_email' => 'required|email|min:2|max:255',
        ], $messages);

        $model = Order::with('partner')->findOrFail($id);
        $model->client_email = $request->client_email;
        $model->status = $request->status;
        $model->partner->name = $request->partner_name;
        $model->save();
        $model->partner->save();
        return redirect()->back()->with(['text' => 'Заказ №' . $model->id . ' успешно обновлен! (' . Carbon::now()->toDateTimeString() . ')', 'status' => 'success']);

    }

    private function getOrders($type = 'new')
    {
        return Order::with(['partner', 'order_products'=>function($q){
           //$q->append('total');
        }])->$type()->get();
    }

}
