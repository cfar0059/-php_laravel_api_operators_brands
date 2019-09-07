<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;


class Operator extends Model {

	const ACTIVE = '1';
	const INACTIVE = '0';

	public $timestamps = false;

	protected $fillable = [
		'name',
		'url',
		'active',
		'date',
	];

	public function setUrlAttribute( $url ) {
		$this->attributes['url'] = strtolower( $url ); //url is to be automatically transformed into Lowercase
	}

	public function isActive() {
		return $this->active == Operator::ACTIVE;
	}

	public function brands() {
		return $this->hasMany( Brand::class );
	}

}
