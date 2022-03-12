<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/inova.css') }}" />
  <script
   src="https://kit.fontawesome.com/2fc9df3a4a.js"
   crossorigin="anonymous"
  ></script>
 </head>
 @include('dashboard.partials.navbar')
 <div class="container-fluid mt-2">
  <div class="col-md-12">
   <div class="row">
    @include('dashboard.partials.sidebar')
    <div class="col-md-7 ml-1 konten">
     <form action="{{ route('pasien.update',$pasien->id) }}" method="post">
        @csrf @method('PUT')
      <div class="row">
       <div class="col-md-12 mt-3">
        @csrf
        <button type="submit" class="btn btn-md btn-success float-right">
         <i class="fa-solid fa-floppy-disk"></i>
        </button>
       </div>
       <div class="col-md-12">
        <div class="row">
         <div class="col-md-6">
          <div class="form-group">
           <label for="ktp">No ktp</label>
           <input type="number" name="ktp" value="{{ old('ktp', $pasien->ktp) }}" class="form-control" required />
          </div>
         </div>
         <div class="col-md-6">
          <div class="form-group">
           <label for="nama">Nama</label>
           <input type="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" class="form-control" required />
          </div>
         </div>
         <div class="col-md-12 text-center">
          <div class="form-group">
           <label for="alamat">Alamat</label>
           <textarea
            class="form-control"
            id="alamat"
            name="alamat"
            rows="3"
           >{{ old('alamat', $pasien->alamat) }}</textarea>
          </div>
         </div>
        </div>
       </div>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div>
</html>
