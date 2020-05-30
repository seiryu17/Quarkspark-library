<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookList;
class ClientController extends Controller
{
    public function requestBook($id){
        $BookList = BookList::find($id);
        $BookList->status = 1;
        $BookList->users_id = auth()->user()->id;
        $BookList->save();
        return redirect('/home');
    }
    public function returnBook($id){
        $BookList = BookList::find($id);
        $BookList->status = 0;
        $BookList->users_id = 0;
        $BookList->save();
        return redirect('/dashboard');
    }
}
