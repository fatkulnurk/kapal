@extends('layouts.dashboard')

@section('title', 'Tambah Kategori Pekerjaan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.kategori-pekerjaan.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label>Nama Kategori Pekerjaan</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
