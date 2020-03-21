@extends('layouts.dashboard')

@section('title', 'Semua Transaksi')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            @hasanyrole(\App\Enums\RoleEnum::$managerProduksi)
            <div class="card-tools">
                <a href="{{ route('dashboard.transaksi.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            @endhasanyrole
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped table-bordered table-responsive-lg">
                <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th style="width: 70px">Trx ID</th>
                    <th>Nama Kapal</th>
                    <th>Harga Total</th>
                    <th>Jumlah Penawaran</th>
                    <th>Status</th>
                    <th>Waktu</th>
                    <th style="width: 300px">Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($penawaran as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('dashboard.transaksi.show', $item->perbaikan->id) }}">{{ $item->perbaikan->nomor_transaksi }}</a></td>
                        <td>{{ $item->perbaikan->kapal->nama_kapal }}</td>
                        <td>{{ $item->perbaikan->total_biaya }}</td>
                        <td>{{ $item->jumlah_penawaran }}%</td>
                        <td>{{ $item->verified }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">

                            <div class="row">
                                @hasanyrole(\App\Enums\RoleEnum::$owner.'|'.\App\Enums\RoleEnum::$managerProduksi)
                                <div class="col-md-6">
                                    <a href="{{ route('dashboard.penawaran.show', $item->id) }}" class="btn btn-success btn-block">Detail</a>
                                </div>
                                @endhasanyrole

                                @hasanyrole(\App\Enums\RoleEnum::$managerProduksi)
                                <div class="col-md-6">
                                    <a href="{{ route('dashboard.penawaran.edit', $item->id) }}" class="btn btn-info btn-block">Edit</a>
                                </div>
                                @endhasanyrole
                            </div>
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

        function submitForm(event){
            var confirmation = confirm("Yakin ingin menghapus data ?") ;

            if (!confirmation)
            {
                event.preventDefault() ;
                window.alert('Penghapusan dibatalkan.')
            }
        }
    </script>
@endpush
