<?php

namespace Core;

namespace App\Models;

use InfluxDB2\Client as InfluxDBClient;
use InfluxDB2\Model\WritePrecision;

defined('APP_PATH') || die('Access denied');


class Geolocation
{
    public static function searchDataLocation($date)
    {
        $arrayLat = [];
        $arrayLong = [];
        $arrayGeolocation = [];

        // Configuración InfluxDB
        $influxToken = 'VvfuG9Rkp_ZnmMtKCEgx9iNRWOerMPvi2CrnIDfIjOW5MQ1SHXsmkzEvozMDe9IZ1ZwwpVIzU9t2rAavFZ6pBQ==';
        $org = 'ITA';
        $bucket = 'project_ITA';
        $influxHost = 'http://localhost:8086'; // o IP externa si está en otra máquina

        // Inicializar cliente de InfluxDB
        $influxClient = new InfluxDBClient([
            "url" => $influxHost,
            "token" => $influxToken,
            "bucket" => $bucket,
            "org" => $org,
        ]);
        $queryApi = $influxClient->createQueryApi();

        $flux = <<<"EOD"
        from(bucket: "project_ITA")
        |> range(
            start: time(v: "{$date}T00:00:00Z"),
            stop: time(v: "{$date}T23:59:59Z")
        )
        |> filter(fn: (r) => 
            r._measurement == "gps" and 
            (r._field == "latitud" or r._field == "longitud")
        )
        |> sort(columns: ["_time"], desc: true)
        |> limit(n: 10)
        EOD;


        $recordsObjects = $queryApi->query($flux, $org);
        $records = json_decode(json_encode($recordsObjects), true);
        foreach ($records as $key => $arrayRecords) {
            foreach ($arrayRecords['records'] as $key => $arrayValues) {
                if (isset($arrayValues['values']['_field']) && $arrayValues['values']['_field'] == 'latitud') {
                    $arrayLat[] = $arrayValues['values']['_value'];
                } else if (isset($arrayValues['values']['_field']) && $arrayValues['values']['_field'] == 'longitud') {
                    $arrayLong[] = $arrayValues['values']['_value'];
                }
            }
        }

        foreach ($arrayLat as $key => $lat) {
            $arrayGeolocation[] = ["x" . $key => $lat, "y" . $key => $arrayLong[$key]];
        }

        return $arrayGeolocation;
    }
}
