@extends('bukus.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Data Buku Perpustakaan</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('bukus.create') }}"> Input Buku</a>
            </div>
        
            <form method="get" action="/search" id="myForm">
                 <div class="float-left my-1">
                    <input type="cari" name="cari" class="form-control" id="cari" placeholder=" Search disini !!! " aria-describedby="cari" >
                </div>
                <div class="float-left my-1" style="margin-left:20px;">
                    <button type="submit" class="btn btn-primary"> Search </button>
                </div>
            </form>
            
        </div>
    </div>
 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
     @endif
    <table class="table table-bordered">
        <tr align="center">
            <th>id_buku</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penerbit</th>
            <th>Pengarang</th>
            <th>Jumlah</th>
            <th>Status </th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($bukus as $Buku)
        <tr>
 
        <td>{{ $Buku->id_buku }}</td>
        <td>{{ $Buku->judul }}</td>
        <td>{{ $Buku->kategori }}</td>
        <td>{{ $Buku->penerbit }}</td>
        <td>{{ $Buku->pengarang }}</td>
        <td>{{ $Buku->jumlah }}</td>
        <td>{{ $Buku->status }}</td>
        <td>
        <form action="{{ route('bukus.destroy',$Buku->id_buku) }}" method="POST">
 
            <a class="btn btn-info" href="{{ route('bukus.show',$Buku->id_buku) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('bukus.edit',$Buku->id_buku) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
 @endforeach
 </table>
 <div class="d-flex">
        {{ $bukus->links() }}
    </div>
@endsection
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

