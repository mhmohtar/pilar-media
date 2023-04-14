@extends('layout.app')

@section('css')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
    </ol>
</div>
@endsection
@section('content')
<div class="card">
  <div class="card-header">
      Edit Data
    <div class="float-right">
        <a href="data_employee" class="btn btn-primary">Data Employee</a>
    </div>
  </div>
  <div class="card-body p-5">
        <form method="post" action="{{ route('update', ['id' => $data->id]) }}" enctype="multipart/form-data">

            @csrf
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Name Employee</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_karyawan" class="form-control @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" placeholder="Entar Name" value="{{ $data->nama_karyawan }}">
                    @error('nama_karyawan')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Enter Nip" value="{{ $data->nip }}">
                    @error('nip')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Position </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="Enter Position" value="{{ $data->jabatan }}">
                    @error('jabatan')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Departemen </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('departemen') is-invalid @enderror" id="departemen" name="departemen" placeholder="Enter Departemen" value="{{ $data->departemen }}">
                    @error('departemen')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Birth Date</label>
                <div class="col-sm-10">
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                    @error('tanggal_lahir')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">
                        {{ $data->alamat }}
                    </textarea>
                    @error('alamat')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" placeholder="Enter Telepon" value="{{ $data->telepon }}">
                    @error('telepon')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Religion</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="religion" name="religion" value="islam" {{ $data->agama == 'islam' ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Islam
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" id="religion" name="religion" value="kristen" {{ $data->agama == 'kristen' ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Kristen
                        </label>
                        </div>
                        <div class="form-check disabled">
                        <input class="form-check-input" type="radio" id="religion" name="religion" value="hindu" {{ $data->agama == 'hindu' ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Hindu
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Status Employee</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="status" name="status" value="1" {{ $data->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="status" name="status" value="0" {{ $data->status == 0 ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Non Active
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Profile Employee</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control @error('profile') is-invalid @enderror" name="profile">
                    @error('profile')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </div>
            
        </form>
  </div>
</div>
@endsection


