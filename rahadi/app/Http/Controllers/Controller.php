<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
{
    return view('dashboard'); // Pastikan nama tampilan sesuai
}

}
