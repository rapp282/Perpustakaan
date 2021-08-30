<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class PerpusController extends Controller
{
    public function table()
    {
        $buku=Buku::all();

        return view('table', ['buku'=>$buku]);
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function simpan(Request $request)
    {
        $this-> validate($request,[
            'nama_buku' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required'
        ]);

        Buku::create([
            'nama_buku' => $request->nama_buku,
            'penerbit' => $request->penerbit,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('/table');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);

        return view('edit', ['buku'=>$buku]);
    }

    public function update($id, Request $request)
    {
        $this-> validate($request,[
            'nama_buku' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required'
        ]);

        $buku = Buku::find($id);
            $buku->nama_buku = $request->nama_buku;
            $buku->penerbit = $request->penerbit;
            $buku->deskripsi = $request->deskripsi;
            $buku-> save();

            return redirect('/table');
    }

    public function hapus($id)
    {
        $buku = Buku::find($id);
        $buku-> delete();

        return redirect('/table');
    }

    public function dashboard()
    {
        $row = DB::table('bukus')->count();

        return view('welcome', ['row'=>$row]);
    }

    public function login(Request $request)
    {
        $user = DB::table('user')->where('username', $request->username)->where('password', $request->password)->first();
        if ($user == null)
        {
            $cek3= 1;

            return view('login',['cek3'=>$cek3]);
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    public function first()
    {
        $cek3 = 0;

        return view('login', ['cek3' => $cek3]);
    }
}
