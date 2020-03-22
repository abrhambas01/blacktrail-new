<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

	// protected $fillable = ['id','from_id','to_id','body'];
    protected $table = 'messages';
    protected $guarded = [];
	

    // protected $appends = ['selfMessage'];
	  /**
     * User has many Messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function owner()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasMany(User::class,'id','from');
    }

    
}
