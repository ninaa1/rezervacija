<?php

namespace App\Http\Controllers;

use App\Seat;
use App\SeatReserved;
use App\Screening;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{   
    public function reservations($screeningId) {
        $longestRow = 0;
        $letters = range('A', 'Z');
        $screening = Screening::find($screeningId);
        $seats = Seat::where('hall_id', $screening->hall->id)->get();

        $mappedSeats = [];
        foreach($seats as $seat) {
            $mappedSeats[$seat->row][] = $seat->id;
        }
        foreach($mappedSeats as $row => $seats) {
            if(count($seats) > $longestRow)
                $longestRow = count($seats);
        }

        $seatReserveds = SeatReserved::where('screening_id', $screeningId)->get();

        $reservedSeats = [];
        foreach($seatReserveds as $seatReserved) {
            $reservedSeats[] = $seatReserved->seat_id;
        }
        $letters = array_slice($letters, 0, $longestRow);
        return view('reserve', compact('mappedSeats', 'letters', 'screeningId', 'reservedSeats'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->paid = 0;
        $reservation->active = 1;
        $reservation->reserved = 1;
        $reservation->save();

    
        $seats = $request->input('seats');
 
       foreach($seats as $seat) {
            $seatReserved = new SeatReserved();
            $seatReserved->seat_id = $seat;
            $seatReserved->reservation_id = $reservation->id;
            $seatReserved->screening_id = $request->input('screeningId');
            $seatReserved->save();
        }

        //return redirect()->route('seats.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::find($id)->delete();
        SeatReserved::where(['reservation_id' => $id])->delete();
        return redirect()->route('admin.reservations');
    }

    public function pay(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->paid = 1;
        $reservation->save();
        return redirect()->route('admin.reservations');
    }

    public function userReservations()
    {
        $reservations = Reservation::where(['user_id' => Auth::user()->id])->get();
        return view('reservations', compact('reservations'));
    }

    public function delete($id)
    {
        Reservation::find($id)->delete();
        SeatReserved::where(['reservation_id' => $id])->delete();
        return redirect()->route('user.reservations');
    }
}
