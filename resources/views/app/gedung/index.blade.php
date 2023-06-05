@extends('layouts.master')
@section('content')
@section('title', 'Gedung')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('gedung.create') }}" class="btn btn-primary">Create</a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Gedung</th>
                            <th>Status Gedung</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($gedungs as $item)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_gedung }}</td>
                            <td>{{ $item->status_gedung }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('gedung.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{route('gedung.delete', $item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection