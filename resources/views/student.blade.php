@extends('layout.main')
@section('judul', "Halaman Murid")

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Tanggal Lahir</td>
                            <td>Nama Dosen Wali</td>
                        </tr>
                        @foreach($students as $s)
                            <tr>
                                <td>{{$s->name}}</td>
                                <td>{{$s->email}}</td>
                                <td>{{$s->dob}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
