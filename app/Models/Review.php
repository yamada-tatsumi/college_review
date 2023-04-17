<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
     protected $fillable=[
       'enjoyment',
       'cost',
       'connection',
       'strict',
       'often',
       'scale',
       'body',
       'user_id',
       'club_id',
    ];   
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    
    public function getByLimit(int $limit_count =5)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
