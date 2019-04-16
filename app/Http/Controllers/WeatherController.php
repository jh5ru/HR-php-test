<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function index()
    {
        $model = $this->getWeather();
        return view('weather.index',compact('model'));
    }

    private function getWeather()
    {
        //Cache::flush();
        $settings = array(
            'lat'=>'53.23879391439701',
            'lon'=>'34.36029777246094',
            'lang'=>'ru_RU',
            'limit'=>1,
            'hours'=>true,
            'extra'=>true,
        );
        $ico_url = 'https://yastatic.net/weather/i/icons/blueye/color/svg/';
        $query = http_build_query($settings);
        if (!Cache::has('data')) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://api.weather.yandex.ru/v1/forecast?' . $query);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'X-Yandex-API-Key: ' . env('YandexAPIKey'),
            ));
            $data = curl_exec($curl);
            $data = json_decode($data, true);
            $result = array(
                'date' => Carbon::createFromTimestamp($data['now']),
                'temp' => $data['fact']['temp'],
                'like'=>$data['fact']['feels_like'],
                'wind'=>$data['fact']['wind_speed'],
                'pressure'=>$data['fact']['pressure_mm'],
                'icon'=>$ico_url .$data['fact']['icon'].'.svg'
            );
            Cache::put('data', $result, 60);
        }else{
            $result = Cache::get('data');
        }

        return $result;
    }


}
