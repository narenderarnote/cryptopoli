<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{

    protected $fillable = ["values"];

   /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'type';
	}

    public function setValuesAttribute($value)
    {
        $this->attributes['values'] = json_encode($value);
    }

    public function getValuesAttribute($value)
    {
        return json_decode($value);
    }

}
