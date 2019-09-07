<?php

namespace App\Http\Controllers\Operator;

use App\Operator;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class OperatorController extends ApiController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index( ) {
		$operator = Operator::all();

		return $this->showall( $operator );

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
			'name'   => 'required',
			'url'    => 'required', //Apply regex rule for URL Requirements ??
			'active' => 'required|boolean', //Has to be 1 or 0
			'date'   => 'required|date', //Has to be with format yyyy-mm-dd
		];

		$this->validate( $request, $rules );

		$data = $request->all();

		$operator = Operator::create( $data );

		return $this->showOne( $operator, 201 );


	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$operator = Operator::findOrFail( $id );

		return $this->showOne( $operator );
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

		$operator = Operator::findOrFail( $id );

		$rules = [
			'name'   => 'max:255', // @todo: Add Regex to remove digits and underscores
			'active' => 'boolean', //Has to be 1 or 0
			'date'   => 'date', //Has to be with format yyyy-mm-dd
		];

		$this->validate( $request, $rules );

		if ( $request->has( 'name' ) ) {
			$operator->name = $request->name;
		}

		if ( $request->has( 'url' ) ) {
			$operator->url = $request->url;
		}

		if ( $request->has( 'active' ) ) {
			$operator->active = $request->active;
		}

		if ( ! $operator->isDirty() ) {
			return $this->errorResponse( 'You need to specify a different value to update', 422 );
		}

		$operator->save();

		return $this->showOne( $operator );

	}
}
