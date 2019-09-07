<?php

namespace App\Http\Controllers\Brand;

use App\Brand;
use App\Operator;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BrandController extends ApiController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index( Request $request ) {
		$brand = Brand::has( 'operators' )->get();

		return $this->showall( $brand );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$rules = [
			'name'        => 'required',
			'url'         => 'required', //@todo: Apply regex rule for URL Requirements ??
			'operator_id' => 'required', //@todo: Apply rule to see that operator extsts
			'active'      => 'required|boolean', //Has to be 1 or 0
			'date'        => 'required|date', //Has to be with format yyyy-mm-dd
		];

		$this->validate( $request, $rules );

		$data = $request->all();

		$brand = Brand::create( $data );

		return $this->showOne( $brand, 201 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$brand = Brand::findOrFail( $id );

		return $this->showOne( $brand );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int                      $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		$brand = Brand::findOrFail( $id );

		$rules = [
			'name'        => 'max:255', // @todo: Add Regex to remove digits and underscores
			'active'      => 'boolean', //Has to be 1 or 0
			'date'        => 'date', //Has to be with format yyyy-mm-dd
			'operator_id' => 'exists:operators,id', //Has to exists
		];

		$this->validate( $request, $rules );

		if ( $request->has( 'name' ) ) {
			$brand->name = $request->name;
		}

		if ( $request->has( 'url' ) ) {
			$brand->url = $request->url;
		}

		if ( $request->has( 'operator_id' ) ) {
			$brand->operator_id = $request->operator_id;
		}

		if ( $request->has( 'active' ) ) {
			$brand->active = $request->active;
		}

		if ( ! $brand->isDirty() ) {
			return $this->errorResponse( 'You need to specify a different value to update', 422 );
		}

		$brand->save();

		return $this->showOne( $brand );
	}

}
