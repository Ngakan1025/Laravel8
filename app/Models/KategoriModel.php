<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    public function allData()
    {
        return DB::table('tb_kategori')
        ->leftJoin('tb_user', 'tb_user.id_user', '=', 'tb_kategori.id_user')
            ->get();
    }
}