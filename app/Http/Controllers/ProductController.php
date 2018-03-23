<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
   public function index(){
   		$products = Product::paginate(10);
   		return view('admin.products.index')->with(compact('products'));//listado
   }
   public function create(){
   		return view('admin.products.create');//formulario de registro
   	
   }
   public function store(Request $request){
   		//registrar producto
   		//dd($request -> all());
   		$product = new Product();
   		$product -> name = $request->input('name');
   		$product -> description = $request->input('description');
   		$product -> price = $request->input('price');
   		$product -> long_description = $request->input('long_description');

   		$product -> save(); //INSERT

   		return redirect('/admin/products');
   }
   public function edit($id){
   		$product = Product::find($id);
   		return view('admin.products.edit')->with(compact('product'));//formulario de edicion
   }
   public function update(Request $request, $id){
		$product = Product::find($id);
   		$product -> name = $request->input('name');
   		$product -> description = $request->input('description');
   		$product -> price = $request->input('price');
   		$product -> long_description = $request->input('long_description');

   		$product -> save(); //INSERT

   		return redirect('/admin/products');
   }
   public function destroy($id){
   		$product = Product::find($id);
   		$product->delete($id);//DELETE
   		return back();
   }
}
