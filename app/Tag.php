<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
   protected $fillable = ['name'];
   public function post()
    {
    	// withDefault is used for setting up a default value if propeties or methods returns null objects/same as optional() helper
    	return $this->belongsToMany(Post::class);
    }
}
