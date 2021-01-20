<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientTable extends Model
{
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'client_id', 'table_id', 'entry_date', 'exit_date'
  ];

  // public function operating_rooms()
  // {
  //     return $this->hasMany('App\EHR\HETG\OperatingRoom');
  // }

  use SoftDeletes;
  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'client_tables';
}
