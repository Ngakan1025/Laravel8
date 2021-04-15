<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->BukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'buku' => $this->BukuModel->allData(),
        ];
        return view('v_buku', $data);
    }

    public function detail($id_buku)
    {
        if (!$this->BukuModel->detailBuku($id_buku)) {
            abort(404);
        }
        $data = [
            'buku' => $this->BukuModel->detailBuku($id_buku),
        ];
        return view('v_detailbuku', $data);
    }

    public function add()
    {
        return view('v_addbuku');
    }

    public function insert()
    {
        Request()->validate([
            'judul_buku' => 'required|unique:tb_buku,judul_buku|min:1|max:255',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul_buku' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ]);

        //upload gambar
        $file = Request()->sampul_buku;
        $fileName = Request()->judul_buku . '.' . $file->extension();
        $file->move(public_path('foto_buku'), $fileName);

        $data = [
            'judul_buku' => Request()->judul_buku,
            'penulis' => Request()->penulis,
            'penerbit' => Request()->penerbit,
            'sampul_buku' =>  $fileName,
        ];

        $this->BukuModel->addData($data);

        return redirect()->route('buku')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id_buku)
    {
        if (!$this->BukuModel->detailBuku($id_buku)) {
            abort(404);
        }
        $data = [
            'buku' => $this->BukuModel->detailBuku($id_buku),
        ];
        return view('v_editbuku', $data);
    }

    public function update($id_buku)
    {
        Request()->validate([
            'judul_buku' => 'required|min:1|max:255',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul_buku' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ]);

        if (Request()->sampul_buku <> "") { //jka mengganti foto
            //upload gambar
            $file = Request()->sampul_buku;
            $fileName = Request()->judul_buku . '.' . $file->extension();
            $file->move(public_path('foto_buku'), $fileName);

            $data = [
                'judul_buku' => Request()->judul_buku,
                'penulis' => Request()->penulis,
                'penerbit' => Request()->penerbit,
                'sampul_buku' =>  $fileName,
            ];

            $this->BukuModel->editData($id_buku, $data);
        } else { //jika tidak mengganti foto
            $data = [
                'judul_buku' => Request()->judul_buku,
                'penulis' => Request()->penulis,
                'penerbit' => Request()->penerbit,
            ];

            $this->BukuModel->editData($id_buku, $data);
        }

        return redirect()->route('buku')->with('pesan', 'Data Berhasil Di Update !!!');
    }

    public function delete($id_buku)
    {
        //hapus foto
        $buku = $this->BukuModel->detailBuku($id_buku);
        if ($buku->sampul_buku <> "") {
            unlink(public_path('foto_buku') . '/' . $buku->sampul_buku);
        }
        $this->BukuModel->deleteData($id_buku);
        return redirect()->route('buku')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }
}