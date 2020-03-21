@extends('layouts.dashboard')

@section('title', 'Informasi Penawaran')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>

            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 170px">NAMA PERUSAHAAN</td>
                        <td style="width: 10px">:</td>
                        <td>{{ $penawaran->perbaikan->kapal->perusahaan->nama }}</td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td style="width: 170px">NAMA KAPAL</td>
                        <td style="width: 10px">:</td>
                        <td>{{ $penawaran->perbaikan->kapal->nama_kapal }}</td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td>JENIS KAPAL</td>
                        <td>:</td>
                        <td>{{ $penawaran->perbaikan->kapal->jenis_kapal }}</td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td>UKURAN UTAMA</td>
                        <td>:</td>
                        <td>
                            <table class="table">
                                <tr>
                                    <td style="width: 75px">Panjang</td>
                                    <td style="width: 5px">:</td>
                                    <td>{{ $penawaran->perbaikan->kapal->ukuran_panjang }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>Lebar</td>
                                    <td>:</td>
                                    <td>{{ $penawaran->perbaikan->kapal->ukuran_lebar }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>Tinggi</td>
                                    <td>:</td>
                                    <td>{{ $penawaran->perbaikan->kapal->ukuran_tinggi }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>Sarat</td>
                                    <td>:</td>
                                    <td>{{ $penawaran->perbaikan->kapal->ukuran_sarat }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>GT</td>
                                    <td>:</td>
                                    <td>{{ $penawaran->perbaikan->kapal->ukuran_gt }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td>NOMOR TRANSAKSI</td>
                        <td>:</td>
                        <td><a href="{{ route('dashboard.transaksi.show', $penawaran->perbaikan->id) }}">{{ $penawaran->perbaikan->nomor_transaksi }}</a></td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td>STATUS</td>
                        <td>:</td>
                        <td>{{ $penawaran->verified }}</td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td>WAKTU</td>
                        <td>:</td>
                        <td>{{ $penawaran->created_at }}</td>
                    </tr>
                </table>
            </div>
            <hr>
            <table class="table">
                <tr>
                    <td colspan="3"><strong>INFORMASI HARGA & PENAWARAN</strong></td>
                </tr>
                <tr>
                    <td style="width: 210px">Harga Total</td>
                    <td style="width: 10px">:</td>
                    <td>Rp {{ currency_formatter($penawaran->perbaikan->total_biaya) }}</td>
                </tr>
                <tr>
                    <td>Jumlah Penawaran</td>
                    <td>:</td>
                    <td>{{ $penawaran->jumlah_penawaran }}%</td>
                </tr>
                <tr>
                    <td>Nominal Penawaran</td>
                    <td>:</td>
                    <td>Rp {{ currency_formatter($penawaran->jumlah_penawaran_nominal) }}</td>
                </tr>
                <tr>
                    <td>Setelah Penawaran</td>
                    <td>:</td>
                    <td>Rp {{ currency_formatter($penawaran->total_setelah_penawaran) }}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
