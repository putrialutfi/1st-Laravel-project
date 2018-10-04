<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\Produk;

use App\Order;

use Validator;

use Session;

class OrderController extends Controller
{
    public function index()
    {
        $produks    = Produk::pluck('nama_produk', 'id');
        return view ('order/create', compact('produks'));
    }

    public function withAjax($id){
        $items = Item::all()
                  ->where('id_produk',$id)
                  ->pluck('nama_item','id');
        echo json_encode($items);
        exit();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
          'nama'       => 'required|max:50|string',
          'alamat'     => 'required|max:100|string',
          'email'      => 'required|email|max:50|unique:order,email',
          'no_telp'    => 'required|numeric|digits_between:10,15|unique:order,no_telp',
          'id_item'    => 'required',
          'detail'     => 'sometimes|string|nullable|max:280',
          'filebrief'  => 'required|mimes:pdf|max:10000',
        ]);

        if($validasi->fails()) {
          return redirect('order')
          ->withInput()
          ->withErrors($validasi);
        }

        if($request->hasFile('filebrief')){
          $filebrief = $request->file('filebrief');

          if($request->file('filebrief')->isValid()){
            $file_name   = date('YmdHis') . ".pdf";
            $upload_path = 'filebrief';
            $request->file('filebrief')->move($upload_path, $file_name);
            $data['filebrief']   = $file_name;
          }
        }

        Order::create($data);
        Session::flash('flash_message', 'Data Anda Akan Kami Pelajari. Kami akan menghubungi secepatnya. Terima Kasih!');
        return redirect('order');
      }

      public function show(){

      }
}
