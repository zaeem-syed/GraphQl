<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <h1>Weather for {{ $weather['name'] }}</h1>
        <p>Temperature: {{ $weather['main']['temp'] }}°C</p>
        <p>Condition: {{ $weather['weather'][0]['description'] }}</p>

        <form action="{{ route('weather.show') }}" method="GET">
            <div class="form-group">
                <label for="city">Enter City:</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="City Name">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Get Weather</button>
        </form>
    </div>

</body>
</html>
