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

export { getDataPegawai };
