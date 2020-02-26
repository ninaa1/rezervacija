<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
  use SoftDeletes;

  protected $fillable = ['row', 'number', 'hall_id'];
  protected $dates = ['deleted_at'];

  public function hall()
  {
    return $this->belongsTo('App\Hall');
  }
}
