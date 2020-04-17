<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon ; 

class Message extends Model
{

	// protected $fillable = ['id','from_id','to_id','body'];
    protected $table = 'messages';
    protected $guarded = [];
    protected $appends = ['sender','receiver'];

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
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
    public function getSenderAttribute(){
        return User::where('id',$this->sender_id)->first();
    }

    public function getReceiverAttribute(){
        return User::where('id',$this->receiver_id)->first();
    }
}
