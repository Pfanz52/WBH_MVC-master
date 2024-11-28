<?php

/**
* 
*/
class ProductAdminController extends Controller
{
	
	function __construct()
	{
		$this->folder = "admin";
		if(!isset($_SESSION['admin'])){
			header("Location: https://localhost:8012/WBH_MVC-master/indexadmin");
		}
	}
	function index(){
		require_once 'vendor/Model.php';
		require_once 'models/admin/productModel.php';
		$md = new productModel;
		$data = $md->getAllPrds();
		$this->render('product',$data,'SẢN PHẨM','admin');
	}
}