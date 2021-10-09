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
let totalHargaBahan = $("#total-harga-bahan");
let hargaJasa = $("#harga-jasa");
let totalBayar = $("#total-bayar");
let bayar = $("#bayar");
let sisaBayar = $("#sisa-bayar");
let simpanBtn = $("#simpan-btn");

$(window).on("load", function () {
    let categories = JSON.parse(hargaSatuan.attr("data-kategori"));
    namaKategori.on("change", function () {
        let kategoriId = namaKategori.val().split(",")[0];
        categories.forEach((category) => {
            if (kategoriId == 0) {
                hargaSatuan.val("0");
            }
            if (kategoriId == category.id) {
                hargaSatuan.val(category.harga_satuan);
            }
        });
    });

    jumlah.on("keyup change", function () {
        let intHargaSatuan = parseInt(hargaSatuan.val());
        let intThis = parseInt($(this).val());
        total.val(intHargaSatuan * intThis);
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

    simpanBtn.on("click", function () {
        let data = {
            _method: "PUT",
            _token: $("meta[name=csrf-token]").attr("content"),
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

        let route = simpanBtn.attr("data-update-route");
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
                // $("html").html(response);
                let hostname = window.location.hostname;
                let port = window.location.port;
                $(location).attr(
                    "href",
                    `http://${hostname}:${port}/data-proyek`
                );
            },
            error: function (error) {
                alert(error.responseJSON.message);
            },
        });
    });
});
