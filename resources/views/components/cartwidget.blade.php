
<div class="cart-widget p-3" style="display: none;">

    @if($total < $restaurant->minimum_order)
        <span class="min-order d-block mb-2"><small style="color: red;">Comanda minima necesara: <strong>{{ $restaurant->minimum_order }} RON</strong></small></span>
    @else
        <span class="min-order d-block mb-2"><small>Comanda minima indeplinita!</small></span>
    @endif

    <ul class="m-0 list-unstyled list-group list-group-vertical"></ul>
    <div class="total text-right mt-3">
        <span class="d-block mb-3">Total: <strong></strong></span>

        @if($total > $restaurant->minimum_order)
            <a href="/order" class="btn btn-success">Comanda</a>
        @endif

    </div>
</div>

<script type="text/javascript">

    $.ajax({
        url: '/checkout',
        type: 'GET',
        dataType: 'json',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success:function(data) {

            if(data.items.length > 0) {

                $('.cart-widget').show().addClass('active');
                $('.cart-widget').attr('data-restaurant', data.items[0].restaurants_id);

                $('.cart-widget .total strong').text(data.total + ' RON');

                for( var i = 0; i < data.items.length; i++ ) {
                    console.log(data.items[i])
                    $('.cart-widget ul').append('<li class="d-flex align-items-start justify-content-between list-group-item">\n' +
                    '            <span class="left-info">\n' +
                    '                <span class="name d-block"><strong>'+ data.items[i].name +'</strong></span>\n' +
                    '                <span class="qty d-block"><small>Cantitate: '+ data.items[i].quantity +'</small></span>\n' +
                    '            </span>\n' +
                    '            <span class="right-info">\n' +
                    '                <span class="price d-block"><small>'+ data.items[i].productTotal +' RON</small></span>\n' +
                    '                <span class="remove d-block text-right"><small><a onclick="removeCartItem('+ data.items[i].checkout_id +')" href="javascript:void(0)" data-product-item="'+ data.items[i].id +'" data-cart-remove="'+ data.items[i].checkout_id +'">sterge</a></small></span>\n' +
                    '            </span>\n' +
                    '        </li>');
                }

            }

        },
    });

    var removeCartItem = function($checkout_id) {

        $(document).on('click', '.cart-widget .remove', function() {
            $.ajax({
                url: '/checkout/' + $checkout_id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success:function(data) {
                    if(data.success) {
                        window.location.reload();
                    }
                },
            });
        });

    };

</script>
