<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
	protected $fillable = [
		'listingId',		
		'name',
		'description',
		'photo',
		'price',
		'city',
		'type',
		'user_id',
	];

	public function user(){
		return $this->belongsTo('App\Models\User');	
	}

}
