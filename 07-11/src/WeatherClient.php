<?php

declare(strict_types = 1);

namespace Weather;

use GuzzleHttp\Client;

class WeatherClient
{
    const DEFAULT_CITY = 'Kaunas';

    const ALL_TOWNS = [
        'Vilnius' => 'Vilnius',
        'Kaunas' => 'Kaunas',
        'Klaipeda' => 'Klaipėda',
        'Siauliai' => 'Šiauliai',
    ];

    private $baseUrl = 'http://api.openweathermap.org/data/2.5';
    private $appId = '478d85bcde10b684af58b8bf5ec01b9a';

    private $client;

    /**
     * WeatherClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchDataByCity(string $city = self::DEFAULT_CITY): array {
        try {
            $parameters = [
                'query' => [
                    'q' => $city,
                    'units' => 'metric',
                    'lang' => 'lt',
                    'appid' => $this->appId,
                ]
            ];

            $response = $this->client->get($this->getWeatherEndpointUrl(), $parameters);

            $result = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $exception) {
            $result = [];
        }

        return $result;
    }

    private function getWeatherEndpointUrl(): string {
        return $this->baseUrl.'/weather';
    }

}