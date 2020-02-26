<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Screening extends Model
{
  use SoftDeletes;

  protected $fillable = ['movie_id', 'hall_id', 'price', 'start', 'end'];
  protected $dates = ['deleted_at'];

  public function movie()
  {
    return $this->belongsTo('App\Movie');
  }

  public function hall()
  {
    return $this->belongsTo('App\Hall');
  }
}
