<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Information</title>
    <script>
        function sendLocation(latitude, longitude) {
            fetch('/save-location', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    latitude: latitude,
                    longitude: longitude
                })
            });
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    sendLocation(position.coords.latitude, position.coords.longitude);
                }, function(error) {
                    console.error("Error obtaining location: ", error);
                });
            } else {
                console.error("Geolocation is not supported by this browser.");
            }
        }

        window.onload = getLocation;
    </script>
</head>
<body>
<h1>Device Information</h1>
<ul>
    <li>IP Address: {{ $deviceInfo['ip'] }}</li>
    <li>Device: {{ $deviceInfo['device'] }}</li>
    <li>Platform: {{ $deviceInfo['platform'] }} (Version: {{ $deviceInfo['platform_version'] }})</li>
    <li>Browser: {{ $deviceInfo['browser'] }} (Version: {{ $deviceInfo['browser_version'] }})</li>
    <li>Is Desktop: {{ $deviceInfo['is_desktop'] ? 'Yes' : 'No' }}</li>
    <li>Is Mobile: {{ $deviceInfo['is_mobile'] ? 'Yes' : 'No' }}</li>
    <li>Is Tablet: {{ $deviceInfo['is_tablet'] ? 'Yes' : 'No' }}</li>
    <li>Location: {{ $deviceInfo['city'] }}, {{ $deviceInfo['country'] }}</li>
    <li>Latitude: {{ $deviceInfo['latitude'] }}</li>
    <li>Longitude: {{ $deviceInfo['longitude'] }}</li>
    <li>Google Maps URL: <a href="{{ $deviceInfo['google_maps_url'] }}" target="_blank">View on Map</a></li>
</ul>
</body>
</html>
