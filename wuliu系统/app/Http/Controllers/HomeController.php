<?php
/**
 * 首页
 */

namespace App\Http\Controllers;

use App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}