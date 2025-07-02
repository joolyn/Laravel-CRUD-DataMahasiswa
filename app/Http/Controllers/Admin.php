<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use App\Models\Mahasiswa;

class Admin extends Controller
{
    public function index ()
    {
        $data_mahasiswa = Mahasiswa::get();
        return view('admin', compact('data_mahasiswa'));
    }

    public function crud_data (Request $request) 
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'program_studi' => 'required',
        ]);

        if ($request->action == 'create') {
            Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'program_studi' => $request->program_studi,
            ]);
        } else if ($request->action == 'update') {
            $data_available = Mahasiswa::find($request->id);

            if (!$data_available) {
                return redirect()->back()->with('message', 'Mahasiswa Tidak Ditemukan');
            } 
            $data_available->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'program_studi' => $request->program_studi,
            ]);

        } else if ($request->action == 'delete') {
            $data_available = Mahasiswa::find($request->id);
            $data_available->delete();
        }

        return redirect()->back()->with('message', 'Compleated Task');;
    }
}
