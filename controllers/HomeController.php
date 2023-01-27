<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $params = [
            'name' => 'JAtin',
        ];
        return $this->render('home', $params);
    }
}
