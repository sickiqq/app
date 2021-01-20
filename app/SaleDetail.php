<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleDetail extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','client_id','product_id','sale_id','promotion_id','date','amount','price'
  ];

  public function sale() {
      return $this->belongsTo('\App\Sale');
  }

  public function client() {
      return $this->hasOne('\App\Client');
  }

  public function product() {
      return $this->hasOne('\App\Product');
  }

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
}
