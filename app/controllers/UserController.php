<?php

class UserController extends BaseController {


	public function index()
	{
		$users = User::all();

		return View::make('users.index')
		->with('users', $users);
	}


	public function create()
	{
		return View::make('users.create');
	}


	public function store()
	{

		$rules = array(
			'username'   => 'required|unique:users',
			'email'      => 'required|email|unique:users',
			'password'   => 'required|min:4'
			);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('users/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else {
			$user = new User;
			$user->username       = Input::get('username');
			$user->email      = Input::get('email');
			$user->name = Input::get('name');
			$user->lastname = Input::get('lastname');
			$user->birthdate = Input::get('birthdate');
			$user->save();

			return Redirect::to('users')->with('success', 'Membre ajouté.');
		}
	}


	public function show($id)
	{
		$user = User::find($id);
		$uploadCount = Upload::where('user_id', '=', $id)->get();

		$uploads = DB::table('uploads')
		->where('user_id', $id)
		->orderBy('created_at', 'desc')
		->paginate(5);

		return View::make('users.show', compact('uploads', 'uploadCount'))
		->with('user', $user);
	}


	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit')
		->with('user', $user);
	}


	public function update($id)
	{
		$rules = array(
			'username'       => 'required',
			'email'      => 'required|email'
			);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('users/' . $id . '/edit')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else {

			$user = User::find($id);
			$user->username       = Input::get('username');
			$user->email      = Input::get('email');
			$user->birthdate = Input::get('birthdate');
			$user->name = Input::get('name');
			$user->lastname = Input::get('lastname');
			$user->role = Input::get('role');
			$user->save();

			return Redirect::to('users')->with('success', 'Membre mis à jour.');
		}
	}



	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();

		return Redirect::to('users')->with('success', 'Membre supprimé.');
	}

}