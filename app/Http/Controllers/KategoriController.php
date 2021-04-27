<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->KategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'kategori' => $this->KategoriModel->allData()
        ];
        return view('v_kategori', $data);
    }
}