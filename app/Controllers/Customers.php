<?php namespace App\Controllers;
use App\Models\CustomerModel;
class Customers extends BaseController
{ private function rules(){return ['full_name'=>'required|max_length[100]','email'=>'required|valid_email|max_length[100]','phone'=>'permit_empty|max_length[20]'];}
 public function index(){return $this->render('customers/index',['title'=>'Customers','customers'=>(new CustomerModel())->orderBy('id','DESC')->findAll()]);}
 public function new(){return $this->render('customers/form',['title'=>'Add customer','customer'=>null]);}
 public function create(){if(!$this->validate($this->rules()))return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());$d=$this->request->getPost(['full_name','email','phone']);$d['created_at']=date('Y-m-d H:i:s');(new CustomerModel())->insert($d);return redirect()->to('/customers')->with('success','Customer added.');}
 public function edit($id){$c=(new CustomerModel())->find($id);return $c?$this->render('customers/form',['title'=>'Edit customer','customer'=>$c]):redirect()->to('/customers');}
 public function update($id){if(!$this->validate($this->rules()))return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());(new CustomerModel())->update($id,$this->request->getPost(['full_name','email','phone']));return redirect()->to('/customers')->with('success','Customer updated.');}
 public function delete($id){(new CustomerModel())->delete($id);return redirect()->to('/customers')->with('success','Customer deleted.');}
}
