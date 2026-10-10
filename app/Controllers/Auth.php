<?php namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController
{
 public function login(){ if(session()->get('isLoggedIn')) return redirect()->to('/dashboard'); if($this->request->getMethod()==='post'){ $u=(new UserModel())->where('username',trim($this->request->getPost('username')))->first(); if($u && password_verify($this->request->getPost('password'),$u['password'])){ session()->regenerate(); session()->set(['isLoggedIn'=>true,'user_id'=>$u['id'],'username'=>$u['username'],'full_name'=>$u['full_name']]); return redirect()->to('/dashboard')->with('success','Welcome back, '.$u['full_name'].'!'); } return $this->render('auth/login',['title'=>'Sign in','error'=>'Invalid username or password.']); } return $this->render('auth/login',['title'=>'Sign in']); }
 public function logout(){ session()->destroy(); return redirect()->to('/login')->with('success','You have been signed out.'); }
}
