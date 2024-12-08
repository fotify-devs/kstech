<?php


namespace App\Http\Controllers;


use App\Models\About;
use Illuminate\View\View;


class AboutController extends Controller
{
    public function index(): View
    {
        return view('layouts.pages.about');
    }
}