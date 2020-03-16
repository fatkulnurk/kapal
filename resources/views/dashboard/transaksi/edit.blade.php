@extends('layouts.dashboard')

@section('title', 'Informasi Transaksi')

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
                <input type="text" class="form-control" value="{{ $transaksi->kapal->perusahaan->nama }}" disabled>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Kapal</label>
                        <input type="text" class="form-control" value="{{ $transaksi->kapal->nama_kapal }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Kapal</label>
                        <input type="text" class="form-control" value="{{ $transaksi->kapal->jenis_kapal }}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <table class="table">
                    <tr>
                        <td style="width: 75px">Panjang</td>
                        <td style="width: 5px">:</td>
                        <td>{{ $transaksi->kapal->ukuran_panjang }}</td>
                    </tr>
                    <tr>
                        <td>Lebar</td>
                        <td>:</td>
                        <td>{{ $transaksi->kapal->ukuran_lebar }}</td>
                    </tr>
                    <tr>
                        <td>Tinggi</td>
                        <td>:</td>
                        <td>{{ $transaksi->kapal->ukuran_tinggi }}</td>
                    </tr>
                    <tr>
                        <td>Sarat</td>
                        <td>:</td>
                        <td>{{ $transaksi->kapal->ukuran_sarat }}</td>
                    </tr>
                    <tr>
                        <td>GT</td>
                        <td>:</td>
                        <td>{{ $transaksi->kapal->ukuran_gt }}</td>
                    </tr>
                </table>
            </div>
            <hr>
            <h5>Uraian Pekerjaan</h5>

            <div class="form-group">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 20px">No</th>
                        <th scope="col">Uraian - Pekerjaan</th>
                        <th scope="col" colspan="2">Volume</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Biaya</th>
                    </tr>
                    </thead>
                    @foreach($transaksi->kategoriPekerjaan as $kategoriPekerjaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ \Illuminate\Support\Str::upper($kategoriPekerjaan->nama) }}
                                @if (!blank($kategoriPekerjaan->deskripsi))
                                    <br>
                                    {{ $kategoriPekerjaan->deskripsi }}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                            @foreach(optional($kategoriPekerjaan)->uraianPekerjaan as $uraianPekerjaan)
                                <tr>
                                    <td></td>
                                    <td>
                                        {{ $uraianPekerjaan->deskripsi }}
                                    </td>
                                    <td>{{ $uraianPekerjaan->volume_nilai }}</td>
                                    <td>{{ $uraianPekerjaan->volume_satuan }}</td>
                                    <td>{{ currency_formatter($uraianPekerjaan->harga) }}</td>
                                    <td>{{ currency_formatter(($uraianPekerjaan->volume_nilai * $uraianPekerjaan->harga)) }}</td>
                                </tr>
                            @endforeach
                        <tr>
                            <td colspan="6">
                                <div class="form-group text-right">
                                    <a href="{{ route('dashboard.transaksi.uraian.create', [$transaksi->id, $kategoriPekerjaan->id]) }}" class="btn btn-default btn-outline-primary">Tambah Uraian</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <a href="{{ route('dashboard.transaksi.kategori-pekerjaan.create', $transaksi->id) }}" class="btn btn-primary btn-block">Tambah Kategori</a>
            </div>
        </div>
    </div>
@endsection
