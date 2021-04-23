@extends('bukus.layout')

@section('content')

<div class="container mt-5">
 <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
      <div class="card-header">Edit Buku</div>
      <div class="card-body">
         @if ($errors->any())
         <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <form method="post" action="{{ route('bukus.update', $bukus->id_buku) }}" id="myForm">
         @csrf
         @method('PUT')
            <div class="form-group">
               <label for="id_buku">ID Buku</label>
               <br>
               <input type="text" name="id_buku" class="form-control" id="id_buku" value="{{ $bukus->id_buku }}" aria describedby="id_buku" >
            </div>
            <div class="form-group">
               <label for="judul">Judul</label>
               <br>
               <input type="text" name="judul" class="form-control" id="Judul" value="{{ $bukus->judul }}" aria describedby="Buku" >
            </div>
            <div class="form-group">
               <label for="kategori">Kategori</label>
               <br>
               <input type="text" name="kategori" class="form-control" id="Kategori" value="{{ $bukus->kategori }}" aria describedby="Kategori" >
            </div>
            <div class="form-group">
               <label for="penerbit">Penerbit</label>
               <br>
               <input type="text" name="penerbit" class="form-control" id="Penerbit" value="{{ $bukus->penerbit }}" aria describedby="Penerbit" >
            </div>
            <div class="form-group">
               <label for="pengarang">Pengarang</label>
               <br>
               <input type="text" name="pengarang" class="form-control" id="Pengarang" value="{{ $bukus->pengarang }}" aria describedby="Pengarang" >
            </div>
            <div class="form-group">
               <label for="jumlah">Jumlah</label>
               <br>
               <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{ $bukus->jumlah }}" aria describedby="Jumlah" >
            </div>
            <div class="form-group">
               <label for="status">Status</label>
               <br>
               <input type="text" name="status" class="form-control" id="status" value="{{ $bukus->status }}" aria describedby="Status" >
            </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
    </div>
</div>
   @endsection