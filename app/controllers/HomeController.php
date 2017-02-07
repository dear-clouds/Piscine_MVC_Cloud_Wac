<?php

class HomeController extends BaseController {

	public function showWelcome()
	{

		if (Auth::guest())
		{
			return View::make('index', compact('users'));
		}


		$users = User::all();
		$totalSize = Upload::where('user_id', '=', Auth::user()->id)
		->join('users', 'uploads.user_id', '=', 'users.id')
		->sum('uploads.size');

		if ($totalSize>52428800)
		{
			return Redirect::to('profile')->with('success', 'Votre compte est bloqué. Vous ne pouvez plus uploader de fichiers.');   
		}

		return View::make('index', compact('users'));
	}

	public function showAdmin()
	{
		$users = User::all();
		$userCount = User::all();
		$uploads = Upload::all();
		$uploadCount = Upload::all();
		$users = User::orderBy('created_at', 'DESC')->paginate(10);
		$uploads = Upload::orderBy('created_at', 'DESC')->paginate(10);

		$username = Upload::join('users', 'uploads.user_id', '=', 'users.username')
					->where('users.id', '=', 'uploads.user_id')
                    ->get();

        // var_dump($username);
		return View::make('admin', compact('users', 'uploads', 'userCount', 'uploadCount', 'username'));
	}


	public function contact(){

		return View::make('contact');
	}


	public function sendContact()
	{

		$data = Input::all();

		$rules = array (
			'name' => 'required|alpha',
			'email' => 'required|email',
			'message' => 'required|min:2'
			);


		$validator  = Validator::make ($data, $rules);


		if ($validator -> passes())
		{

			Mail::send('emails.hello', $data, function($message) use ($data)
			{
				$message->from($data['email'] , $data['name']);                  
				$message->to('bluewatermelon@free.fr', 'Mio')->cc('bluewatermelon@free.fr')->subject('Contact');

			});

			return Redirect::to('contact')->with('success', 'Votre message a bien été envoyé aux administrateurs.');  
		}

		else
		{
			return Redirect::to('contact')->withErrors($validator);
		}
	}







}