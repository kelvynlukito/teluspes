 @extends('layouts.master')
 @section('content')
 @section('title', 'Edit Ruangan')
 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">Create Ruangan</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
         @csrf
         <div class="card-body">
             <div class="form-group">
                 <label for="">Nomor Ruangan</label>
                 <input type="text" class="form-control" id="" placeholder="Enter Data" name="nomor_ruangan" value="{{ $ruangan->nomor_ruangan }}">
             </div>
             <div class="form-group">
                 <label for="">Nama Gedung</label>
                 <select name="id_gedung" id="" class="form-control">
                     @foreach ($gedungs as $gedung)
                     <option value="{{ $gedung->id }}" {{ $gedung->id == $ruangan->id_gedung ? 'selected' : '' }}>{{ $gedung->nama_gedung }}</option>
                     @endforeach
                 </select>
             </div>

         </div>
         <!-- /.card-body -->

         <div class="card-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>
     </form>
 </div>
 @endsection