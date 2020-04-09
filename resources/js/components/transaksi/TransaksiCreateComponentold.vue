<template>
    <div>
        <div class="form-group">
            <label>Pilih Kapal</label>
            <v-select label="nama_kapal" :options="kapal" :reduce="kapal => kapal" v-model="kapalSelected"></v-select>
            <input type="hidden" name="kapal_id" :value="kapalSelected.id">
        </div>

        <div class="form-group">
            <label>Jenis Kapal</label>
            <input type="text" class="form-control" :value="kapalSelected.jenis_kapal" disabled>
        </div>

        <div class="form-group">
            <table class="table">
                <tr>
                    <td style="width: 75px">Panjang</td>
                    <td style="width: 5px">:</td>
                    <td>{{ this.kapalSelected.ukuran_panjang }}</td>
                </tr>
                <tr>
                    <td>Lebar</td>
                    <td>:</td>
                    <td>{{ this.kapalSelected.ukuran_lebar }}</td>
                </tr>
                <tr>
                    <td>Tinggi</td>
                    <td>:</td>
                    <td>{{ this.kapalSelected.ukuran_tinggi }}</td>
                </tr>
                <tr>
                    <td>Sarat</td>
                    <td>:</td>
                    <td>{{ this.kapalSelected.ukuran_sarat }}</td>
                </tr>
                <tr>
                    <td>GT</td>
                    <td>:</td>
                    <td>{{ this.kapalSelected.ukuran_gt }}</td>
                </tr>
            </table>
        </div>
        <hr>
<!--        <h5>Uraian Pekerjaan</h5>-->

<!--        <div v-for="(pekerjaan, index) in uraian_pekerjaan">-->

<!--            <div class="form-group">-->
<!--                <label>Kategori Pekerjaan</label>-->

<!--                <v-select label="nama" :options="kategoriPekerjaan" :reduce="x => x" v-model="kategoriPekerjaanSelected"></v-select>-->
<!--                <input type="hidden" :name="'kategori[' + index + '][kategori]'" :value="kategoriPekerjaanSelected.nama">-->
<!--                {{ kategoriPekerjaanSelected }}-->

<!--                <select :name="'kategori[' + index + '][kategori]'" class="form-control select2bs4" style="width: 100%;">-->
<!--                    <option>option 1</option>-->
<!--                    <option>option 2</option>-->
<!--                    <option>option 3</option>-->
<!--                    <option>option 4</option>-->
<!--                    <option>option 5</option>-->
<!--                </select>-->
<!--            </div>-->
<!--            <div class="row" v-for="(uraian, indexUraian) in pekerjaan.uraian">-->
<!--                <div class="col-md-8">-->
<!--                    <div class="form-group">-->
<!--                        <label>Ukuran Panjang</label>-->
<!--                        <textarea class="form-control"></textarea>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group">-->
<!--                                <label>Volume</label>-->
<!--                                <input :name="'uraian[' + index + '][' + indexUraian + '][number]'" type="number" class="form-control">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group">-->
<!--                                <label>Satuan</label>-->
<!--                                <select class="form-control select2bs4" style="width: 100%;">-->
<!--                                    <option>option 1</option>-->
<!--                                    <option>option 2</option>-->
<!--                                    <option>option 3</option>-->
<!--                                    <option>option 4</option>-->
<!--                                    <option>option 5</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="form-group">-->
<!--                        <label>Harga Satuan</label>-->
<!--                        <input type="text" class="form-control">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="form-group text-right">-->
<!--                <a class="btn btn-default" v-on:click="tambahUraian(index)">Tambah Uraian</a>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <a class="btn btn-default" v-on:click="tambahKategori(index)">Tambah Kategori</a>-->
<!--            </div>-->
<!--        </div>-->

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
                ],
                kapal: [
                ],
                kapalSelected: {
                    id: "",
                    nama_kapal: "",
                    jenis_kapal: "",
                    ukuran_panjang: "",
                    ukuran_panjang_satuan: "",
                    ukuran_lebar:  "",
                    ukuran_lebar_satuan: null,
                    ukuran_tinggi: "",
                    ukuran_tinggi_satuan: null,
                    ukuran_sarat: "",
                    ukuran_sarat_satuan: null,
                    ukuran_gt:  "",
                    ukuran_gt_satuan: "",
                    tanggal_masuk: null,
                    tanggal_keluar: null,
                    created_at:  "",
                    updated_at:  "",
                },
                kategoriPekerjaan: [],
                kategoriPekerjaanSelected: {
                    id: "",
                    nama: "",
                    created_at:  "",
                    updated_at:  "",
                }
            }
        },
        mounted () {
            window.axios
                .get('/api/web/kapal')
                .then(response => {
                    this.kapal = response.data
                    console.log(this.kapal)
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })

            window.axios
                .get('/api/web/kategori-pekerjaan')
                .then(response => {
                    this.kategoriPekerjaan = response.data
                    console.log(this.kategoriPekerjaan)
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
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
    @media screen and (min-width: 740px) {
        textarea {
            height: 120px;
        }
    }
</style>
