<?php
namespace App\Controllers;

defined('APP_PATH') || die('Access denied');


use \Core\Controller;
use \Core\View;

class Health extends Controller
{
    public function index()
    {
        View::set('title', 'Salud(+)');
        View::render('health');
    }
}
