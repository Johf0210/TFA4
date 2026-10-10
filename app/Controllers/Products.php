<?php namespace App\Controllers;
use App\Models\ProductModel;
class Products extends BaseController
{
 private function rules(){return ['name'=>'required|max_length[100]','price'=>'required|decimal','stock_quantity'=>'required|integer|greater_than_equal_to[0]','image'=>'permit_empty|is_image[image]|max_size[image,2048]'];}
 public function index(){return $this->render('products/index',['title'=>'Products','products'=>(new ProductModel())->orderBy('id','DESC')->findAll()]);}
 public function new(){return $this->render('products/form',['title'=>'Add product','product'=>null]);}
 public function create(){ $m=new ProductModel(); if(!$this->validate($this->rules())) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors()); $data=$this->request->getPost(['name','price','stock_quantity']); $file=$this->request->getFile('image'); if($file && $file->isValid()&&!$file->hasMoved()){ $name=$file->getRandomName(); $file->move(FCPATH.'uploads/products',$name); $data['image']=$name; } $data['created_at']=date('Y-m-d H:i:s'); $m->insert($data); return redirect()->to('/products')->with('success','Product added.'); }
 public function edit($id){$p=(new ProductModel())->find($id); return $p?$this->render('products/form',['title'=>'Edit product','product'=>$p]):redirect()->to('/products');}
 public function update($id){$m=new ProductModel(); if(!$this->validate($this->rules())) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors()); $data=$this->request->getPost(['name','price','stock_quantity']); $file=$this->request->getFile('image'); if($file&&$file->isValid()&&!$file->hasMoved()){ $name=$file->getRandomName(); $file->move(FCPATH.'uploads/products',$name); $data['image']=$name; } $m->update($id,$data); return redirect()->to('/products')->with('success','Product updated.'); }
 public function delete($id){(new ProductModel())->delete($id);return redirect()->to('/products')->with('success','Product deleted.');}
}
