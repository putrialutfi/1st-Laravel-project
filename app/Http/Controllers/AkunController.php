<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Validator;

use Session;

class AkunController extends Controller
{

    public function index()
    {
      $akun_list = User::all();
      return view('admins/akun/index', compact('akun_list'));
    }

    public function create()
    {
        return view('admins/akun/create');
    }

    public function store(Request $request)
    {
      $data = $request->all();

      $validasi = Validator::make($data, [
        'name'     => 'required|max:255',
        'username' => 'required|max:20|regex:/^\S*$/u|unique:users',
        'email'    => 'required|email|max:100|unique:users',
        'password' => 'required|confirmed|min:6',
      ]);

      if($validasi->fails()) {
        return redirect('admins/akun/create')
        ->withInput()
        ->withErrors($validasi);
      }

      //hash password
      $data['password'] = bcrypt($data['password']);

      User::create($data);
      Session::flash('flash_message', 'Akun Berhasil Ditambah.');
      return redirect('admins/akun');
    }

    public function show($id)
    {
        return redirect('admins/akun');
    }

    public function edit($id)
    {
        $akun = User::findOrFail($id);
        return view('admins/akun/edit', compact('akun'));
    }

    public function update($id, Request $request)
    {
        $akun = User::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
          'name'    => 'required|max:255',
          'username' => 'required|max:20|regex:/^\S*$/u|unique:users,username,' . $data['id'],
          'email'   => 'required|email|max:100|unique:users,email,' . $data['id'],
          'password'=> 'sometimes|confirmed',
        ]);

        if(!empty($data['password']))
        {
            $validasi = Validator::make($data, ['password' => 'min:6']);
            $data['password'] = bcrypt($data['password']);
        }
        else
        {
            $data = array_except($data,array('password'));
        }

        if($validasi->fails()) {
          return redirect("admins/akun/$id/edit")
          ->withErrors($validasi)
          ->withInput();
        }

        $akun->update($data);
        Session::flash('flash_message', 'Item Berhasil Diubah.');
        return redirect('admins/akun');
    }
    public function destroy($id)
    {
        $akun = User::findOrFail($id);
        $akun->delete();
        Session::flash('flash_message', 'Data Akun Berhasil Dihapus.');
        Session::flash('penting', true);
        return redirect('admins/akun');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
