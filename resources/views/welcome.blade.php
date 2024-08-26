<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Information</title>
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
</ul>
</body>
</html>
