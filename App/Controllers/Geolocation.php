<?php

namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use \Core\Controller;
use \App\Models\Geolocation as modelGeolocation;
use \Core\View;

class Geolocation extends Controller
{
    public function index()
    {
        $mode = null;
        $msg = null;
        $searchDataLocation = null;

        if (isset($_POST['buttonValueDate'])) {
            $mode = "search";
            if (isset($_POST['dateValue']) && $_POST['dateValue'] != "") {
                $searchDataLocation = modelGeolocation::searchDataLocation($_POST['dateValue']);
                $msg = "La consulta se ha realizado correctamente";
            } else {
                $msg = "No se ha introducido ninguna fecha para la consulta.";
            }
        }
        if (isset($_POST['viewLive']) || (!isset($_POST['viewLive']) && !isset($_POST['viewSearch']) && !isset($_POST['buttonValueDate']))) {
            $mode = "live";
        } else if (isset($_POST['viewSearch'])) {
            $mode = "search";
        } else if (isset($_POST['dateSearch'])) {
            $mode = "search";
        }
        View::set('title', 'Geolocalizacion (GPS)');
        View::set("mode", $mode);
        View::set("msg", (isset($msg) ? $msg : null));
        View::set("dataLocation", (isset($searchDataLocation) ? $searchDataLocation : null));
        View::render('map');
    }
}
