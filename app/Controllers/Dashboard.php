<?php namespace App\Controllers;
use App\Models\ProductModel; use App\Models\CustomerModel; use App\Models\SaleModel;
class Dashboard extends BaseController { public function index(){ return $this->render('dashboard',['title'=>'Dashboard','stats'=>['products'=>(new ProductModel())->countAllResults(),'customers'=>(new CustomerModel())->countAllResults(),'sales'=>(new SaleModel())->countAllResults()]]); } }
