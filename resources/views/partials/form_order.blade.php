{{ csrf_field() }}

<div class="form-group">
    <label for="exampleFormControlInput1">Email клиента</label>
    <input name="client_email" required="required" value="{{$model->client_email}}" type="email" class="form-control"
           id="exampleFormControlInput1" placeholder="Email клиента">
    <small id="passwordHelpBlock" class="form-text text-muted">
        {{ $errors->first('client_email') }}
    </small>

</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Партнер</label>
    <input name="partner_name" required="required" value="{{$model->partner->name}}" type="text" class="form-control"
           id="exampleFormControlInput1" placeholder="Название партнёра">
    <input type="hidden" value="{{$model->partner->id}}" name="partner_id">
    <small id="passwordHelpBlock" class="form-text text-muted">
        {{ $errors->first('partner.name') }}
    </small>
</div>


<div class="form-group">
    <label for="exampleFormControlSelect1">Cтатус заказа</label>
    <select name="status" required="required" class="form-control" id="exampleFormControlSelect1">
        @foreach($model->statuses as $id=>$status)
        <option value="{{$id}}" @if($model->status === $status) selected="selected" @endif>{{$status}}</option>
       @endforeach
    </select>
    <small id="passwordHelpBlock" class="form-text text-muted">
        {{ $errors->first('status') }}
    </small>
</div>



