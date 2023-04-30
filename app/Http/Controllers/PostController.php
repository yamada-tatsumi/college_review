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

   public function post(Genre $genre)
   {
      return view('reviews/post')->with(['genres'=>$genre->get()]);
   }//
   
   public function setting()
   {
      return view('reviews/setting');
   }
   
   public function store(Request $request, College $college, Club $club, Genre $genre, Review $review)
   {
      /*大学名保存*/
      if($college->where('name', $request['college']['name'])->exists()){
         $college = $college->where('name', $request['college']['name'])->first();
      
      }else{
         $college_input = $request['college'];
         $college->fill($college_input)->save();
      }
      
      
     // $genre_input = $request['genre'];
      //$genre->fill($genre_input)->save();
      
      $club_input = $request['club'];
      $club_input['college_id']=$college->id;
      $club_input['genre_id']=$request['genre']['id'];
      $club->fill($club_input)->save();
      
      
      $review_input = $request['review'];
      $review_input['user_id'] =Auth::id();
      $review_input['club_id']=$club->id;
      $review->fill($review_input)->save();
      
      return view('reviews/post_complete')->with(['genres'=>$genre->get()]);
   }
   
   public function both(Request $request, College $college, Genre $genre, Club $club, Review $review)
   {
      //clubs = $club->with('college','genre')->get();
      //$reviews = $review->with('user', 'club')->get();
      
      //場合分け検索
      $collegeSearch = $request['collegeSearch'];
    
      $genreSelect = $request['genreSelect'];
      /*$collegeName = College::value("name");
      
      $genreName = Genre::value("name");
      
      $keyword =self::escapeLike($collegeSearch);*/
      $college_evaluation = Review::whereHas('club.college', function ($query) use ($collegeSearch) {
         $query->where('name', $collegeSearch);
         })->get(['enjoyment', 'cost', 'connection', 'strict', 'often', 'scale']);
         $college_point1 = array();
         $college_point2 = array();
         $college_point3 = array();
         $college_point4 = array();
         $college_point5 = array();
         $college_point6 = array();
         
      //dd($college_evaluation);
      $genre_evaluation = Review::whereHas('club.genre', function ($query) use ($genreSelect) {
         $query->where('name', $genreSelect);
         })->get(['enjoyment', 'cost', 'connection', 'strict', 'often', 'scale']);
         $genre_point1 = array();
         $genre_point2 = array();
         $genre_point3 = array();
         $genre_point4 = array();
         $genre_point5 = array();
         $genre_point6 = array();
         
         
      //dd($genre_evaluation);  
      if (isset($collegeSearch) && isset($genreSelect)) {
         
          $collegeName = $college->where('name', '=', $collegeSearch)->first();
          $genreName = $genre->where('name', $genreSelect)->first();
          $clubs = $collegeName->club()->where('genre_id', $genreName->id)->get();
          $reviews = $review->whereIn('club_id', $clubs->pluck('id'))->orderBy('updated_at', 'DESC')->paginate(5);
          
         foreach($college_evaluation as $college_evaluation){
            array_push($college_point1, $college_evaluation->enjoyment);
            array_push($college_point2, $college_evaluation->cost);
            array_push($college_point3, $college_evaluation->connection);
            array_push($college_point4, $college_evaluation->strict);
            array_push($college_point5, $college_evaluation->often);
            array_push($college_point6, $college_evaluation->scale);
                
            //dd($college_evaluation);
           }
         foreach($genre_evaluation as $genre_evaluation){
            array_push($genre_point1, $genre_evaluation->enjoyment);
            array_push($genre_point2, $genre_evaluation->cost);
            array_push($genre_point3, $genre_evaluation->connection);
            array_push($genre_point4, $genre_evaluation->strict);
            array_push($genre_point5, $genre_evaluation->often);
            array_push($genre_point6, $genre_evaluation->scale);
            
           }//dd($college_point);
           
           $ave_college=array();
           array_push($ave_college,array_sum($college_point1)/count($college_point1)); 
           array_push($ave_college,array_sum($college_point2)/count($college_point2)); 
           array_push($ave_college,array_sum($college_point3)/count($college_point3)); 
           array_push($ave_college,array_sum($college_point4)/count($college_point4)); 
           array_push($ave_college,array_sum($college_point5)/count($college_point5)); 
           array_push($ave_college,array_sum($college_point6)/count($college_point6)); 
            
           $ave_genre=array();
           array_push($ave_genre,array_sum($genre_point1)/count($genre_point1));
           array_push($ave_genre,array_sum($genre_point2)/count($genre_point2));
           array_push($ave_genre,array_sum($genre_point3)/count($genre_point3));
           array_push($ave_genre,array_sum($genre_point4)/count($genre_point4));
           array_push($ave_genre,array_sum($genre_point5)/count($genre_point5));
           array_push($ave_genre,array_sum($genre_point6)/count($genre_point6));
     
      } elseif (isset($collegeSearch) && !isset($genreSelect)) {
          $collegeName = $college->where('name', '=', $collegeSearch)->first();
          $clubs = $collegeName->club()->get();
          $reviews = Review::whereIn('club_id', $clubs->pluck('id'))->orderBy('updated_at', 'DESC')->paginate(5);
          
         foreach($college_evaluation as $college_evaluation){
            array_push($college_point1, $college_evaluation->enjoyment);
            array_push($college_point2, $college_evaluation->cost);
            array_push($college_point3, $college_evaluation->connection);
            array_push($college_point4, $college_evaluation->strict);
            array_push($college_point5, $college_evaluation->often);
            array_push($college_point6, $college_evaluation->scale);
         }
          
         $ave_college=array();
           array_push($ave_college,array_sum($college_point1)/count($college_point1)); 
           array_push($ave_college,array_sum($college_point2)/count($college_point2)); 
           array_push($ave_college,array_sum($college_point3)/count($college_point3)); 
           array_push($ave_college,array_sum($college_point4)/count($college_point4)); 
           array_push($ave_college,array_sum($college_point5)/count($college_point5)); 
           array_push($ave_college,array_sum($college_point6)/count($college_point6)); 
           
         $ave_genre=array();
          
         for($i=0;$i<6;$i++){
             array_push($ave_genre, '-');
         }
         
      } elseif (!isset($collegeSearch) && isset($genreSelect)) {
          $genreName = $genre->where('name', $genreSelect)->first();
          $clubs = Club::where('genre_id', $genreName->id)->get();
          $reviews = Review::whereIn('club_id', $clubs->pluck('id'))->orderBy('updated_at', 'DESC')->paginate(5);
          
         foreach($genre_evaluation as $genre_evaluation){
            array_push($genre_point1, $genre_evaluation->enjoyment);
            array_push($genre_point2, $genre_evaluation->cost);
            array_push($genre_point3, $genre_evaluation->connection);
            array_push($genre_point4, $genre_evaluation->strict);
            array_push($genre_point5, $genre_evaluation->often);
            array_push($genre_point6, $genre_evaluation->scale);
         }
         
         $ave_genre=array();
           array_push($ave_genre,array_sum($genre_point1)/count($genre_point1));
           array_push($ave_genre,array_sum($genre_point2)/count($genre_point2));
           array_push($ave_genre,array_sum($genre_point3)/count($genre_point3));
           array_push($ave_genre,array_sum($genre_point4)/count($genre_point4));
           array_push($ave_genre,array_sum($genre_point5)/count($genre_point5));
           array_push($ave_genre,array_sum($genre_point6)/count($genre_point6));
           
         $ave_college=array();  
           
         for($i=0;$i<6;$i++){
             array_push($ave_college, '-');
          }
      
      } else {
          $reviews = $review->orderBy('updated_at', 'DESC')->paginate(5);
          
          $ave_college=array();
          $ave_genre=array();
          
          for($i=0;$i<6;$i++){
             array_push($ave_college, '-');
             array_push($ave_genre, '-');
          }
   }

      return view('reviews/both')->with(['reviews' => $reviews, 'ave_college' => $ave_college, 'ave_genre' => $ave_genre]);  
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
   /*コメント送信*/
   public function submit(Request $request, Comment $comment, Review $review)
   {
      $comment_input = $request['comment'];
      $comment_input['user_id'] =Auth::id();
      $comment_input['review_id']=$review->id;
      $comment->fill($comment_input)->save();
      //dd($review->comments);
      //return view('reviews/detail')->with(['reviews' => $review,'comments' => $review->comments]);
      return redirect('/reviews/'.$review->id);
      
   }
}   

   