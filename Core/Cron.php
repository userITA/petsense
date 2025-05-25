<?php

namespace Core;

use \Core\App;
use \Core\Database;


use Bluerhinos\phpMQTT;
use InfluxDB2\Client as InfluxDBClient;
use InfluxDB2\Model\WritePrecision;
use InfluxDB2\Point;

use Exception;

class Cron
{

    public static function runCronInfluxDb()
    {
        $duracionSegundos = 50;

        // Configuración MQTT
        $server = '34.234.10.22';
        $port = 1883;
        $username = '';
        $password = '';
        $client_id = 'php_mqtt_' . uniqid();

        $topic_gps = 'petsense/#';

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


        $writeApi = $influxClient->createWriteApi();

        $mqtt = new phpMQTT($server, $port, $client_id);

        if (!$mqtt->connect(true, NULL, $username, $password)) {
            echo "❌ No se pudo conectar al broker MQTT\n";
            return;
        }

        echo "✅ Conectado a MQTT. Escuchando durante {$duracionSegundos}s...\n";

        $mqtt->subscribe([
            $topic_gps => [
                'qos' => 0,
                'function' => function ($topic, $msg) use ($writeApi) {
                    echo "📩 Mensaje recibido de [$topic]: \n";

                    $data = json_decode($msg, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        echo "⚠️ Mensaje no es JSON válido\n";
                        return;
                    }

                    $org = 'ITA';
                    $bucket = 'project_ITA';
                    if ($topic == "petsense/gps") {
                        $point = Point::measurement('gps')
                            ->addTag('topic', $topic)
                            ->addField('latitud', $data['latitud'])
                            ->addField('longitud', $data['longitud'])
                            ->addField('satellites', $data['satellites'])
                            ->addField('hdop', $data['hdop']);
                        $writeApi->write($point, WritePrecision::S, $bucket, $org);
                    } else if ($topic == "petsense/battery") {
                        $point = Point::measurement('battery')
                            ->addTag('topic', $topic)
                            ->addField('status', $data['status'])
                            ->addField('tension', $data['current_mA'])
                            ->addField('voltage', $data['voltage_V'])
                            ->addField('battery', $data['battery_percent']);
                        $writeApi->write($point, WritePrecision::S, $bucket, $org);
                    } else if ($topic == "petsense/accelerometer") {
                        $point = Point::measurement('accelerometer')
                            ->addTag('topic', $topic)
                            ->addField('x_axis', $data['x_axis'])
                            ->addField('y_axis', $data['y_axis'])
                            ->addField('z_axis', $data['z_axis']);
                        $writeApi->write($point, WritePrecision::S, $bucket, $org);
                    } else if ($topic == "petsense/ambiental") {
                        $point = Point::measurement('ambiental')
                            ->addTag('topic', $topic)
                            ->addField('temperature_C', $data['temperature_C'])
                            ->addField('humidity_%', $data['humidity_%'])
                            ->addField('pressure_hPa', $data['pressure_hPa']);
                        $writeApi->write($point, WritePrecision::S, $bucket, $org);
                    } else if ($topic == "petsense/health") {
                        $point = Point::measurement('health')
                            ->addTag('topic', $topic)
                            ->addField('ir_value', $data['ir_value'])
                            ->addField('red_value', $data['red_value'])
                            ->addField('bpm', $data['bpm'])
                            ->addField('spo2', $data['spo2']);
                        $writeApi->write($point, WritePrecision::S, $bucket, $org);
                    }

                    print_r($data);
                    // Aquí va la lógica para guardar en Influx
                }
            ]
        ]);


        // Escuchar durante X segundos
        $inicio = time();
        while ($mqtt->proc()) {
            // Espera de mensajes
            usleep(100000); // Evita CPU al 100%, 0.1 seg
            if ((time() - $inicio) >= $duracionSegundos) break;
        }

        $mqtt->close();
        echo "🕐 Finalizado tras {$duracionSegundos}s\n";
    }
}
