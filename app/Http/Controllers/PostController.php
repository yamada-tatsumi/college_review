<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Genre;
use App\Models\Comment;
use App\Models\College;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;

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
   
   public function store(Request $request, College $college, Club $club, Genre $genre, Review $review)
   {
      /*追加*/
      $college_input = $request['college'];
      $college->fill($college_input)->save();
      
      $genre_input = $request['genre'];
      $genre->fill($genre_input)->save();
      
      $club_input = $request['club'];
      $club_input['college_id']=$college->id;
      $club_input['genre_id']=$genre->id;
      $club->fill($club_input)->save();
      
      $review_input = $request['review'];
      $review_input['user_id'] =Auth::id();
      $review_input['club_id']=$club->id;
      $review->fill($review_input)->save();
      
      return view('reviews/post_complete');
   }
   
   public function both(Request $request, College $college, Genre $genre, Club $club, Review $review)
   {
      //clubs = $club->with('college','genre')->get();
      $reviews = $review->with('user', 'club')->get();
      
      //場合分け検索
      $collegeSearch = $request->input('collegeSearch');
      $genreSelect = $request->input('genreSelect');
      /*$collegeName = College::value("name");
      
      $genreName = Genre::value("name");
      
      $keyword =self::escapeLike($collegeSearch);*/

      if (isset($collegeSearch) && isset($genreSelect)) {
         $collegeName=$college->where('name', '=',  $collegeSearch )->first();
         $genreName=$genre->where('name', $genreSelect )->first();
      
         $clubs=$collegeName->club()->where('genre_id', $genreName->id)->get();
         dd($clubs[0]->review()->get());
      } elseif(isset($collegeSearch) && !isset($genreSelect)){
         $collegeName=$college->where('name', '=',  $collegeSearch )->first();
      } elseif(!isset($collegeSearch) && isset($genreSelect)){
        $genreName=$genre->where('name', $genreSelect )->first();
      } else{
         $collegeName=$college->name;
         $genreName=$college->name;
      }  
      
      
      
      $college_evaluation = $Review->where()->get();
      $college_point = array();
     foreach($college_evaluation as $college_evaluation){
         array_push($college_point, $college_evaluation->enjoyment);
      $ave_college=array_sum($college_point)/count($college_point);
     } 
      $college_evaluation = $Review->where()->get();
      $college_point = array();
      foreach($college_evaluation as $college_evaluation){
         array_push($college_point, $college_evaluation->enjoyment);
     }
     $ave_college=array_sum($college_point)/count($college_point);
      
      
      return view('reviews/both')->with(['reviews' => $review->getPaginateByLimit()]);
   }
   
   public static function escapeLike($str)
   {
      return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
   }
   
   public function detail(Review $review, Comment $comment)
   {
      $comments=$comment->where('review_id', $review->id)->get();
     
      return view('reviews/detail')->with(['reviews' => $review, 'comments'=>$comments]);
   }
   /*以下分からない*/
   public function submit(Request $request, Comment $comment, Review $review)
   {
      $comment_input = $request['comment'];
      $comment_input['user_id'] =Auth::id();
      $comment_input['review_id']=$review->id;
      $comment->fill($comment_input)->save();
      
      return view('reviews/detail')->with(['reviews' => $review]);
      
   }
}   

   