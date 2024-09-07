<!-- resources/views/search.blade.php -->

@extends('master.app')

@section('content')
<div class="container">
    <h1>Search Restaurants</h1>
    <form id="search-form">
        <label for="area">Select Area:</label>
        <select id="area" name="area_id" required>
            <option value="">Select Area</option>
            <!-- Areas will be populated here dynamically -->
        </select>
        <button type="submit">Search</button>
    </form>

    <div id="restaurant-list">
        <!-- Restaurants will be displayed here -->
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Fetch areas on page load
    axios.get('/api/areas')
        .then(function(response) {
            const areas = response.data;
            areas.forEach(function(area) {
                $('#area').append(new Option(area.name, area.id));
            });
        })
        .catch(function(error) {
            console.error('Error fetching areas:', error);
        });

    // Handle form submission
    $('#search-form').on('submit', function(e) {
        e.preventDefault();

        const areaId = $('#area').val();
        axios.get('/api/search-restaurants', {
            params: { area_id: areaId }
        })
        .then(function(response) {
            const restaurants = response.data;
            let html = '<ul>';
            restaurants.forEach(function(restaurant) {
                html += `<li><a href="/restaurant/${restaurant.id}/menu">${restaurant.name}</a> - ${restaurant.address}</li>`;
            });
            html += '</ul>';
            $('#restaurant-list').html(html);
        })
        .catch(function(error) {
            console.error('Error fetching restaurants:', error);
        });
    });
});
</script>
@endsection
