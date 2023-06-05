@extends('layouts.master')
@section('content')
@section('title', 'Ruangan')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('ruangan.create') }}" class="btn btn-primary">Create</a>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Ruangan</th>
                            <th>Nama Gedung</th>
                            <th>Status Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($ruangans as $item)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nomor_ruangan }}</td>
                            <td>{{ $item->nama_gedung }}</td>
                            <td>{{ $item->status_ruangan }}</td>
                            <td>
                                <a href="{{ route('ruangan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{route('ruangan.delete', $item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor Ruangan</th>
                            <th>Nama Gedung</th>
                            <th>Status Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
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