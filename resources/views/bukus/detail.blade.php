@extends('bukus.layout')

@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
      <div class="card" style="width: 24rem;">
         <div class="card-header">Detail Buku</div>
      <div class="card-body">
         <ul class="list-group list-group-flush">
         <li class="list-group-item"><b>ID Buku : </b>{{$bukus->id_buku}}</li>
         <li class="list-group-item"><b>Judul   : </b>{{$bukus->judul}}</li>
         <li class="list-group-item"><b>Kategori: </b>{{$bukus->kategori}}</li>
         <li class="list-group-item"><b>Penerbit: </b>{{$bukus->penerbit}}</li>
         <li class="list-group-item"><b>Pengarang : </b>{{$bukus->pengarang}}</li>
         <li class="list-group-item"><b>Jumlah    : </b>{{$bukus->jumlah}}</li>
         <li class="list-group-item"><b>Status : </b>{{$bukus->status}}</li>

         </ul>
      </div>
         <a class="btn btn-success mt-3" href="{{ route('bukus.index') }}">Kembali</a>
      </div>
    </div>
</div>
   @endsection