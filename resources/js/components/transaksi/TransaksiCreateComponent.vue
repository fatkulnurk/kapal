<template>
    <div>

        <div class="form-group">
            <label>Pilih Kapal</label>
            <select class="form-control select2bs4" style="width: 100%;">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Kapal</label>
            <input type="text" class="form-control" disabled>
        </div>

        <div class="form-group">
            <table class="table">
                <tr>
                    <td style="width: 75px">Panjang</td>
                    <td style="width: 5px">:</td>
                    <td>WE</td>
                </tr>
                <tr>
                    <td>Lebar</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tinggi</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sarat</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>GT</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </div>
        <hr>
        <h5>Uraian Pekerjaan</h5>

        <div v-for="(pekerjaan, index) in uraian_pekerjaan">

            <div class="form-group">
                <label>Kategori Pekerjaan</label>
                <select :name="'kategori[' + index + '][kategori]'" class="form-control select2bs4" style="width: 100%;">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                </select>
            </div>
            <div class="row" v-for="(uraian, indexUraian) in pekerjaan.uraian">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ukuran Panjang</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <label>Volume</label>
                                <input :name="'uraian[' + index + '][' + indexUraian + '][number]'" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label>Satuan</label>
                                <select class="form-control select2bs4" style="width: 100%;">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <a class="btn btn-default" v-on:click="tambahUraian(index)">Tambah Uraian</a>
            </div>

            <div class="form-group">
                <a class="btn btn-default" v-on:click="tambahKategori(index)">Tambah Kategori</a>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "TransaksiCreateComponent",
        data() {
            return {
                uraian_pekerjaan: [
                    {
                        uraian: [
                        ]
                    }
                ]
            }
        },
        methods: {
            tambahKategori(key) {
                this.uraian_pekerjaan.push({
                    uraian: []
                })
            },
            tambahUraian(key) {
                this.uraian_pekerjaan[key].uraian.push('')
            }
        }
    }
</script>

<style scoped>

</style>
