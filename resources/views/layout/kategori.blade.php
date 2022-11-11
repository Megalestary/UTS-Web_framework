@extends('template.master')
@section('title', 'Kategori')
@section('content')
<!-- Modal Edit-->
<div class="modal fade" id="kkkk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!--End Modal Edit-->
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
      <th scope="col">Nama_kategori</th>
      <th scope="col">Urgensi</th>
      <th scope="col">Progress</th>
      <th scope="col">PIC</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @forEach ( $dataKategori as $p)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$p->nama_kategori}}</td>
      <td>{{$p->urgensi}}</td>
      <td>{{$p->progress}}</td>
      <td>{{$p->pic}}</td>
      <td>
        <form method="post" action="{{route('kategori.destroy',$p->id_kategori)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
       </form>
      </td>
      <td>
      <form action="">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#kkkk">Edit</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('kategori.store')}}" method="post">
        @csrf
       <div class="modal-body">
        <div class="form-group">
          <label for="inputnama" class="form-label" >Nama Kategori:</label>
          <input type="text" id="inputnama" class="form-control" name="Nama_kategori">
        </div>
          <div class="form-group">
            <label for="inputStock" class="form-label">Urgensi :</label>
            <input type="text" id="inputStock" class="form-control" name="Urgensi">
          </div>
          <div class="form-group">
            <label for="inputDeksripsi" class="form-label">Progress :</label>
            <input type="text" id="inputDeksripsi" class="form-control" name="Progress">
          </div>
          <div class="form-group">
            <label for="inputHarga" class="form-label">PIC</label>
            <input type="text" id="inputHarga" class="form-control" name="PIC">
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