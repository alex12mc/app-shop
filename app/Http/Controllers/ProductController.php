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
         $rules = [
               'name' => 'required|min:3',
               'description' => 'required|max:200',
               'price' => 'required|numeric|min:0'
         ];
         $messages = [
               'name.required' => 'El campo Nombre es requerido.',
               'name.min' => 'Es necesario ingresar al menos tres caracteres en el campo Nombre.',
               'description.required' => 'El campo Descripción es requerido.',
               'description.max' => 'El campo Descripción solo permite 200 caracteres.',
               'price.required' => 'El campo Precio es requerido.',
               'price.numeric' => 'El campo Precio debe de ser numerico.',
               'price.min' => 'El valor del campo Precio debe de ser mayor a cero.'
         ];
         $this -> validate($request, $rules, $messages);
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
         $rules = [
               'name' => 'required|min:3',
               'description' => 'required|max:200',
               'price' => 'required|numeric|min:0'
         ];
         $messages = [
               'name.required' => 'El campo Nombre es requerido.',
               'name.min' => 'Es necesario ingresar al menos tres caracteres en el campo Nombre.',
               'description.required' => 'El campo Descripción es requerido.',
               'description.max' => 'El campo Descripción solo permite 200 caracteres.',
               'price.required' => 'El campo Precio es requerido.',
               'price.numeric' => 'El campo Precio debe de ser numerico.',
               'price.min' => 'El valor del campo Precio debe de ser mayor a cero.'
         ];
         $this -> validate($request, $rules, $messages);
         
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
