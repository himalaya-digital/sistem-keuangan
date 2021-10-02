let jumlah = $("#jumlah");
let hargaSatuan = $("#harga-satuan");
let total = $("#total");
let namaKategori = $("#nama-kategori");
let totalHargaBahan = $("#total-harga-bahan");
let hargaJasa = $("#harga-jasa");
let totalBayar = $("#total-bayar");
let bayar = $("#bayar");
let sisaBayar = $("#sisa-bayar");

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
});
