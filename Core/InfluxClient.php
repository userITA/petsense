<?php

namespace Core;

defined('APP_PATH') || die('Access denied');

use \Core\App;
use InfluxDB2\QueryApi;
use InfluxDB2\Client;
use InfluxDB2\Configuration;
use InfluxDB2\ApiException;
use InfluxDB2\FluxTable;
use InfluxDB2\FluxRecord;
use InfluxDB2\FluxQueryError;
use InfluxDB2\Point;
use InfluxDB2\HealthApi;

use Exception;

class InfluxClient
{

    public static function getClient()
    {
        return new Client([
            "url" => "http://localhost:8086", // o IP del servidor
            "token" => "7ChldY-Ing7dP1Ay4zRer_hoT9MKor5KbKkmEiVjGSqyZ8Md_a9MZj6NYT3i6BJP4hapeHD-HbJRRwx8nkXefg==",
            "bucket" => "project_ITA",
            "org" => "ITA"
        ]);
    }

    public static function getLastGpsPoints(int $limit = 10)
    {
        $client = self::getClient();
        $queryApi = $client->createQueryApi();

        $flux = <<<FLUX
        from(bucket: "project_ITA")
        |> range(start: -1h)
        |> filter(fn: (r) => r._measurement == "gps")
        |> sort(columns: ["_time"], desc: true)
        |> limit(n: $limit)
        FLUX;

        try {
            $tables = $queryApi->query($flux);
            $results = [];

            foreach ($tables as $table) {
                foreach ($table->records as $record) {
                    $results[] = [
                        'time' => $record->getTime(),
                        'field' => $record->getField(),
                        'value' => $record->getValue()
                        //'tags' => $record->getValues()
                    ];
                }
            }

            return $results;
        } catch (FluxQueryError $e) {
            error_log("Query error: " . $e->getMessage());
            return [];
        }
    }
}
