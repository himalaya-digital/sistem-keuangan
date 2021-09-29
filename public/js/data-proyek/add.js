let idProyek = $("#id-proyek");
let idCustomer = $("#id-customer");
let tanggalMulai = $("#tanggal-mulai");
let namaProyek = $("#nama-proyek");
let tanggalSelesai = $("#tanggal-selesai");
let keteranganPembayaran = $("#keterangan-pembayaran");
let tanggalPembayaran = $("#tanggal-pembayaran");
let namaKategori = $("#nama-kategori");
let jumlah = $("#jumlah");
let hargaSatuan = $("#harga-satuan");
let total = $("#total");
let tambahDataBtn = $("#tambah-data-btn");
let tBodyKategori = $("#tbody-kategori");
let totalHargaBahan = $("#total-harga-bahan");
let hargaJasa = $("#harga-jasa");
let totalBayar = $("#total-bayar");
let bayar = $("#bayar");
let sisaBayar = $("#sisa-bayar");
let simpanBtn = $("#simpan-btn");

let kategoriData = [];

$(window).on("load", function () {
    jumlah.on("keyup change", function () {
        let intHargaSatuan = parseInt(hargaSatuan.val());
        let intThis = parseInt($(this).val());
        total.val(intHargaSatuan * intThis);
    });

    hargaSatuan.on("keyup change", function () {
        let intJumlah = parseInt(jumlah.val());
        let intThis = parseInt($(this).val());
        total.val(intJumlah * intThis);
    });

    hargaJasa.on("keyup change", function () {
        let intTotalHargaBahan = parseInt(totalHargaBahan.val());
        let intHargaJasa = parseInt($(this).val());
        totalBayar.val(intTotalHargaBahan + intHargaJasa);
    });

    bayar.on("keyup change", function () {
        let intTotalBayar = parseInt(totalBayar.val());
        let intBayar = parseInt($(this).val());
        sisaBayar.val(intTotalBayar - intBayar);
    });

    tambahDataBtn.on("click", function () {
        tBodyKategori.empty();
        totalHargaBahan.val("0");

        let data = {
            [namaKategori.attr("name")]: namaKategori.val(),
            [jumlah.attr("name")]: jumlah.val(),
            [hargaSatuan.attr("name")]: hargaSatuan.val(),
            [total.attr("name")]: total.val(),
        };
        kategoriData.push(data);

        let children = kategoriData.map(function (value, index) {
            let parsedNamaKategori = value.nama_kategori.split(",")[1];

            let intTotalHargaBahan = parseInt(totalHargaBahan.val());
            let intTotal = parseInt(value.total);
            totalHargaBahan.val(intTotalHargaBahan + intTotal);

            return `
              <tr>
                <td>${index + 1}</td>
                <td>${parsedNamaKategori}</td>
                <td>${value.jumlah}</td>
                <td>${value.harga_satuan}</td>
                <td>${value.total}</td>
                <td>
                  <button type="button" class="btn btn-link btn-sm" title="edit"><i class="fa fa-times"></i></button>
                </td>
              </tr>
            `;
        });
        tBodyKategori.append(children);

        jumlah.val("");
        hargaSatuan.val("");
        total.val("0");
    });

    simpanBtn.on("click", function () {
        let data = {
            _token: $("meta[name=csrf-token]").attr("content"),
            kategori: kategoriData,
            [idProyek.attr("name")]: idProyek.val(),
            [idCustomer.attr("name")]: idCustomer.val(),
            [namaProyek.attr("name")]: namaProyek.val(),
            [totalBayar.attr("name")]: totalBayar.val(),
            [bayar.attr("name")]: bayar.val(),
            [sisaBayar.attr("name")]: sisaBayar.val(),
            [tanggalMulai.attr("name")]: tanggalMulai.val(),
            [tanggalPembayaran.attr("name")]: tanggalPembayaran.val(),
            [tanggalSelesai.attr("name")]: tanggalSelesai.val(),
            [keteranganPembayaran.attr("name")]: keteranganPembayaran.val(),
            [totalHargaBahan.attr("name")]: totalHargaBahan.val(),
            [hargaJasa.attr("name")]: hargaJasa.val(),
        };

        let route = simpanBtn.attr("data-store-route");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
            },
        });
        $.ajax({
            url: route,
            method: "POST",
            data: data,
            success: function () {
                $(location).attr("href", "http://localhost:8000/data-proyek");
            },
            error: function (error) {
                alert(error.responseJSON.message);
            },
        });
    });
});
