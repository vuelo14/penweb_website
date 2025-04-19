<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
// Method untuk halaman home
public function home()
{
return view('home');
}
// Method untuk halaman about
public function about()
{
return view('about');
}
// Method untuk halaman contact
public function contact()
{
return view('contact');
}
// Method untuk halaman cv
public function cv()
{
return view('cv');
}
}