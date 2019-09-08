<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser {
	private function successResponse( $data, $code ) {
		return response()->json( $data, $code );
	}

	protected function errorResponse( $message, $code ) {
		return response()->json( [ 'error' => $message, 'code' => $code ], $code );
	}

	protected function showAll( Collection $collection, $code = 200 ) {
		$collection = $this->filterData( $collection );
		$collection = $this->sortData( $collection );

		return $this->successResponse( [ 'data' => $collection ], $code );
	}

	protected function showOne( Model $model, $code = 200 ) {
		return $this->successResponse( [ 'data' => $model ], $code );
	}

	protected function sortData( Collection $collection ) {
		if ( request()->has( 'sort_by' ) ) {
			$attribute = request()->sort_by;

			$collection = $collection->sortBy->{$attribute};
		}

		return $collection->values();
	}

	protected function filterData( Collection $collection ) {
		foreach ( request()->query() as $query => $value ) {
			if ( $query != 'sort_by' ) {
				$attribute = $query;

				if ( isset( $attribute, $value ) ) {
					$collection = $collection->where( $attribute, $value );
				}

			}
		}

		return $collection;
	}
}
