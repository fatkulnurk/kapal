@extends('layouts.dashboard')

@section('title', 'Tambah Kapal')

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
                <input type="text" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label>Nama Kapal</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Jenis Kapal</label>
                <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                </select>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Panjang</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" value="Mtr">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Lebar</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Tinggi</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" value="Mtr">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Sarat</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" value="Mtr">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran GT</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" value="Ton">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block">Simpan Data</button>
            </div>
        </div>
    </div>
@endsection
