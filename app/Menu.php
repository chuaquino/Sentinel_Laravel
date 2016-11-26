<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $table = 'menus';

  public function menucat()
  {
    return $this->hasOne('App\MenuCat');
  }

  public function transaction()
  {
    return $this->hasOne('App\Transaction');
  }
}
