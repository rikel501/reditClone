<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    
    protected $table = 'posts';
    
    protected $casts = ['user_id' => 'integer'];

    protected $fillable = ['title', 'description', 'url'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

    public function createdBy($user){
    	if(is_null($user)){
    		return false;
    	}
    	return $this->user_id == $user->id;
    }

}
