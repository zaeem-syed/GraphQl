<!-- resources/views/orders.blade.php -->

@extends('master.app')

@section('content')
<div class="container">
    <h1>My Orders</h1>
    <div id="orders">
        <!-- Orders will be displayed here -->
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Fetch orders on page load
    axios.get('/api/orders')
        .then(function(response) {
            const orders = response.data;
            let html = '<ul>';
            orders.forEach(function(order) {
                html += `<li>Order #${order.id} - $${order.total_price} - Status: <span id="status-${order.id}">${order.delivery.status}</span></li>`;
            });
            html += '</ul>';
            $('#orders').html(html);
        })
        .catch(function(error) {
            console.error('Error fetching orders:', error);
        });

    // Listen for real-time order status updates
    window.Echo.channel('orders')
        .listen('OrderStatusUpdated', (event) => {
            $(`#status-${event.order.id}`).text(event.order.delivery.status);
        });
});
</script>
@endsection
