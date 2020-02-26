<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeatReserved extends Model
{
    use SoftDeletes;

    protected $fillable = ['seat_id', 'reservation_id', 'screening_id'];
    protected $dates = ['deleted_at'];
}
