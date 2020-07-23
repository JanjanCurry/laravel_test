<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   	protected $fillable = ['user_id', 'title'];
    
    public function user()
    {
    	// withDefault is used for setting up a default value if propeties or methods returns null objects/same as optional() helper
    	return $this->belongsTo(User::class)->withDefault([
    		'name' => 'Guest User'
    	]);
    }
    public function tag()
    {
    	// withDefault is used for setting up a default value if propeties or methods returns null objects/same as optional() helper
    	return $this->belongsToMany(Tag::class);
    }
}
