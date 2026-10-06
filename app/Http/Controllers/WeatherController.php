<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $weather = null;
        $weatherError = null;

        try {

            $response = Http::timeout(5)
                ->get('https://api.openweathermap.org/data/2.5/weather', [
                    'q' => config('services.openweather.city'),
                    'appid' => config('services.openweather.key'),
                    'units' => 'metric',
                ]);

            if ($response->successful()) {

                $data = $response->json();

                if (
                    isset($data['name']) &&
                    isset($data['main']['temp']) &&
                    isset($data['weather'][0]['description']) &&
                    isset($data['main']['humidity']) &&
                    isset($data['wind']['speed'])
                ) {

                    $weather = [
                        'location' => $data['name'],
                        'temperature' => $data['main']['temp'],
                        'condition' => $data['weather'][0]['description'],
                        'humidity' => $data['main']['humidity'],
                        'wind_speed' => $data['wind']['speed'],
                    ];

                } else {
                    $weatherError = 'Weather information is unavailable.';
                }

            } else {
                $weatherError = 'Weather service returned an error.';
            }

        } catch (\Illuminate\Http\Client\ConnectionException $e) {

            $weatherError = 'Weather service is currently unavailable.';

        } catch (\Throwable $e) {

            $weatherError = 'Unable to retrieve weather information.';

        }

        return view('admin.dashboard', compact('weather', 'weatherError'));
    }
}