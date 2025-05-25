<?php

namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use \Core\Controller;
use \Core\View;

class Ambiental extends Controller
{
    public function index()
    {
        View::set('title', 'Medioambiente');
        View::render('ambiental');
    }
}
