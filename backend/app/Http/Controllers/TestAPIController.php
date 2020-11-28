<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestAPIController extends Controller
{
    public function index()
    {
        return 'テストAPI出力';
    }
}
