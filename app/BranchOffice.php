<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchOffice extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','company_id', 'name','country','city','address','number','latitude','longitude'
  ];

  public function company() {
      return $this->belongsTo('\App\Company');
  }

  public function products() {
      return $this->hasMany('\App\Product');
  }

  public function tables() {
      return $this->hasMany('\App\Table');
  }

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
}
