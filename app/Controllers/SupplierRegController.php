<?php

namespace App\Controllers;

class SupplierRegController extends BaseController
{
    public function index(): string
    {
        return view('supplier_registration');
    }
}
