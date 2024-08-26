<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Information List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Device Information List</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>IP Address</th>
        <th>Device</th>
        <th>Platform</th>
        <th>Platform Version</th>
        <th>Browser</th>
        <th>Browser Version</th>
        <th>Is Desktop</th>
        <th>Is Mobile</th>
        <th>Is Tablet</th>
        <th>City</th>
        <th>Country</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Google Maps URL</th>
        <th>Recorded At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($deviceInfos as $deviceInfo)
        <tr>
            <td>{{ $deviceInfo->id }}</td>
            <td>{{ $deviceInfo->ip }}</td>
            <td>{{ $deviceInfo->device }}</td>
            <td>{{ $deviceInfo->platform }}</td>
            <td>{{ $deviceInfo->platform_version }}</td>
            <td>{{ $deviceInfo->browser }}</td>
            <td>{{ $deviceInfo->browser_version }}</td>
            <td>{{ $deviceInfo->is_desktop ? 'Yes' : 'No' }}</td>
            <td>{{ $deviceInfo->is_mobile ? 'Yes' : 'No' }}</td>
            <td>{{ $deviceInfo->is_tablet ? 'Yes' : 'No' }}</td>
            <td>{{ $deviceInfo->city }}</td>
            <td>{{ $deviceInfo->country }}</td>
            <td>{{ $deviceInfo->latitude }}</td>
            <td>{{ $deviceInfo->longitude }}</td>
            <td><a href="{{ $deviceInfo->google_maps_url }}" target="_blank">View on Map</a></td>
            <td>{{ $deviceInfo->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
