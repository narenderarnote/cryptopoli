<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    
    protected $fillable = [ "user_id" , "token", "type"];

    public $timestamps = false;

    protected $primaryKey = 'token';

    public function getRouteKeyName()
	{
	    return 'token';
	}

	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
