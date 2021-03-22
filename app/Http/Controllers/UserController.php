<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'Nama' => 'Ngakan Made Krisna Sedana',
            'Nim' => '1915101025',
            'Prodi' => 'Ilmu Komputer 4A'
        ];
        return view('v_user', $data);
    }
}