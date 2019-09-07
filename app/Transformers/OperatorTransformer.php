<?php

namespace App\Transformers;

use App\Operator;
use League\Fractal\TransformerAbstract;

class OperatorTransformer extends TransformerAbstract {
	/**
	 * A Fractal transformer.
	 *
	 * @return array
	 */
	public function transform( Operator $operator ) {
		return [
			'id'     => (int) $operator->id,
			'name'   => (string) $operator->name,
			'url'    => (string) $operator->url,
			'active' => (boolean) $operator->active,
			'date'   => $operator->date,
		];
	}
}
