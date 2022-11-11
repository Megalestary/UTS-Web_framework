@extends('template.master')
@section('title', 'Kebutuhan')
@section('content')
<!-- Modal -->
@foreach ($dataKebutuhan as $row )
<div class="modal fade" id="kkkk{{$row->id_kebutuhan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('kebutuhan.update')}}" method="post" enctype="multipart/form-data">    
        @csrf    
        <div class="modal-body">
          <div class="form-group">
          <input type="hidden" id="id" class="form-control" value="{{$row->id_kebutuhan}}" Name="id_kebutuhan">
          </div>
          <div class="form-group">
          <label for="inputnama" class="form-label" >Jenis Kebutuhan :</label>
          <input type="text" id="inputnama" class="form-control" value="{{$row->jenis_kebutuhan}}" Name="Jenis">
          </div>
          <div class="form-group">
            <label for="deskripsi" class="form-label" >Deskripsi :</label>
          <input type="text" id="deskripsi" class="form-control" value="{{$row->deskripsi}}" Name="Deskripsi">
        </div>
        <div class="form-group">
          <label for="kebutuhan" class="form-label" >Kebutuhan :</label>
          <input type="text" id="kebutuhan" class="form-control" value="{{$row->kebutuhan_tentang}}" Name="Tentang">
          </div>
          <div class="form-group">
          <label class="font-weight-bold">Upload</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{$row->foto_dan_vidio}}" Name="FotoVideo"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  @endforeach
  <!-- EndModal Edit-->

<div class="container-fluid">
    <form class="mt-4" role="search">
           <div class="col-auto">
            <button  class="btn btn-outline-success" type="button"data-bs-toggle="modal" data-bs-target="#exampleModal">tambah</button>
          </div>
        </div>
        </form>
    <table class="table table-striped table-hover mt-3">
    <thead class="bg-primary text-light">
     <tr>
      <th scope="col">NO</th>
      <th scope="col">Jenis Kebutuhan</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Tentang Kebutuhan</th>
      <th scope="col">foto dan Vidio</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @forEach ( $dataKebutuhan as $p)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$p->jenis_kebutuhan}}</td>
      <td>{{$p->deskripsi}}</td>
      <td>{{$p->kebutuhan_tentang}}</td>
      <td><img src="/fotoVideo/{{$p->foto_dan_vidio}}" alt="gambar" width="65" height="70"></td>
      <td>
      <form method="post" action="{{route('kebutuhan.destroy',$p->id_kebutuhan)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
       </form>
      </td>
      <td>
        <form action="">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#kkkk{{$p->id_kebutuhan}}">Edit</button>
        </form>
      </td>
    </tr>
    @endForEach
   </tbody>
</table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kebutuhan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('kebutuhan.store')}}" method="post" enctype="multipart/form-data">
        @csrf
       <div class="modal-body">
        <div class="form-group">
          <label for="inputnama" class="form-label" >Jenis Kebutuhan :</label>
          <input type="text" id="inputnama" class="form-control" name="Jenis">
        </div>
          <div class="form-group">
            <label for="inputStock" class="form-label">Deskripsi :</label>
            <input type="text" id="inputStock" class="form-control" name="Deskripsi">
          </div>
          <div class="form-group">
            <label for="inputDeksripsi" class="form-label">Tetang :</label>
            <input type="text" id="inputDeksripsi" class="form-control" name="Tentang">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Upload</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="fotoVideo">                            
            </div>
          <div class="modal-footer">
            <div class="form-group">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </form>
  </div>
</div>
<!-- EndModal-->
@endsection