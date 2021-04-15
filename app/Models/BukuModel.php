<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BukuModel extends Model
{
    public function allData()
    {
        return DB::table('tb_buku')->get();
    }

    public function detailBuku($id_buku)
    {
        return DB::table('tb_buku')->where('id_buku', $id_buku)->first();
    }

    public function addData($data)
    {
        DB::table('tb_buku')->insert($data);
    }

    public function editData($id_buku, $data)
    {
        DB::table('tb_buku')->where('id_buku', $id_buku)->update($data);
    }

    public function deleteData($id_buku)
    {
        DB::table('tb_buku')->where('id_buku', $id_buku)->delete();
    }
}