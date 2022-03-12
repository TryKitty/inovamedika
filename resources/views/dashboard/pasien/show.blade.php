<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/inova.css') }}">
    <script src="https://kit.fontawesome.com/2fc9df3a4a.js" crossorigin="anonymous"></script>
</head>
@include('dashboard.partials.navbar')
<div class="container-fluid mt-2">
    <div class="col-md-12">
        <div class="row">
          @include('dashboard.partials.sidebar')
            <div class="col-md-8 ml-1 konten">

                <div class="card border-0 konten shadow mt-1">
                    <div class="card-body border-0 konten">
                        <a href="{{ route('pasien.create') }}" class="btn btn-md btn-success mb-3 float-right"><i class="fa-solid fa-plus"></i>
                        </a>

                        <table class="table  mt-1 text-dark">
                            <thead>
                                <tr>
                                    <th scope="col">No ktp</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasien as $data)
                                <tr>
                                    <td>{{ $data->ktp }}</td>
                                    <td>{{ $data->nama}}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('pasien.destroy', $data->id) }}" method="POST">
                                            <a href="{{ route('pasien.edit', $data->id) }}"
                                                class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data Pasien tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
