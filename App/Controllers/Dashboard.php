<?php
namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use \App\Models\Dashboard as modelDashboard;
use \App\Models\User as modelUser;

use \Core\Controller;
use \Core\View;

class Dashboard extends Controller
{
    public function index()
    {
        $username = modelUser::getUser($_COOKIE['petsense_session_cookie']);
        View::set('title', 'Inicio');
        View::set('userName', $username);
        View::render('dashboard');
    }
}
