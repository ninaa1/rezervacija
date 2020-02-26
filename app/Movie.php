<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'director', 'description', 'duration'];
  protected $dates = ['deleted_at'];

  public function screenings()
  {
    return $this->hasMany('App\Screening');
  }
}
