@extends('template.master')
@section('title', 'Pegawai')
@section('content')
<div class="container-fluid">
    <form class="mt-4" role="search">
        <div class="row">
          <div class="col-9">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          </div>
          <div class="col-auto">
            <button class="btn btn-outline-primary" type="submit">cari</button>
          </div>
          <div class="col-auto">
            <button  class="btn btn-outline-success" type="button"data-bs-toggle="modal" data-bs-target="#exampleModal">tambah</button>
          </div>
        </div>
        </form>
    <table class="table table-striped table-hover mt-3">
    <thead class="bg-primary text-light">
     <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">Kontak Whatsapp</th>
      <th scope="col">Bagian</th>
      <th scope="col">Jenis Kebutuhan</th>
      <th scope="col">Kebutuhan Tentang</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Deskripsi photo / Vidio</th>
      <th scope="col">Kategori</th>
      <th scope="col">Urgensi</th>
      <th scope="col">Progress</th>
      <th scope="col">PIC</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @forEach ( $pegawai as $p)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$p->nama_pegawai}}</td>
      <td>{{$p->no_whatsapp}}</td>
      <td>{{$p->bagian}}</td>
      <td>{{$p->jenis_kebutuhan}}</td>
      <td>{{$p->kebutuhan_tentang}}</td>
      <td>{{$p->deskripsi}}</td>
      <td><img src="/fotoVideo/{{$p->foto_dan_vidio}}" alt="gambar" width="65" height="70"></td>
      <td>{{$p->nama_kategori}}</td>
      <td>{{$p->urgensi}}</td>
      <td>{{$p->progress}}</td>
      <td>{{$p->pic}}</td>
      <td>
      <form method="post" action="{{route('pegawai.destroy',$p->id_pegawai)}}">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pegawai</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('pegawai.store')}}" method="post">
        @csrf 
       <div class="modal-body">
        <div class="form-group">
          <label for="inputnama" class="form-label" >Nama :</label>
          <input type="text" id="inputnama" class="form-control" name="Nama_pegawai">
        </div>
          <div class="form-group">
            <label for="inputStock" class="form-label">NO. Whatsapp :</label>
            <input type="text" id="inputStock" class="form-control" name="No">
          </div>
          <div class="form-group">
            <label for="inputDeksripsi" class="form-label">Bagian :</label>
            <input type="text" id="inputDeksripsi" class="form-control" name="Bagian">
          </div>
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
              <option value="">Pilih Kategori</option>
              @foreach($kategori as $data)
              <option value="{{$data->id_kategori}}">{{$data->nama_kategori}}</option>
              @endForEach
            </select>
          </div>
          <div class="form-group">
            <label for="kebutuhan">Pilih Kebutuhan</label>
            <select name="kebutuhan" id="kebutuhan" class="form-control">
              <option value="">Pilih kebutuhan</option>
              @foreach($kebutuhan as $data)
              <option value="{{$data->id_kebutuhan}}">{{$data->jenis_kebutuhan}}</option>
              @endForEach
            </select>
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
<!-- EndModal-->
@endsection