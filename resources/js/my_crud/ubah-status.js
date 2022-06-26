import axios from "axios";
const tools = require("./tools");

$("body").on("click", ".btn-ubah-status", function (e) {
    e.preventDefault();
    const href = $(this).data("id");
    console.log("tools.uri", tools.uri);
    Swal.fire({
        title: "Yakin ?",
        text: "Status Akan Diubah",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yakin",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            axios
                .put(`${tools.uri}/${href}`)
                .then((response) => {
                    // lakukan sesuatu jika data sudah terkirim
                    Swal.fire(
                        "Berhasil!",
                        response.data.pesan,
                        response.data.type
                    );
                    let oTable = $("#my_table").dataTable();
                    oTable.fnDraw(false);
                })
                .catch((error) => {
                    Swal.fire(
                        "Gagal!",
                        error.response.data.pesan,
                        error.response.data.type
                    );
                });
        }
    });
});
