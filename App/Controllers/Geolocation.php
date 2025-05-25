<?php

namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use \Core\Controller;
use \Core\View;

class Geolocation extends Controller
{
    public function index()
    {
        $mode = null;
        /*if (isset($_POST)) {
            +d($_POST);
        }*/
        if (isset($_POST['viewLive']) || (!isset($_POST['viewLive']) && !isset($_POST['viewSearch']))) {
            $mode = "live";
        } else if (isset($_POST['viewSearch'])) {
            $mode = "search";
        } else if (isset($_POST['dateSearch'])) {
            $mode = "search";
        }
        View::set('title', 'Geolocalizacion (GPS)');
        View::set("mode", $mode);
        View::render('map');
    }
}
