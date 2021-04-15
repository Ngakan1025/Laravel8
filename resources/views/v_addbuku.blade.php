@extends('layout.v_template')
@section('title','Add Buku')

@section('content')
<h1>Tambahkan Buku</h1>

<form action="/buku/insert" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Judul Buku</label>
                    <input name="judul_buku" class="form-control @error('judul_buku') is-invalid @enderror"
                        value="{{ old('judul_buku') }}">
                    <div class="text-danger">
                        @error('judul_buku')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Penulis</label>
                    <input name="penulis" class="form-control @error('penulis') is-invalid @enderror"
                        value="{{ old('penulis') }}">
                    <div class="text-danger">
                        @error('penulis')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Penerbit</label>
                    <input name="penerbit" class="form-control @error('penerbit') is-invalid @enderror"
                        value="{{ old('penerbit') }}">
                    <div class="text-danger">
                        @error('penerbit')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Sampul Buku</label>
                    <input type="file" name="sampul_buku"
                        class="form-control @error('sampul_buku') is-invalid @enderror"
                        value="{{ old('sampul_buku') }}">
                    <div class="text-danger">
                        @error('sampul_buku')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>

@endsection