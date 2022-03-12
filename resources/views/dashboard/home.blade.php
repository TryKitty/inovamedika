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
            <div class="col-md-7 ml-1 konten">

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('tindakan.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                            Post</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">pasien</th>
                                    <th scope="col">tindakan</th>
                                    <th scope="col">tagihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tindakan as $data)
                                <tr>
                                    <td>{{ $data->pasien }}</td>
                                    <td>{{ $data->tindakan}}</td>
                                    <td>{{ $data->tagihan }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('tindakan.destroy', $tindakan->id) }}" method="POST">
                                            <a href="{{ route('tindakan.edit', $tindakan->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Belum ada tindakan untuk pasien</td>
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
