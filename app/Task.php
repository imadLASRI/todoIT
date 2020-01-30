<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $fillable = ['name', 'description', 'datetime', 'start', 'deadline', 'categorie_id', 'user_id'];
    
    protected $guarded = [];

    public function category(){
            return $this->belongsTo(Category::class);
    }
}
