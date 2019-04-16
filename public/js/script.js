$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.filter').bind('change',function(){
    window.location = '/product/'+ $(this).val()
});

$('.price').bind('change',function(){
    let product_id = $(this).data('product-id')
    let price = $(this)
    $.post('/product/save/'+product_id,{'price':price.val()},function(data){
        let result = JSON.parse(data)
        if(result.price) {
            price.val(result.price)
        }else{
            location.reload()
        }
    })
});
