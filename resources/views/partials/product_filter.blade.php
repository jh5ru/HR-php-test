<div class="pull-right">
    <form class="form" method="post" action="{{url('product')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <select name="order" class="form-control filter">
                <option value="desc" @if(Request::route('order') == 'desc') selected="selected" @endif>По возрастанию</option>
                <option value="asc" @if(Request::route('order') == 'asc') selected="selected" @endif>По убыванию</option>
            </select>

        </div>
    </form>
</div>
<div class="clearfix"></div>
