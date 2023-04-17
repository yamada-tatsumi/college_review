<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'average_evaluation',
        
    ];
    
     public function club()
    {
        return $this->hasMany(Club::class);
    }
    
}
