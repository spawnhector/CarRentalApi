<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class adminController extends Controller
{
    public function login(Request $request){
        $login = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        if (!Auth::attempt($login)) {
            return response(['message'=>'Invalid login']);
        }
        $token = Auth::user()->createToken('Auth Tokeen')->accessToken;
        return response()->json([
            'user'=> Auth::user(),
            'token' => $token
        ],200);
    }

    public function file_upload(Request $request){
        $files = '';
        $paths = [];
        $extensions = [];
        if ($request->hasFile('files')) {
            foreach($request->file('files') as $key => $file)
            {
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                
                switch ($extension) {
                    case 'mp3':
                        $path = $file->store('public/files/vehicle/videos');
                        break;
                    
                    default:
                        $path = $file->store('public/files/vehicle/images');
                        break;
                }
                $insert[$key]['vehicle_id'] = 1;
                $insert[$key]['name'] = $name;
                $insert[$key]['path'] = $path;
                
            // $table->string('type');
            // $table->integer('default');
                array_push($paths,$path);
                array_push($extensions,$extension);
 
            }
        }
        File::insert($insert);
        return response()->json([
            'request'=>$extensions
        ],200);
    }
}
