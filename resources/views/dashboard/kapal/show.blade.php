@extends('layouts.dashboard')

@section('title', 'Detail Kapal')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
            </div>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" class="form-control" value="{{ auth()->user()->perusahaan_accessor->nama }}" disabled>
            </div>

            <div class="form-group">
                <label>Nama Kapal</label>
                <input type="text" class="form-control @error('nama_kapal') is-invalid @enderror" name="nama_kapal" value="{{ old('nama_kapal', $kapal->nama_kapal) }}" disabled>
            </div>
            @error('nama_kapal')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror

            <div class="form-group">
                <label>Jenis Kapal</label>
                <select class="form-control @error('email') is-invalid @enderror" name="jenis_kapal" value="{{ old('jenis_kapal') }}" disabled>
                    @foreach($jenisKapal as $item)
                        <option value="{{ $item->nama }}" @if ($kapal->jenis_kapal == $item->nama)
                        selected
                            @endif>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            @error('jenis_kapal')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Panjang</label>
                        <input type="text" class="form-control @error('ukuran_panjang') is-invalid @enderror" name="ukuran_panjang" value="{{ old('ukuran_panjang', $kapal->ukuran_panjang) }}" disabled>
                        @error('ukuran_panjang')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="ukuran_panjang_satuan" disabled>
                            @foreach($satuan as $item)
                                <option value="{{ $item->nama }}" @if ($kapal->ukuran_panjang_satuan == $item->nama)
                                selected
                                    @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        {{--                            <input type="text" class="form-control @error('ukuran_panjang_satuan') is-invalid @enderror" name="ukuran_panjang_satuan" value="{{ old('ukuran_panjang_satuan', 'Mtr') }}" required>--}}
                        @error('ukuran_panjang_satuan')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Lebar</label>
                        <input type="text" class="form-control @error('ukuran_lebar') is-invalid @enderror" name="ukuran_lebar" value="{{ old('ukuran_lebar', $kapal->ukuran_lebar) }}" disabled>
                        @error('ukuran_lebar')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="ukuran_lebar_satuan" disabled>
                            @foreach($satuan as $item)
                                <option value="{{ $item->nama }}" @if ($kapal->ukuran_lebar_satuan == $item->nama)
                                selected
                                    @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        {{--                            <input type="text" class="form-control @error('ukuran_lebar_satuan') is-invalid @enderror" name="ukuran_lebar_satuan" value="{{ old('ukuran_lebar_satuan') }}">--}}
                        @error('ukuran_lebar_satuan')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Tinggi</label>
                        <input type="text" class="form-control @error('ukuran_tinggi') is-invalid @enderror" name="ukuran_tinggi" value="{{ old('ukuran_tinggi', $kapal->ukuran_tinggi) }}" disabled>
                        @error('ukuran_tinggi')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="ukuran_tinggi_satuan" disabled>
                            @foreach($satuan as $item)
                                <option value="{{ $item->nama }}" @if ($kapal->ukuran_tinggi_satuan == $item->nama)
                                selected
                                    @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        {{--                            <input type="text" class="form-control @error('ukuran_tinggi_satuan') is-invalid @enderror" name="ukuran_tinggi_satuan" value="{{ old('ukuran_tinggi_satuan') }}">--}}
                        @error('ukuran_tinggi_satuan')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Sarat</label>
                        <input type="text" class="form-control @error('ukuran_sarat') is-invalid @enderror" name="ukuran_sarat" value="{{ old('ukuran_sarat', $kapal->ukuran_sarat) }}" disabled>
                        @error('ukuran_sarat')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="ukuran_sarat_satuan" disabled>
                            @foreach($satuan as $item)
                                <option value="{{ $item->nama }}" @if ($kapal->ukuran_sarat_satuan == $item->nama)
                                selected
                                    @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        {{--                            <input type="text" class="form-control @error('ukuran_sarat_satuan') is-invalid @enderror" name="ukuran_sarat_satuan" value="{{ old('ukuran_sarat_satuan') }}">--}}
                        @error('ukuran_sarat_satuan')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran GT</label>
                        <input type="text" class="form-control @error('ukuran_gt') is-invalid @enderror" name="ukuran_gt" value="{{ old('ukuran_gt', $kapal->ukuran_gt) }}" disabled>
                        @error('ukuran_gt')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>

                        <select class="form-control select2bs4" style="width: 100%;" name="ukuran_gt_satuan" disabled>
                            @foreach($satuan as $item)
                                <option value="{{ $item->nama }}" @if ($kapal->ukuran_gt_satuan == $item->nama)
                                selected
                                    @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        {{--                            <input class="form-control @error('ukuran_gt_satuan') is-invalid @enderror" name="ukuran_gt_satuan" value="{{ old('ukuran_gt_satuan', 'Ton') }}" required>--}}
                        @error('ukuran_gt_satuan')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="{{ route('dashboard.kapal.index') }}" class="btn btn-primary btn-block">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte-3.0.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

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
