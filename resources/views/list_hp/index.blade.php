@extends('list_hp.layout')
<br>
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
        <div class="card-header bg-success text-center">
                <strong>Aplikasi Perekaman Data HP </strong> 
                </div>
            <br>
            <div class="text-center">
                <h5>Welcome , <strong>{{ Auth::user()->name }}</strong></h5>
            </div>
            <div class="text-center">
            </div>
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-left">
                <a class="btn btn-primary" href="{{ route('list_hp.create') }}">Tambah Data Baru</a>
                <a href="/exportpdf" class="btn btn-warning">Export PDF</a>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
   
    <table class="table table-bordered" > <div class="card-header bg-success text-center">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Merk HP</th>
            <th>Tipe HP</th>
            <th>Tahun Produksi</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($list_hp as $datahp)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $datahp->image }}" width="100px"></td>
            <td>{{ $datahp->merk_hp }}</td>
            <td>{{ $datahp->tipe_hp }}</td>
            <td>{{ $datahp->thn_produksi }}</td>
            <td>
                <form action="{{ route('list_hp.destroy',$datahp->id) }}" method="POST">
    
                    <a class="btn btn-primary btn-sm" href="{{ route('list_hp.edit',$datahp->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="text-bottom">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </div>
  
    {!! $list_hp->links() !!}
      
@endsection