<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    
   protected $fillable=[
       'name',
       'college_id',
       'genre_id',
       
    ];
    public function college()
    {
        return $this->belongsTo(College::class);
    }
    
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    
    public function review()
    {
        return $this->hasmany(Review::class);
    }
}
 