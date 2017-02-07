<?php

class Register extends Eloquent {
        protected $guarded = array('id', 'created_at', 'updated_at', 'remember_token');
        protected $table = 'users';
        protected $fillable = array('username', 'lastname', 'email', 'name', 'birthdate', 'password');
        public $timestamps = true;
 
        public static function saveFormData($data)
        {
        	$password = $data['password'];
            $data['password'] = Hash::make($data['password']);
            DB::table('users')->insert($data);
        }

 
}