<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use GeoIp2\Database\Reader;
use App\Models\DeviceInfo;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $agent = new Agent();
        $ip = $request->ip();
        $deviceInfo = [
            'ip' => $ip,
            'device' => $agent->device(),
            'platform' => $agent->platform(),
            'platform_version' => $agent->version($agent->platform()),
            'browser' => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'is_desktop' => $agent->isDesktop(),
            'is_mobile' => $agent->isMobile(),
            'is_tablet' => $agent->isTablet(),
        ];

        // Get location using GeoIP2
        $reader = new Reader(database_path('GeoLite2-City.mmdb'));
        $record = $reader->city($ip);

        $location = [
            'city' => $record->city->name,
            'country' => $record->country->name,
            'latitude' => $record->location->latitude,
            'longitude' => $record->location->longitude,
        ];

        // Generate Google Maps URL
        $googleMapsUrl = $this->generateGoogleMapsUrl($location['latitude'], $location['longitude']);

        // Combine all data
        $deviceInfo = array_merge($deviceInfo, $location, ['google_maps_url' => $googleMapsUrl]);

        // Store the data in the database
        DeviceInfo::create($deviceInfo);

        return view('welcome', compact('deviceInfo'));
    }

    private function generateGoogleMapsUrl($latitude, $longitude)
    {
        if ($latitude && $longitude) {
            return "https://www.google.com/maps?q={$latitude},{$longitude}";
        }
        return null;
    }

    public function showDeviceInfo()
    {
        $deviceInfos = DeviceInfo::latest()->get(); // Fetch all records from the database
        return view('device-info', compact('deviceInfos'));
    }
    public function saveLocation(Request $request)
    {
        // Find the last device info record or use a better way to track specific records
        $deviceInfo = DeviceInfo::latest()->first();

        if ($deviceInfo) {
            $deviceInfo->latitude = $request->input('latitude');
            $deviceInfo->longitude = $request->input('longitude');
            $deviceInfo->google_maps_url = $this->generateGoogleMapsUrl($deviceInfo->latitude, $deviceInfo->longitude);
            $deviceInfo->save();
        }

        return response()->json(['status' => 'success']);
    }
}
