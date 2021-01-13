<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','subcategory_id','branch_office_id','name','description','price','status'
  ];

  public function subcategory() {
      return $this->belongsTo('\App\Subcategory');
  }

  public function branchOffice() {
      return $this->belongsTo('\App\branchOffice');
  }

  public function promotionItems() {
      return $this->hasMany('\App\PromotionItem');
  }

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
}
