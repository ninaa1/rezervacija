<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;
use App\Http\Requests\HallCreateRequest;
use App\Http\Requests\HallUpdateRequest;

class HallController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $halls = Hall::all();
    return view('admin.halls.index', compact('halls'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.halls.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(HallCreateRequest $request)
  {
    $hall = new Hall();
    $hall->create($request->all());
    return redirect()->route('halls.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $hall = Hall::find($id);
    return view('admin.halls.edit', compact('hall'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(HallUpdateRequest $request, $id)
  {
    Hall::find($id)->update($request->all());
    return redirect()->route('halls.edit', $id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  { 
    Hall::find($id)->delete();
    return redirect()->route('halls.index');
  }
}
