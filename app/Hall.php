<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hall extends Model
{
  use SoftDeletes;

  protected $fillable = ['name', 'seats_number'];
  protected $dates = ['deleted_at'];

  public function screenings()
  {
    return $this->hasMany('App\Screening');
  }
}
