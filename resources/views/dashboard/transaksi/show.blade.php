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
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 170px">NOMOR TRANSAKSI</td>
                        <td style="width: 10px">:</td>
                        <td>{{ $transaksi->nomor_transaksi }}</td>
                    </tr>
                    <tr>
                        <td style="width: 170px">NAMA PERUSAHAAN</td>
                        <td style="width: 10px">:</td>
                        <td>{{ $transaksi->kapal->perusahaan->nama }}</td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td style="width: 170px">NAMA KAPAL</td>
                        <td style="width: 10px">:</td>
                        <td>{{ $transaksi->kapal->nama_kapal }}</td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td>JENIS KAPAL</td>
                        <td>:</td>
                        <td>{{ $transaksi->kapal->jenis_kapal }}</td>
                    </tr>
                    <tr style="border-top: solid #e2e3e5 1px">
                        <td>UKURAN UTAMA</td>
                        <td>:</td>
                        <td>
                            <table class="table">
                                <tr>
                                    <td style="width: 75px">Panjang</td>
                                    <td style="width: 5px">:</td>
                                    <td>{{ $transaksi->kapal->ukuran_panjang }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>Lebar</td>
                                    <td>:</td>
                                    <td>{{ $transaksi->kapal->ukuran_lebar }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>Tinggi</td>
                                    <td>:</td>
                                    <td>{{ $transaksi->kapal->ukuran_tinggi }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>Sarat</td>
                                    <td>:</td>
                                    <td>{{ $transaksi->kapal->ukuran_sarat }}</td>
                                </tr>
                                <tr style="border-top: solid #e2e3e5 1px">
                                    <td>GT</td>
                                    <td>:</td>
                                    <td>{{ $transaksi->kapal->ukuran_gt }}</td>
                                </tr>
                            </table>
                        </td>
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
                    <?php $total = 0; ?>
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
<!--                                    --><?php //$total += ($uraianPekerjaan->volume_nilai * $uraianPekerjaan->harga); ?>
                                    <td>{{ currency_formatter(($uraianPekerjaan->volume_nilai * $uraianPekerjaan->harga)) }}</td>
                                </tr>
                            @endforeach
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Total Biaya</td>
                        <td colspan="2">Rp {{ currency_formatter($transaksi->total_biaya) }}</td>
                    </tr>
                    @if (isset($transaksi->penawaran))
                        @if (optional($transaksi->penawaran)->verified == 'disetujui')
                            <tr>
                                <td colspan="4" class="text-right">Jumlah Penawaran (%)</td>
                                <td colspan="2">{{ $transaksi->penawaran->jumlah_penawaran }}%</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Jumlah Penawaran (Rp)</td>
                                <td colspan="2">Rp {{ currency_formatter($transaksi->penawaran->jumlah_penawaran_nominal) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Total Biaya (setelah penawaran)</td>
                                <td colspan="2">Rp {{ currency_formatter($transaksi->harga_setelah_penawaran) }}</td>
                            </tr>
                        @endif
                    @endif


                    <tbody>
                    </tbody>
                </table>
            </div>
                @hasanyrole(\App\Enums\RoleEnum::$owner)
                <div class="form-group">
                    <button class="btn btn-primary btn-success btn-block" data-toggle="modal" data-target="#modalPenawaran">Ajukan Penawaran</button>
                </div>
                @endhasanyrole
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="modalPenawaran">
        <div class="modal-dialog">
            <div class="modal-content">

                @if (!isset($transaksi->penawaran))
                <form action="{{ route('dashboard.transaksi.ajukan-penawaran.store', $transaksi->id) }}" method="post">
                    @endif
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Ajukan Penawaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Total Biaya Sekarang</label>
                            <input class="form-control" type="text" value="Rp {{ currency_formatter($transaksi->total_biaya) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Penawaran</label>
                            <div class="input-group mb-3">
                                <input id="penawaran" min="0" max="100" name="jumlah_penawaran" class="form-control" type="number"
                                       @if (isset($transaksi->penawaran))
                                       value="{{ $transaksi->penawaran->jumlah_penawaran }}"
                                       @endif placeholder="masukan jumlah penawaran dalam persen (min 0 & max 100)" required autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Setelah Penawaran</label>
                            <input id="total_setelah_count" class="form-control" type="text"
                                   @if (isset($transaksi->penawaran))
                                   value="Rp {{ currency_formatter($transaksi->penawaran->total_setelah_penawaran) }}"
                                   @else
                                   value="Rp {{ currency_formatter($transaksi->total_biaya) }}"
                                   @endif

                                   disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary

                        @if (isset($transaksi->penawaran)) disabled
                            @endif"
                        @if (isset($transaksi->penawaran)) disabled
                            @endif>Simpan Penawaran</button>
                    </div>

                    @if (!isset($transaksi->penawaran))
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script !src="">
        $('#penawaran').on('input', function() {
            var total = {{ $transaksi->total_biaya }};
            var value = $(this).val();
            var total = total - ((total * value) / 100)

            $('#total_setelah_count').val("Rp " + total)

            // $(this).next().stop(true, true).fadeIn(0).html('[input event fired!]: ' + $(this).val()).fadeOut(2000);
        });
    </script>
@endpush
