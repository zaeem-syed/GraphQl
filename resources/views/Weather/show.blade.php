<!-- resources/views/weather/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity=""
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Weather Information</h1>
        <!-- Input field for city name -->
        <input type="text" id="city" placeholder="Enter city" value="New York" />
        <button id="fetch-weather">Get Weather</button>

        <!-- Display weather description and temperature -->
        <h2 id="weather-description"></h2>
        <h3 id="temperature"></h3>

        <!-- Container for the Lottie animation -->
        <div id="weather-animation" style="width: 400px; height: 400px;"></div>
    </div>

    <!-- jQuery and Lottie Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>

    <script>
        $(document).ready(function() {
            let animationInstance = null;

            function fetchWeather(city) {
                $.ajax({
                    url: '/api/weather',
                    method: 'GET',
                    data: {
                        city: city
                    },
                    success: function(response) {
                        const weather = response.weather[0];
                        const condition = weather.main.toLowerCase();
                        console.log("the weather", condition);
                        const description = weather.description;
                        const temperature = response.main
                            .temp; // Temperature directly from the API response

                        // Display weather description and temperature
                        $('#weather-description').text(description);
                        $('#temperature').text('Temperature: ' + temperature + '°C');

                        // Determine which animation to load
                        let animationPath = '';
                        if (condition.includes('cloud')) {
                            animationPath = '/animations/cloudy.json';
                        } else if (condition.includes('sun') || condition.includes('clear')) {
                            animationPath = '/animations/sunny.json';
                        } else if (condition.includes('rain')) {
                            animationPath = '/animations/rainy.json';
                        } else if (condition.includes('smoke')) {
                            animationPath = '/animations/smoke.json'; // Path to smoke animation
                        } else if (condition.includes('drizzle')) {
                            animationPath = '/animations/drizzle.json'; // Path to smoke animation
                        }

                        // Stop and clear the previous animation
                        if (animationInstance) {
                            animationInstance.destroy();
                        }

                        // Load the corresponding Lottie animation
                        animationInstance = lottie.loadAnimation({
                            container: document.getElementById('weather-animation'),
                            renderer: 'svg',
                            loop: true,
                            autoplay: true,
                            path: animationPath // Path to the JSON file
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching weather data:', error);
                    }
                });
            }

            // Fetch weather on page load
            fetchWeather($('#city').val());

            // Fetch weather when button is clicked
            $('#fetch-weather').on('click', function() {
                const city = $('#city').val();
                fetchWeather(city);
            });
        });
    </script>
</body>

</html>
