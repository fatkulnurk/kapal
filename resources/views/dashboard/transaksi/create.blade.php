@extends('layouts.dashboard')

@section('title', 'Tambah Kapal')

@push('head')
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.transaksi.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" disabled>
                </div>

                <hr>
                <transaksi-create-component></transaksi-create-component>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('javascript')
    <script src="{{ asset('adminlte-3.0.2/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
