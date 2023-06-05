@extends('layouts.master')
@section('content')
@section('title', 'Reservasi')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="" class="btn btn-primary">Create</a>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Gedung</th>
                            <th>Nomor Ruangan</th>
                            <th>Tanggal</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($reservasis as $item)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->ruangan->id_gedung}}</td>
                            <td>{{ $item->ruangan->id }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->jam_mulai }}</td>
                            <td>{{ $item->jam_selesai }}</td>
                            <td>{{ $item->keperluan }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if ($item->status == 'Disetujui')
                                <form action="{{route('reservasi.update', $item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="status" value="Selesai" hidden>
                                    <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                </form>
                                @elseif($item->status == 'Ditolak')
                                @else
                                <form action="{{route('reservasi.update', $item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="status" value="Ditolak" hidden>
                                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                                <form action="{{route('reservasi.update', $item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="status" value="Disetujui" hidden>
                                    <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                </form>
                                @endif
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