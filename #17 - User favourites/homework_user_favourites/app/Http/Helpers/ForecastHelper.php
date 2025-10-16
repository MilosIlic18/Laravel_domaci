<?php

namespace App\Http\Helpers;

class ForecastHelper{

    const WEATHER_ICONS =[
        "rainy"  => "fa-solid fa-cloud-rain",
        "sunny"  => "fa-regular fa-sun",
        "snowy"  => "fa-solid fa-snowflake",
        "cloudy" => "fa-solid fa-cloud"
    ];

    public static function getColorByTemperature($temperature){
        
        if($temperature<=0)
            return "text-blue-400";
        if($temperature >= 1 && $temperature <= 15)
            return "text-blue-900";
        if($temperature > 15 && $temperature <= 25)
            return "text-green-900";

        return "text-red-800";
    }
    public static function getIconsByWeatherType($weatherType){
        return self::WEATHER_ICONS[$weatherType];
    }
}