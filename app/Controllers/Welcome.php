<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    public function index(): string
    {
        return view('welcome_view');
    }
}
