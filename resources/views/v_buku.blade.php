@extends('layout.v_template')
@section('title','Buku')

@section('content')
<h1>Buku</h1>
<br>
<table class="table table-bordered">
    <a href="buku/add" class="btn btn-primary btn-sm">Tambahkan Buku</a> <br>
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('pesan') }}
    </div>
    @endif
    <br>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Sampul</th>
            <th>Perintah</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($buku as $b)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $b->judul_buku }}</td>
            <td>{{ $b->penulis }}</td>
            <td>{{ $b->penerbit }}</td>
            <td><img src="{{ url('foto_buku/'.$b->sampul_buku) }}" width="100px"></td>
            <td>
                <a href="/buku/detail/{{ $b->id_buku }}" class="btn btn-sm btn-success">Detail</a>
                <a href="/buku/edit/{{ $b->id_buku }}" class="btn btn-sm btn-warning">Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $b->id_buku }}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($buku as $b)
<div class="modal modal-danger fade" id="delete{{ $b->id_buku }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $b->judul_buku }}</h4>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini ???&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <a href="/buku/delete/{{ $b->id_buku }}" class="btn btn-outline">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

@endsection