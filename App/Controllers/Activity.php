<?php

namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use \Core\Controller;
use \Core\View;

class Activity extends Controller
{
    public function index()
    {
        View::set('title', 'Actividad');
        View::render('activity');
    }
}
