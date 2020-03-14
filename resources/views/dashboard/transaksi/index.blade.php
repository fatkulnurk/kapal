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
                    <th style="width: 20px">Trx ID</th>
                    <th>Nama Kapal</th>
                    <th>Tanggal Dibuat</th>
                    <th style="width: 300px">Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kapal->nama_kapal }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('dashboard.transaksi.show', $item->id) }}" class="btn btn-info btn-block">Ubah Data</a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('dashboard.transaksi.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-block" onclick="submitForm(event)">Hapus</button>
                                    </form>
                                </div>
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
