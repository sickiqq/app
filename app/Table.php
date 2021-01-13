<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','branch_office_id','identifier'
  ];

  public function branchOffice() {
      return $this->belongsTo('\App\branchOffice');
  }

  public function sales() {
      return $this->hasMany('\App\Sales');
  }

  public function clients()
  {
      return $this->belongsToMany('App\Client','client_tables')
                  // ->wherePivot('deleted_at', null);
                  ->withPivot('entry_date','exit_date');
  }

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
}
