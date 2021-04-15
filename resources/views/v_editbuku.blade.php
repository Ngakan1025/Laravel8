@extends('layout.v_template')
@section('title','Edit Buku')

@section('content')
<h1>Edit Buku</h1>

<form action="/buku/update/{{ $buku->id_buku }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Judul Buku</label>
                    <input name="judul_buku" class="form-control @error('judul_buku') is-invalid @enderror"
                        value="{{ $buku->judul_buku }}" readonly>
                    <div class="text-danger">
                        @error('judul_buku')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Penulis</label>
                    <input name="penulis" class="form-control @error('penulis') is-invalid @enderror"
                        value="{{ $buku->penulis }}">
                    <div class="text-danger">
                        @error('penulis')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Penerbit</label>
                    <input name="penerbit" class="form-control @error('penerbit') is-invalid @enderror"
                        value="{{ $buku->penerbit }}">
                    <div class="text-danger">
                        @error('penerbit')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-sm 12">
                    <div class="col-sm-4">
                        <img src="{{ url('foto_buku/'.$buku->sampul_buku) }}" width="100px">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Ganti Sampul Buku</label>
                            <input type="file" name="sampul_buku"
                                class="form-control @error('sampul_buku') is-invalid @enderror"
                                value="{{ old('sampul_buku') }}">
                            <div class="text-danger">
                                @error('sampul_buku')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
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