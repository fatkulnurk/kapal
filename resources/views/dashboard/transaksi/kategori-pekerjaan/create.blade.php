@extends('layouts.dashboard')

@section('title', 'Tambah Kategori Pekerjaan')

@push('head')
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <style>
        @media screen and (min-width: 740px) {
            textarea {
                height: 70px !important;
            }
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.transaksi.kategori-pekerjaan.store', $transaksi->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Kategori Pekerjaan</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="kategori_pekerjaan" required>
                        @foreach($kategoriPekerjaanMasters as $item)
                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi (Opsional)</label>
                    <textarea class="form-control" name="kategori_pekerjaan_deskripsi"></textarea>
                    <p>Deskripsi akan di tulis dibawah kategori pekerjaan.</p>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Simpan dan Kembali Ke Detail</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="{{ route('dashboard.transaksi.show', $transaksi->id) }}" class="btn btn-default btn-block">Batal</a>
                        </div>
                    </div>
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
