<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','branch_office_id','name','description','price'
  ];

  public function saleDetail() {
      return $this->belongsTo('\App\SaleDetail');
  }

  public function PromotionItems() {
      return $this->belongsTo('\App\PromotionItem');
  }

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
}
