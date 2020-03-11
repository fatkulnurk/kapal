@extends('layouts.dashboard')

@section('title', 'Kategori Pekerjaan (DATA MASTER)')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
                <a href="{{ route('dashboard.kategori-pekerjaan.create') }}" class="btn btn-default">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Nama</th>
                    <th style="width: 220px">Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kategoriPekerjaan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="text-center">
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
