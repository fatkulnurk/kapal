@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

{{--    @hasanyrole(\App\Enums\RoleEnum::$biayaKalkulasi)--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            Selamat datang, Anda Login Sebagai Biaya Kalkulasi.--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @else--}}
    <div class="row">
        <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jumlahKapal }}</h3>

                    <p>Jumlah Kapal</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ship"></i>
                </div>
                <a href="{{ route('dashboard.kapal.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $jumlahTransaksi }}</h3>

                    <p>Jumlah Transaksi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <a href="{{ route('dashboard.transaksi.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
{{--    @endhasanyrole--}}
@endsection
