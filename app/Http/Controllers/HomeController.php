<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BookList;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $BookList = BookList::all();
        return view('home', ['BookList' => $BookList]);
    }
    public function adminHome()
    {
        return redirect('/manage');
    }
}
