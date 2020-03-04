@extends('layouts.dashboard')

@section('title', 'Semua Kapal')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
                <a href="{{ route('dashboard.kapal.create') }}" class="btn btn-default">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nama Kapal</th>
                    <th>Jenis Kapal</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Nama Kapalnya itu apa</td>
                    <td>TANKER</td>
                    <td>
                        <button class="btn btn-info">Ubah Data</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
@push('javascript')

    <script>
        $(document).ready(function () {
            $('table').DataTable();
        });
    </script>
@endpush
