<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','level_id','clan_id','name','nickname','show','experience','facebook_id','country','city','address','number'
  ];

  public function clan() {
      return $this->belongsTo('\App\Clan');
  }

  public function nivel() {
      return $this->belongsTo('\App\Nivel');
  }

  public function saleDetails() {
      return $this->hasMany('\App\SaleDetail');
  }

  public function tables()
  {
      return $this->belongsToMany('App\Table','client_tables')
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
