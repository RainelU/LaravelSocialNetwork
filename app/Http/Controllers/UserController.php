<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\User;
use Laravel\Chat;
use Auth;
use Image;

class UserController extends Controller
{
    public function tweets(){
		return view('tweets');
	}

	public function profile(){
		return view('profile');
	}

	public function update_avatar(Request $request){

		$this->validate($request, [
			'avatar'  => 'required|mimes:svg,jpeg,jpg,png,gif|max:2048'
		]);

		if ($request->hasFile('avatar')) {
			$avatar = $request->file('avatar', 'image/jpeg/svg');
			$filename = md5(bcrypt(sha1(hexdec(rand(0, 120) . time())))) . md5(bcrypt(bcrypt(sha1(hexdec(rand(0, 120) . time() . date('yy-mm-dd')))))) . sha1(bcrypt(sha1(md5(hexdec(rand(0, 120) . time() . date('yy-mm-dd')))))) .'.' . $avatar->getClientOriginalExtension();
			$path = public_path('img/' . $filename);

			Image::make($avatar)->resize(300, 300)->save($path);

			$user = Auth::user();
			$user->avatar = $filename;
			$user->save();

			return back()->with('sucess', 'Has cambiado la imagen correctamente');
		}else{
			$errorImage = "No imagen";
			return view('home', compact('home',$errorImage));
		}
	}

	public function user_image(){

		return view('userimage');
	}
}
