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
                    <th style="width: 20px">No</th>
                    <th>Nama Kapal</th>
                    <th>Jenis Kapal</th>
                    <th style="width: 220px">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kapal as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kapal }}</td>
                        <td>{{ $item->jenis_kapal }}</td>
                        <td>
                            <button class="btn btn-info">Ubah Data</button>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                @endforeach
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
