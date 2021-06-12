@extends('layouts.app_0310')

@section('title', 'Pasien')

@section('content')
    <div class="modal fade" id="modalPasien" tabindex="-1" aria-labelledby="modalPasienLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPasienLabel">IMPORT DATA PASIEN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pasien.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" class="form-control" id="inputFilePasien" name="file_upload" aria-describedby="inputGroupPasien">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Upload</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary mb-4 mt-4" data-toggle="modal" data-target="#modalPasien">
        Import Data Pasien
    </button>
    <form action="{{ route('pasien.index') }}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" value="{{ request()->get('query') }}" placeholder="Ketik Pencarian" aria-label="Username" aria-describedby="basic-addon1" name="query">
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-success" type="submit">FILTER</button>
        </div>
    </form>

    <h2>TABEL PASIEN</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">NAMA</th>
            <th scope="col">ALAMAT</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $pasien)
            <tr>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->alamat }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
