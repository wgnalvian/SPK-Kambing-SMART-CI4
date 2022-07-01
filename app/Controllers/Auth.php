<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends BaseController
{
    public $user;

    public function __construct()
    {
       $this->user = new User(); 
    }
    public function index()
    {
        echo view('opening/opening');
    }
    public function register()
    {
       
        echo view('auth/register');
    }
      public function petunjuk()
    {
       
        echo view('home/petunjuk');
    }



    public function registerAction(){
        if(!$this->validate(
            [
                "username" => [
                    "rules" => "required|is_unique[user.username]",
                    "errors" => ["required" => "Username harus diisi","is_unique" => "username sudah dipakai"]
                ],              
                   
                "password" => [
                    "rules" => "required",
                    "errors" => ["required" => "Password harus diisi"]
                ]
            ]
        )){
            session()->setFlashdata('error',$this->validator->getErrors());
            return redirect()->back()->withInput();
        }else{
          
            $this->user->insert([
                'username' => $this->request->getGetPost('username'),
                'password' => $this->request->getGetPost('password')
            ]);
           
            return redirect()->to('/login');
        }
    }
    
    public function login(){
        echo view('auth/login');
    }

    public function loginAction(){
        if(!$this->validate(
            [
                "username" => [
                    "rules" => "required",
                    "errors" => ["required" => "Username harus diisi"]
                ],
                
                "password" => [
                    "rules" => "required",
                    "errors" => ["required" => "Password harus diisi"]

                ]
            ]
        )){
            session()->setFlashdata('error',$this->validator->getErrors());
            return redirect()->back()->withInput();
        }else{
            
            $user = $this->user->where('username',$this->request->getPost('username'))->first();  
            if($user){
                if($user['password'] == $this->request->getGetPost('password')){
                   session()->set('user',$user);
                    return redirect()->to('/home');
                }else{
                    session()->setFlashdata('error',['password' => 'Password salah','username' => '']);
                    return redirect()->back()->withInput();
                }
            }else{
                session()->setFlashdata('error',['username' => 'Username tidak ditemukan','password' => '']);
                return redirect()->back()->withInput();
            }           
            
        }
    }
    public function logout(){
        session()->destroy('user');
        return redirect()->to('/');
    }
}
