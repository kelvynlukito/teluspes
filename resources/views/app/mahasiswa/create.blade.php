@extends('layouts.master')
@section('content')
@section('title', 'Create Mahasiswa')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Mahasiswa</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="" placeholder="Enter Data" name="name">
            </div>
            <div class="form-group">
                <label for="">NIM</label>
                <input type="text" class="form-control" id="" placeholder="Enter Data" name="nim">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username">
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection