<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

use App\Item;

use App\Produk;

use Session;

use Storage;

use Validator;

class NotifController extends Controller
{

    public function index()
    {
        $order_list   = Order::orderBy('created_at', 'desc')->paginate(10);
        $jumlah_order = Order::count();
        $list_item    = Item::pluck('nama_item', 'id');
        return view ('admins/order/index', compact('order_list', 'jumlah_order', 'list_item'));
    }

    public function show(Order $order)
    {
        return view ('admins/order/show', compact('order'));
    }

    public function edit(Order $order)
    {
        $produks    = Produk::pluck('nama_produk', 'id');
        return view('admins/order/edit', compact('order', 'produks'));
    }

    public function withAjax($order, $ids){
        $items = Item::all()
                  ->where('id_produk',$ids)
                  ->pluck('nama_item','id');
        return json_encode($items);
    }

    public function update($id, Request $request)
    {
        $order = Order::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
          'nama'       => 'required|max:50|string',
          'alamat'     => 'required|max:100|string',
          'email'      => 'required|email|max:50|unique:order,email,'. $request->input('id'),
          'no_telp'    => 'required|numeric|digits_between:10,15|unique:order,no_telp,'.$request->input('id'),
          'id_item'    => 'sometimes',
          'detail'     => 'sometimes|string|nullable|max:280',
          'filebrief'  => 'sometimes|mimes:pdf|max:10000',
        ]);

        if(empty($data['id_item']))
        {
            $data = array_except($data,array('id_item'));
        }

        if($validasi->fails()) {
          return redirect('admins/order/' . $id .'/edit')
          ->withInput()
          ->withErrors($validasi);
        }

        if($request->hasFile('filebrief')){
          $exist     = Storage::disk('foto')->exists($order->filebrief);
          if(isset($order->filebrief) && $exist) {
            $delete  = Storage::disk('filebrief')->delete($order->filebrief);
          }

          $filebrief = $request->file('filebrief');
          if($request->file('filebrief')->isValid()){
            $file_name   = date('YmdHis') . ".pdf";
            $upload_path = 'filebrief';
            $request->file('filebrief')->move($upload_path, $file_name);
            $data['filebrief']   = $file_name;
          }
        }

        $order->update($data);
        Session::flash('flash_message', 'Data Berhasil Diperbarui.');
        return redirect('admins/order');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        Session::flash('flash_message', 'Data Order Berhasil Dihapus.');
        Session::flash('penting', true);
        return redirect('admins/order');
    }

    public function cari(Request $request) {
      $kata_kunci   = trim($request->input('kata_kunci'));
      if(!empty($kata_kunci)) {
        $list_item    = Item::pluck('nama_item', 'id');
        $id_item      = $request->input('id_item');
        $query        = Order::where('nama', 'LIKE', '%' . $kata_kunci . '%');
        (!empty($id_item)) ? $query->where('id_item', $id_item) : '';
        $order_list   = $query->paginate(10);
        $pagination   = (!empty($id_item)) ? $pagination = $order_list->appends(['id_item' => $id_item]) : '';
        $pagination   = $order_list->appends(['kata_kunci' => $kata_kunci] );
        $jumlah_order = $order_list->total();
        return view('admins/order/index', compact('order_list', 'kata_kunci', 'pagination', 'jumlah_order', 'list_item', 'id_item'));
      }
      else {
          $list_item    = Item::pluck('nama_item', 'id');
          $id_item      = $request->input('id_item');
          $query        = Order::where('id_item', $id_item);
          $order_list   = $query->paginate(10);
          $pagination   = (!empty($id_kelas)) ? $pagination = $order_list->appends(['id_item' => $id_item]) : '';
          $jumlah_order = $order_list->total();
          return view('admins/order/index', compact('order_list', 'pagination', 'jumlah_order', 'list_item', 'id_item'));
      }
      return redirect('admins/order');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
