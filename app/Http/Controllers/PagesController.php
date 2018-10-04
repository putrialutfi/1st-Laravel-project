<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Contoh;

class PagesController extends Controller
{
    public function beforeLogin(){
    	return view('pages.index');
    }

    public function portofolio(){
      $contoh_list1 = Contoh::where('id_produk', '1')->get();
      $contoh_list2 = Contoh::where('id_produk', '2')->get();
    	return view('pages.portofolio', compact('contoh_list1', 'contoh_list2'));
    }

    public function show($id){
      $contoh = Contoh::findOrFail($id);
    	return view ('pages/show', compact('contoh'));
    }

    public function afterLogin(){
    	return view('admins.dashboard');
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' =>['beforeLogin', 'portofolio', 'show']]);
    }
}
