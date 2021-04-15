@extends('layout.v_template')
@section('title','User')

@section('content')
<h1>User</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <ul>
                <li>
                    <h4><?= $Nama; ?></h4>
                </li>
                <li>
                    <h4><?= $Nim; ?></h4>
                </li>
                <li>
                    <h4><?= $Prodi; ?></h4>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection