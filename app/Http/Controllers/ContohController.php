<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContohRequest;

use App\Produk;

use App\Contoh;

use Session;

use Storage;

class ContohController extends Controller
{

    public function index()
    {
      $list_produk   = Produk::pluck('nama_produk', 'id');
      $contoh_list   = Contoh::orderBy('created_at', 'desc')->paginate(10);
      $jumlah_contoh = Contoh::count();
      return view('admins/contoh/index', compact('contoh_list', 'jumlah_contoh', 'list_produk'));
    }

    public function create()
    {
      $list_produk = Produk::pluck('nama_produk', 'id');
      return view('admins/contoh/create', compact('list_produk'));
    }

    public function store(ContohRequest $request)
    {
      $input = $request->all();

      if($request->hasFile('fotocontoh')) {
        $input['fotocontoh'] = $this->uploadFoto($request);
      }

      $contoh = Contoh::create($input);
      Session::flash('flash_message', 'Portofolio Berhasil Ditambah.');
      return redirect('admins/contoh');
    }

    public function show(Contoh $contoh)
    {
        return view('admins/contoh/show', compact('contoh'));
    }

    public function edit(Contoh $contoh)
    {
        $list_produk = Produk::pluck('nama_produk', 'id');
        return view('admins/contoh/edit', compact('contoh', 'list_produk'));
    }

    public function update(ContohRequest $request, Contoh $contoh)
    {
        $input = $request->all();
        //cek foto baru di from
        if($request->hasFile('fotocontoh')) {
          //hapus foto lama
          $this->hapusFoto($contoh);

          //upload foto baru
          $input['fotocontoh'] = $this->uploadFoto($request);
        }

        $contoh->update($input);
        Session::flash('flash_message', 'Data Portofolio Berhasil Diperbarui');
        return redirect('admins/contoh');
    }

    public function destroy(Contoh $contoh)
    {
        $contoh->delete();
        Session::flash('flash_message', 'Data Berhasil Dihapus');
        Session::flash('penting', true);
        return redirect('admins/contoh');
    }

    public function uploadFoto(ContohRequest $request) {
      $foto = $request->file('fotocontoh');
      $ext  = $foto->getClientOriginalExtension();

      if($request->file('fotocontoh')->isValid()) {
        $foto_name   = date('YmdHis'). ".$ext";
        $upload_path = 'fotocontoh';
        $request->file('fotocontoh')->move($upload_path, $foto_name);

        return $foto_name;
      }
      return false;
    }

    public function hapusFoto(Contoh $contoh) {
      $exist = Storage::disk('fotocontoh')->exists($contoh->fotocontoh);
      if(isset($contoh->fotocontoh) && $exist) {
        $delete = Storage::disk('fotocontoh')->delete($contoh->fotocontoh);
        if($delete) {
          return true;
        }
        return false;
      }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
