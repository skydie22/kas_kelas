@extends('layouts.master');
@section('content')
    


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Pemasukan</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url("home") }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">pemasukan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">

            <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah-pemasukan">
                    Tambah Data
                </button>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Pemasukan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                        
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->uraian }}</td>
                            <td>@currency($data->kas_pemasukan)</td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-pemasukan{{ $data->id }}">edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-pemasukan{{ $data->id }}">delete</i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>
@include('kas-pemasukan/create')
@include('kas-pemasukan/edit')
@include('kas-pemasukan/delete')
@endsection
