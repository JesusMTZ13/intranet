<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
class ProductosController extends Controller
{
   public function index()
   {
       return view('productos');
   }
   public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'nombre' => 'required|min:3|max:40',
            'img' => 'required|image|mimes: jpg,jpeg,png,gif,svg|max:2048',
            'stock' => 'required',
            'codigo' => 'required'

        ]);
        if($validator ->fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos')
            ->withErrors($validator);
        }else{
            $imagen = $request -> file('img');
            $nombre = time().'.'.$imagen->getClientOriginalExtension();
            $destino = public_path('img/productos');
            $request->img->move($destino , $nombre);
            $red = Image::make($destino.'/'.$nombre);
            $red->resize(200,null,function($constraint){
                    $constraint->aspectRatio();
            });
            $red->save($destino.'/thumbs/'.$nombre);
           dd('Si se subio');

         
            //return back() ->with('Listo','Se ha insertado correctamente');
        }
    }
}
