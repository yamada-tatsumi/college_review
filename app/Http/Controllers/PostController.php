<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Genre;
use App\Models\Comment;
use App\Models\College;
use App\Models\Cercle;

class PostController extends Controller
{
   public function select()
   {
      return view('reviews/select');
   }//

   public function post()
   {
      return view('reviews/post');
   }//
   
   public function setting()
   {
      return view('reviews/setting');
   }
   
   public function post_complete()
   {
      return view('reviews/post_complete');
   }//
   
}  