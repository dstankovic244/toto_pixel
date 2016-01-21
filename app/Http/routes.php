<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Input;
Route::get('/', function () {
    return view('welcome');
});

	Route::get('/form/{local?}', function($local=''){
		
		if($local){ 
			App::setLocale($local);
		}
		return view('form');
	});
	Route::post('/form', function(){
		$pathToFile = $fileName = '';
		if (Input::hasFile('photo'))
		{
			$photo = Input::file('photo');
			$fileName = "photo.".$photo->getClientOriginalExtension();
			
			$pathToFile = public_path() . '/img/';
			
			$photo->move($pathToFile, $fileName);
		}

		$input = Input::all();
		\Mail::send('emails.contact',
				$input, function($message)  use ($pathToFile,$fileName)
				{
					$message->from(env("MAIL_USERNAME"));
					$message->to('dstankovic248@gmail.com', 'Admin')->subject('test');
					if(Input::hasFile('photo')){
						$message->attach($pathToFile.$fileName);
					}
				});
		return redirect('form')->with('message', 'Profile updated!');
	});
		

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
