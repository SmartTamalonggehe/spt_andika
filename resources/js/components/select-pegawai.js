import { getDataPegawai } from "../getData";

const pegawai_id = document.getElementById("pegawai-id");
const selectPegawai = async () => {
    const dataPegawai = await getDataPegawai();
    pegawai_id.innerHTML = `<option value="" selected disabled>--Pilih Pegawai--</option>`;
    dataPegawai.forEach((pegawai) => {
        pegawai_id.innerHTML += `<option value="${pegawai.id}">${pegawai.NIP}-${pegawai.nama}</option>`;
    });
};

if (pegawai_id) {
    selectPegawai();
}
