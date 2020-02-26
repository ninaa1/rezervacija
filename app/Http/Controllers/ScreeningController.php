<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Hall;
use App\Screening;
use Illuminate\Http\Request;
use App\Http\Requests\ScreeningCreateRequest;
use App\Http\Requests\ScreeningUpdateRequest;

class ScreeningController extends Controller
{

  public function screenings()
  {
    $movies = Movie::all();
    $halls = Hall::all();
    $screenings = Screening::all();

    return view('screenings', compact('screenings', 'halls', 'movies'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $movies = Movie::all();
    $halls = Hall::all();
    $screenings = Screening::all();

    return view('admin.screenings.index', compact('screenings', 'halls', 'movies'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $movies = Movie::pluck('title', 'id')->all();
    $halls = Hall::pluck('name', 'id')->all();

    return view('admin.screenings.create', compact('halls', 'movies'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ScreeningCreateRequest $request)
  {
    $screning = new Screening();
    $screning->create($request->all());
    return redirect()->route('screenings.index');
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
    $screening = Screening::find($id);
    $movies = Movie::pluck('title', 'id')->all();
    $halls = Hall::pluck('name', 'id')->all();

    return view('admin.screenings.edit', compact('screening', 'movies', 'halls'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ScreeningUpdateRequest $request, $id)
  {
    Screening::find($id)->update($request->all());
    return redirect()->route('screenings.edit', $id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Screening::find($id)->delete();
    return redirect()->route('screenings.index');
  }
}
