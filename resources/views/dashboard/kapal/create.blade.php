@extends('layouts.dashboard')

@section('title', 'Tambah Kapal')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
            </div>
        </div>
        <form action="{{ route('dashboard.kapal.store') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->perusahaan_accessor->nama }}" disabled>
                </div>

                <div class="form-group">
                    <label>Nama Kapal</label>
                    <input type="text" class="form-control @error('nama_kapal') is-invalid @enderror" name="nama_kapal" value="{{ old('nama_kapal') }}" required>
                </div>
                @error('nama_kapal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    <label>Jenis Kapal</label>
                    <select class="form-control @error('email') is-invalid @enderror" name="jenis_kapal" value="{{ old('jenis_kapal') }}" required>
                        @foreach($jenisKapal as $item)
                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
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
                            <input type="text" class="form-control @error('ukuran_panjang') is-invalid @enderror" name="ukuran_panjang" value="{{ old('ukuran_panjang') }}" required>
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
                            <input type="text" class="form-control @error('ukuran_panjang_satuan') is-invalid @enderror" name="ukuran_panjang_satuan" value="{{ old('ukuran_panjang_satuan', 'Mtr') }}" required>
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
                            <input type="text" class="form-control @error('ukuran_lebar') is-invalid @enderror" name="ukuran_lebar" value="{{ old('ukuran_lebar') }}" required>
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
                            <input type="text" class="form-control @error('ukuran_lebar_satuan') is-invalid @enderror" name="ukuran_lebar_satuan" value="{{ old('ukuran_lebar_satuan') }}">
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
                            <input type="text" class="form-control @error('ukuran_tinggi') is-invalid @enderror" name="ukuran_tinggi" value="{{ old('ukuran_tinggi') }}" required>
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
                            <input type="text" class="form-control @error('ukuran_tinggi_satuan') is-invalid @enderror" name="ukuran_tinggi_satuan" value="{{ old('ukuran_tinggi_satuan') }}">
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
                            <input type="text" class="form-control @error('ukuran_sarat') is-invalid @enderror" name="ukuran_sarat" value="{{ old('ukuran_sarat') }}" required>
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
                            <input type="text" class="form-control @error('ukuran_sarat_satuan') is-invalid @enderror" name="ukuran_sarat_satuan" value="{{ old('ukuran_sarat_satuan') }}">
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
                            <input type="text" class="form-control @error('ukuran_gt') is-invalid @enderror" name="ukuran_gt" value="{{ old('ukuran_gt') }}" required>
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
                            <input class="form-control @error('ukuran_gt_satuan') is-invalid @enderror" name="ukuran_gt_satuan" value="{{ old('ukuran_gt_satuan', 'Ton') }}" required>
                            @error('ukuran_gt_satuan')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
@endsection
