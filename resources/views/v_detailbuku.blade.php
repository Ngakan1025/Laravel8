@extends('layout.v_template')
@section('title','Detail Buku')

@section('content')
<h1>Detail Buku</h1>

<table class="table">
    <tr>
        <th width="100px">Judul Buku</th>
        <th width="30px">:</th>
        <th>{{ $buku->judul_buku }}</th>
    </tr>
    <tr>
        <th width="100px">Penulis</th>
        <th width="30px">:</th>
        <th>{{ $buku->penulis }}</th>
    </tr>
    <tr>
        <th width="100px">Penerbit</th>
        <th width="30px">:</th>
        <th>{{ $buku->penerbit }}</th>
    </tr>
    <tr>
        <th width="100px">Sampul Buku</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_buku/'.$buku->sampul_buku) }}" width="100px"></th>
    </tr>
    <tr>
        <th><a href="/buku" class="btn btn-success btn-sm">Kembali</a></th>
    </tr>
</table>

@endsection