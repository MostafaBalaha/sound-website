<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SoundController extends Controller
{
    public function convert(Request $request){
        if($request->hasFile('audio')){
            $audioName = $request->file('audio')->getFilename();
            $audioExt = $request['ext'];
            $path = request()->file('audio')->store('public/audios');
            $response = Http::attach('audio', file_get_contents(request()->file('audio')),'toText.'.$audioExt)
                ->post('https://sound-convert-flask-server.herokuapp.com/soundtotext');


            return response($response);
        }
        return response('File Not Found', 404);
    }

    public function emo(Request $request){
        if($request->hasFile('audio')){
            $audioName = $request->file('audio')->getFilename();
            $audioExt = $request['ext'];
            $path = request()->file('audio')->store('public/audios');
            $response = Http::attach('audio', file_get_contents(request()->file('audio')),'toEmo.'.$audioExt)
                ->post('https://sound-convert-flask-server.herokuapp.com/soundtoemo');


            return response($response);
        }
        return response('File Not Found', 404);
    }
}
