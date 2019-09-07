<?php

namespace App\Transformers;

use App\Brand;
use League\Fractal\TransformerAbstract;

class BrandTransformer extends TransformerAbstract {
	/**
	 * A Fractal transformer.
	 *
	 * @return array
	 */
	public function transform( Brand $brand ) {
		return [
			'id'          => (int) $brand->id,
			'name'        => (string) $brand->name,
			'operator_id' => (int) $brand->operator_id,
			'url'         => (string) $brand->url,
			'active'      => (boolean) $brand->active,
			'date'        => $brand->date,
		];
	}
}
