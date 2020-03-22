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

            <table id="example" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th style="width: 70px">Trx ID</th>
                    <th>Nama Kapal</th>
                    <th>Tanggal Dibuat</th>
                    <th style="width: 300px">Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nomor_transaksi }}</td>
                        <td>{{ $item->kapal->nama_kapal }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">

                            <div class="row">
{{--                                @hasanyrole(\App\Enums\RoleEnum::$owner.'|'.\App\Enums\RoleEnum::$managerProduksi)--}}
                                <div class="col-md-4">
                                    <a href="{{ route('dashboard.transaksi.show', $item->id) }}" class="btn btn-success btn-block">Detail</a>
                                </div>
{{--                                @endhasanyrole--}}

                                @hasanyrole(\App\Enums\RoleEnum::$managerProduksi.'|'.\App\Enums\RoleEnum::$biayaKalkulasi)
{{--                                @hasanyrole(\App\Enums\RoleEnum::$managerProduksi)--}}
                                <div class="col-md-4">
                                    <a href="{{ route('dashboard.transaksi.edit', $item->id) }}" class="btn btn-info btn-block">Edit</a>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('dashboard.transaksi.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-block" onclick="submitForm(event)">Hapus</button>
                                    </form>
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
