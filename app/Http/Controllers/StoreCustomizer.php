<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\StoreSettings;



class StoreCustomizer extends Controller
{
  use UploadAble;


    public function appendHero(Request $request){
      $image = collect($request);
      if($image['hero'] instanceof UploadedFile){
          $uploadedImage = $this->uploadOne($image['hero'], 'customizer/images/hero');
          $setting = new StoreSettings([
            'hero_image' => tenant_asset($uploadedImage)
          ]);
          $setting->save();
          return $setting;
          if($setting){
            return response()->json(['success', 'Hero image uploaded successfully.']);
          } else{

            return response()->json(['error', 'Some error happened while uploading the image :(, please try again.']);
          }
        }
    }

    public function getHero(){
      $hero = StoreSettings::all('hero_image');
      return response()->json($hero);
    }
}
