@extends('layouts.dashboard')

@section('title', 'Edit Penawaran')

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

            <hr>
            <h3>EDIT STATUS PENAWARAN</h3>
            <form action="{{ route('dashboard.penawaran.update', $penawaran->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="verified" class="custom-select">
                        @foreach($status as $item)
                            <option value="{{ $item }}"
                                    @if($item === $penawaran->verified)
                                        selected
                                        @endif
                            >{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn-block btn btn-primary">Ganti Status</button>
                </div>
            </form>
        </div>
    </div>

@endsection
