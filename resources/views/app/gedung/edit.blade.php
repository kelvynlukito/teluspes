@extends('layouts.master')
@section('content')
@section('title', 'Edit Gedung')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit gedung</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('gedung.update', $gedung->id) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Gedung</label>
                <input type="text" class="form-control" id="" placeholder="Enter Data" name="nama_gedung" value="{{ $gedung->nama_gedung }}">
            </div>
            <div class="form-group">
                <label for="">Alamat Gedung</label>
                <input type="text" class="form-control" id="" placeholder="Enter Data" name="alamat" value="{{ $gedung->alamat }}">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection