
@extends('master')

@section('content')
<div class="container">
    <h1>Rider Dashboard </h1>
    <div id="assignments">

    </div>
</div>
@endsection

@section('scripts')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="/js/echo.js"></script>
<script>
$(document).ready(function() {
    // Set up Laravel Echo
    window.Echo.channel('rider.' + {{ auth()->id() }})
        .listen('.DeliveryAssigned', (e) => {
            let assignmentHtml = `
                <div class="assignment" id="assignment-${e.assignment_id}">
                    <p>New delivery from ${e.restaurant_name}</p>
                    <p>Total: $${e.order_total_price}</p>
                    <button class="accept-delivery" data-id="${e.assignment_id}">Accept</button>
                    <button class="reject-delivery" data-id="${e.assignment_id}">Reject</button>
                </div>
            `;
            $('#assignments').append(assignmentHtml);
        });

    // Accept delivery
    $(document).on('click', '.accept-delivery', function() {
        let assignmentId = $(this).data('id');
        axios.post(`/rider/delivery/accept/${assignmentId}`)
            .then(response => {
                alert('Delivery accepted!');
                $(`#assignment-${assignmentId}`).remove();
            });
    });

    // Reject delivery
    $(document).on('click', '.reject-delivery', function() {
        let assignmentId = $(this).data('id');
        axios.post(`/rider/delivery/reject/${assignmentId}`)
            .then(response => {
                alert('Delivery rejected!');
                $(`#assignment-${assignmentId}`).remove();
            });
    });
});
</script>
@endsection
