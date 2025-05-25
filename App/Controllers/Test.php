<?php
namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use \Core\Controller;
use \Core\Cron;

class Test extends Controller
{
    public function index()
    {
        Cron::runCronInfluxDb();
    }
}