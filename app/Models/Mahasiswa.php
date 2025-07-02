<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $timestamps = false;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'program_studi',
    ];
}

// use App\Models\Mahasiswa;
// Mahasiswa::create([
//     'nim' => '22552011245',
//     'nama' => 'John',
//     'alamat' => 'Bandung',
//     'tanggal_lahir' => '2002-10-10',
//     'jenis_kelamin' => 'L',
//     'email' => 'john@gmail.com',
//     'program_studi' => 'Teknik Informatika',
// ]);

// Mahasiswa::get();

// Mahasiswa::where('nim', '22552011245')
//     ->update([
//         'nim' => '22552011245',
//         'nama' => 'Johna',
//         'alamat' => 'Bandung',
//         'tanggal_lahir' => '2002-10-10',
//         'jenis_kelamin' => 'L',
//         'email' => 'john@gmail.com',
//         'program_studi' => 'Teknik Informatika',
//     ]);

// Mahasiswa::update([
//     'nim' => '22552011245',
//     'nama' => 'Johna',
//     'alamat' => 'Bandung',
//     'tanggal_lahir' => '2002-10-10',
//     'jenis_kelamin' => 'L',
//     'email' => 'john@gmail.com',
//     'program_studi' => 'Teknik Informatika',
// ])->where('nim', '22552011245');