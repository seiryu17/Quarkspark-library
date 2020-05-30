<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BookList;
use App\User;

class AdminController extends Controller
{
    public function index(){
        $BookList = BookList::all();
        $BookListReq = BookList::select('bookName', 'author', 'publisher', 'datePublish', 'imageBook', 'status')
                                ->where('status', '=', '1')
                                ->get();
        $BookCount = $BookList->count();
        $BookReqCount = $BookListReq->count();

        $Clientrent = BookList::select('id','bookName', 'author', 'publisher', 'datePublish', 'imageBook','users_id', 'status')
                                ->where('users_id', '=', auth()->user()->id)
                                ->where('status' , '=' , 2)
                                ->get();
        $Clientrentcount = $Clientrent->count();

        $Clientrentonprogress = BookList::select('bookName', 'author', 'publisher', 'datePublish', 'imageBook','users_id', 'status')
        ->where('users_id', '=', auth()->user()->id )
        ->where('status' , '=' , 1)
        ->get();
        $Clientrentonprogresscount = $Clientrentonprogress->count();

        $allrented = BookList::select('bookName', 'author', 'publisher', 'datePublish', 'users_id','imageBook', 'status')
        ->where('status', '!=', '1')
        ->where('users_id', '>', '0')
        ->get();
        


        return view('admin/index', ['BookCount' => $BookCount ,'allrented' => $allrented, 'BookReqCount' => $BookReqCount, 'Clientrent' => $Clientrent, 'Clientrentcount' => $Clientrentcount
        , 'Clientrentonprogresscount' => $Clientrentonprogresscount
        ]);
    }
    public function booksView(){
        $BookList = BookList::all();
        return view('admin/view_books', ['BookList' => $BookList]);
    }
    public function addBook(Request $request){
      
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = "data_file/".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        
        BookList::create([
    		'bookName' => $request->bookname,
    		'author' => $request->author,
            'publisher' => $request->publisher,
            'datePublish' => $request->datepublish,
            'imageBook' =>  $nama_file,
            'users_id' => 0,
            'status' => 0
        ]);

        return redirect('/booksview');
    }
    public function updateBook(Request $request){
       
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
        if($file){
            $BookList = BookList::find($request->id);
            $nama_file = "data_file/".$file->getClientOriginalName();
 
            // isi dengan nama folder tempat kemana file diupload
          $tujuan_upload = 'data_file';
          $file->move($tujuan_upload,$nama_file);  
        }
        $BookList = BookList::find($request->id);
        $BookList->bookname = $request->bookname;
        $BookList->author = $request->author;
        $BookList->publisher = $request->publisher;
        $BookList->datePublish = $request->datepublish;
        if($file){
        $BookList->imageBook = $nama_file;
        }
        $BookList->save();
        return redirect('/booksview');
    }

    public function deleteBook($id){
        $BookList = BookList::find($id);
        $BookList->delete();
        return redirect('/booksview');
    }
    public function showImage($id){
        $BookList = BookList::find($id);
        return view('admin/show_image', ['BookList' => $BookList]);
    }
    public function requestRent(){
        $BookList = BookList::select('id','bookName', 'author', 'publisher', 'datePublish', 'imageBook', 'status', 'users_id')                   
                                ->where('status', '=', '1')
                                ->get();
        return view('admin/client/view_request', ['BookList' => $BookList]);
    }
    public function acceptRent($id){
        $BookList = BookList::find($id);
        $BookList->status = 2;
        $BookList->save();
        return redirect('/request-rent');
    }
    public function declineRent($id){
        $BookList = BookList::find($id);
        $BookList->status = 0;
        $BookList->users_id = 0;
        $BookList->save();
        return redirect('/request-rent');
    }
    public function clientUser(){
        $User = User::select('id','name', 'email', 'status')
                ->where('is_admin', '=', '0')        
        ->get();
        return view('admin/client/view_user', ['User' => $User]);
    }
    public function activateUser($id){
        $User = User::find($id);
        $User->status = 1;
        $User->save();
        return redirect('/client-user');
    }
    public function deactivateUser($id){
        $User = User::find($id);
        $User->status = 0;
        $User->save();
        return redirect('/client-user');
    }
   
}
