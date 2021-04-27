<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BukuModel extends Model
{
    public function allData()
    {
        return DB::table('buku_models')->get();
    }

    public function detailBuku($id_buku)
    {
        return DB::table('buku_models')->where('id_buku', $id_buku)->first();
    }

    public function addData($data)
    {
        DB::table('buku_models')->insert($data);
    }

    public function editData($id_buku, $data)
    {
        DB::table('buku_models')->where('id_buku', $id_buku)->update($data);
    }

    public function deleteData($id_buku)
    {
        DB::table('buku_models')->where('id_buku', $id_buku)->delete();
    }
}