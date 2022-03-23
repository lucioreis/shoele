<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDescountRequest;
use App\Http\Requests\UpdateDescountRequest;
use App\Models\Descounts;

class DescountController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreDescountsRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreDescountsRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Descounts  $descounts
   * @return \Illuminate\Http\Response
   */
  public function show(Descounts $descounts)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Descounts  $descounts
   * @return \Illuminate\Http\Response
   */
  public function edit(Descounts $descounts)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateDescountsRequest  $request
   * @param  \App\Models\Descounts  $descounts
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateDescountsRequest $request, Descounts $descounts)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Descounts  $descounts
   * @return \Illuminate\Http\Response
   */
  public function destroy(Descounts $descounts)
  {
    //
  }
}
