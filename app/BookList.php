<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookList extends Model
{

    protected $table = "book_lists";

    protected $fillable = ['bookName','author','publisher', 'datePublish', 'imageBook', 'users_id', 'status'];
}
