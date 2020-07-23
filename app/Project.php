<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['title'];
 	 public function tasks(){
        return $this->hasManyThrough(Task::class, User::class);
        
    }
    public function task(){
        return $this->hasOneThrough(Task::class, User::class);
        
    }
    public function users(){
        return $this->hasMany(User::class);
        
    }
}
