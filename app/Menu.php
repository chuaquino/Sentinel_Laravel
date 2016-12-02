<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $table = 'menus';

  public function menucat()
  {
    return $this->hasOne('App\MenuCat', 'id', 'menu_cat_id');
  }

  public function transaction()
  {
    return $this->hasOne('App\Transaction');
  }
}
