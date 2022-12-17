<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;

class ContactController extends Controller
{

    public function index()
    {
        return $this->render('contact');
    }

    public function store(Request $request)
    {
        $body = $request->getBody();
        print_r($body);
        return "Contact Controller";
    }
}
