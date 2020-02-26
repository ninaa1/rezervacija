<?php

namespace App\Http\Controllers;

use App\Seat;
use App\Hall;
use Illuminate\Http\Request;
use App\Http\Requests\SeatCreateRequest;
use App\Http\Requests\SeatUpdateRequest;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $halls = Hall::all();
      $seats = Seat::all();
      return view('admin.seats.index', compact('seats', 'halls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $halls = Hall::pluck('name', 'id')->all();
      return view('admin.seats.create', compact('halls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeatCreateRequest $request)
    {
      $seat = new Seat();
      $seat->create($request->all());
      return redirect()->route('seats.index');
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
      $seat = Seat::find($id);
      $halls = Hall::pluck('name', 'id')->all();

      return view('admin.seats.edit', compact('seat', 'halls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeatUpdateRequest $request, $id)
    {
      Seat::find($id)->update($request->all());
      return redirect()->route('seats.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Seat::find($id)->delete();
      return redirect()->route('seats.index');
    }
}
