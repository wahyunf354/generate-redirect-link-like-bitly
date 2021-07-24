<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class GenerateLinkController extends Controller
{
  public function index()
  {
    return view('generatelink.index');
  }

  public function generating(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'url_new'=> 'required|unique:urls',
      'url_old'=> 'required',
    ]);

    $input_link = $request['url_old'];

    $output_link = $request['url_new'];
    if($validator->fails()) {
      $output_link = $request['url_new'].Str::random(3);
    }


    $url = new Url;
    $url->url_old = $input_link;
    $url->url_new = $output_link;
    $url->save();
    $url_baru = url()->current()."/".$output_link;
    return view('generatelink.displaylink', ['url_baru' => $url_baru, 'url_lama' => $input_link]);
  }

  public function redirect($id) {
    $url = Url::where('url_new', $id)->first();
    
    return redirect($url->url_old);
  }


}
