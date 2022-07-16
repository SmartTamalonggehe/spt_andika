import axios from "axios";

const getDataPegawai = () => {
    return axios
        .get("/api/pegawai")
        .then((res) => {
            return res.data;
        })
        .catch((err) => {
            console.log(err);
        });
};

const getDataSurat = () => {
    return axios
        .get("/api/surat")
        .then((res) => {
            return res.data;
        })
        .catch((err) => {
            console.log(err);
        });
};

export { getDataPegawai, getDataSurat };
