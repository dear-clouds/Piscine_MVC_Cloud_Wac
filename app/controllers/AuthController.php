<?php

class AuthController extends BaseController {

    public function showLogin()
    {
        if (Auth::check())
        {
            return Redirect::to('')->with('success', 'Vous êtes déjà connecté.');
        }

        return View::make('auth.login');
    }


    public function showRegistration()
    {
        if (Auth::check())
        {
            return Redirect::to('')->with('info', 'Vous êtes déjà inscrit.');
        }

        return View::make('auth.register');
    }

    public function postRegistration()
    {
        $data =  Input::except(array('_token')) ;
        $rule  =  array(
            'username'       => 'required|unique:users',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:4'
            ) ;

        $validator = Validator::make($data,$rule);

        if ($validator->fails())
        {
            return Redirect::to('register')
            ->withErrors($validator->messages());
        }
        else
        {
            Register::saveFormData(Input::except(array('_token')));

            return Redirect::to('login')->with('success', 'Vous pouvez dès à présent vous connecter.');
        }

    }


    public function showProfile()
    {
        $uploadCount = Upload::where('user_id', '=', Auth::user()->id)->get();
        $uploads = DB::table('uploads')
            ->where('user_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $totalSize = Upload::where('user_id', '=', Auth::user()->id)
                    ->join('users', 'uploads.user_id', '=', 'users.id')
                    ->sum('uploads.size');

        // $path = $uploadCount->url;
        // $folders = File::allFiles(public_path() . '/uploads');

        // $uploads = Upload::orderBy('created_at', 'DESC')->paginate(5);

        // if ($totalSize>800)
        // {
        //     return Redirect::to('profile')->with('success', 'Votre compte est bloqué. Vous ne pouvez plus uploader de fichiers.');   
        // }

        return View::make('auth.profile', compact('uploads', 'uploadCount', 'totalSize'));

    }



    public function postLogin()
    {
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
            );

        $rules = array(
            'username'  => 'Required',
            'password'  => 'Required'
            );

        $validator = Validator::make($userdata, $rules);

        if ($validator->passes())
        {
            if (Auth::attempt($userdata))
            {
                return Redirect::to('')->with('success', 'Vous êtes bien connecté.');
            }
            else
            {
                return Redirect::to('login')->with('error', 'Mauvais identifiant/Mot de passe')->withInput(Input::except('password'));
            }
        }

        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }


    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('')->with('info', 'Vous venez de vous déconnecter.');
    }


    // public function edit()
    // {
    //     User->user_id == Auth::user()->id
    // }


    public function edit($id)
    {
    //
    }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }



}