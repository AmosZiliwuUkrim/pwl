@extends('layout.main')
@section('judul','Tambah Data Student')

@section('content')
    <form method="post" action="{{url('student/insert')}}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{old('dob')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ID Guru Pembimbing</label>
                            <input type="number"
                                   class="form-control @error('id_teacher') is-invalid @enderror"
                                   value="{{old('id_teacher')}}"
                                   name="id_teacher">
                            @error('id_teacher')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary shadow-lg">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
