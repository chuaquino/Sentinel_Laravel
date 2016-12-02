<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuCat extends Model
{
  protected $table = 'menu_cat';

  public function menus()
  {
     return $this->belongsTo('App\Menu', 'menu_cat_id', 'menu_cat_id');
  }
}
