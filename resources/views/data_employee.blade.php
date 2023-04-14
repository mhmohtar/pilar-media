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
<div class="card mb-5">
  <div class="card-header">
      Data Employee
    <div class="float-right">
        <a href="/" class="btn btn-primary">Add New Data</a>
    </div>
  </div>
  <div class="card-body p-5">
        <table class="table">
        <thead>
            <tr class="bg-primary text-white">
                <th scope="col">No</th>
                <th>Profile</th>
                <th scope="col">Name Employee</th>
                <th scope="col">Status</th>
                <th scope="col">Setting</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
            ?>
            @foreach($employee as $row)
            <tr>
                <th scope="row"><?=$no++?></th>
                <td style="width:20px;">
                    <img src="{{ asset('storage/' . $row->profile) }}" alt="" style="width:60px;">
                </td>
                <td>{{$row->nama_karyawan}}</td>
                <td>
                <label for="" class="label px-1 fw-bold text-white {{ ($row->status == 1) ? 'bg-primary' : 'bg-danger' }}">
                    {{ ($row->status == 1) ? 'Active' : 'Non Active' }}
                </label>
                </td>
                <td>
                    <a href="edit/{{ $row->id }}" class="btn btn-primary">Edit</a>
                    <a href="delete/{{ $row->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
  </div>
</div>
@endsection


