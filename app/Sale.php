<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','waiter_id','table_id','date','total','status'
  ];

  public function table() {
      return $this->belongsTo('\App\Table');
  }

  public function waiter() {
      return $this->belongsTo('\App\Waiter');
  }

  public function saleDetails() {
      return $this->hasMany('\App\SaleDetail');
  }

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
}
