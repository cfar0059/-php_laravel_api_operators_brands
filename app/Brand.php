<?php

namespace App;

use App\Transformers\BrandTransformer;
use Illuminate\Database\Eloquent\Model;
use App\Operator;


class Brand extends Model {

	const ACTIVE = '1';
	const INACTIVE = '0';

	public $timestamps = false;

	protected $fillable = [
		'name',
		'url',
		'operator_id', //See if you want user to assign foreign keys
		'active',
		'date',
	];

	public $transformer = BrandTransformer::class;


	public function setUrlAttribute( $url ) {
		$this->attributes['url'] = strtolower( $url );
	}

	public function isActive() {
		return $this->active == Brand::ACTIVE;
	}

	public function operators() {
		return $this->belongsTo( Operator::class, 'operator_id', 'id' );
	}

	public function getRandomUserId() {
		$operator = Operator::inRandomOrder()->first();
		return $operator->id;
	}
}
