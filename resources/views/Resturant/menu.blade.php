<!-- resources/views/menu.blade.php -->

@extends('master.app')

@section('content')
<div class="container">
    <h1>{{ $restaurant->name }} Menu</h1>
    <form id="order-form">
        <ul>
            @foreach($menus as $menu)
            <li>
                <input type="checkbox" name="items[]" value="{{ $menu->id }}" data-price="{{ $menu->price }}">
                {{ $menu->item_name }} - ${{ $menu->price }}
            </li>
            @endforeach
        </ul>
        <input type="hidden" id="restaurant-id" value="{{ $restaurant->id }}">
        <input type="hidden" id="total-price" name="total_price" value="0">
        <p>Total: $<span id="total">0.00</span></p>
        <button type="submit">Place Order</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Calculate total price
    $('input[name="items[]"]').on('change', function() {
        let total = 0;
        $('input[name="items[]"]:checked').each(function() {
            total += parseFloat($(this).data('price'));
        });
        $('#total').text(total.toFixed(2));
        $('#total-price').val(total.toFixed(2));
    });

    // Handle form submission
    $('#order-form').on('submit', function(e) {
        e.preventDefault();

        const restaurantId = $('#restaurant-id').val();
        const totalPrice = $('#total-price').val();
        const items = $('input[name="items[]"]:checked').map(function() {
            return {
                menu_id: $(this).val(),
                quantity: 1, // Assume 1 for simplicity
                price: $(this).data('price')
            };
        }).get();

        axios.post('/api/place-order', {
            restaurant_id: restaurantId,
            total_price: totalPrice,
            items: items
        })
        .then(function(response) {
            alert('Order placed successfully!');
            window.location.href = '/orders';
        })
        .catch(function(error) {
            console.error('Error placing order:', error);
        });
    });
});
</script>
@endsection
