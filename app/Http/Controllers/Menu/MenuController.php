<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
  public function setMenu(Request $request){

    $items = collect($request);


foreach ($items as $item) {
    Menu::create([
      'title' => $item['title'],
      'path' => $item['path']
    ]);

  }
    }


  public function getMenu(){
    return Menu::all();
  }
}
