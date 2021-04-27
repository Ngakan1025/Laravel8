@extends('layout.v_template')
@section('title','Kategori')

@section('content')
<h1>Kategori Buku</h1>
<br>

<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori Buku</th>
            <th>Pegawas</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach ($kategori as $k)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $k->nama_kategori }}</td>
            <td>{{ $k->nama_user}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection