@extends('layouts.dashboard')

@section('title', 'Semua Transaksi')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
                <a href="{{ route('dashboard.transaksi.create') }}" class="btn btn-default">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Nama Kapal</th>
                    <th>Tanggal Dibuat</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Nama Kapalnya itu apa</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.transaksi.show', $item->id) }}" class="btn btn-info">Ubah Data </a>
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
