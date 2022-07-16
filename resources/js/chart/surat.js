import { getDataSurat } from "../getData";
import ApexCharts from "apexcharts";

const colors = ["#006dfc", "#ffb100", "#00ec00", "#ff0000", "#0000ff"];

const container = document.getElementById("chart-surat");

const grafikSurat = async (bulan = "", tahun = "") => {
    container.innerHTML = "";
    const data = await getDataSurat();
    const dataSeries = [];
    const categories = [];

    // find data by month or year
    const dataByMonth = data.filter((item) => {
        return item.tgl_surat.includes(bulan) && item.tgl_surat.includes(tahun);
    });
    console.log("dataByMonth", dataByMonth);

    // count data by jenis_surat
    const count = dataByMonth.reduce((acc, cur) => {
        if (acc[cur.jenis_surat]) {
            acc[cur.jenis_surat]++;
        } else {
            acc[cur.jenis_surat] = 1;
        }
        return acc;
    }, {});
    // convert to array
    const arr = Object.keys(count).map((key) => {
        return {
            name: key,
            value: count[key],
        };
    });

    console.log("arr", arr);
    // push to dataSeries
    arr.forEach((item) => {
        dataSeries.push(item.value);
        categories.push(item.name);
    });

    let options = {
        series: [
            {
                name: "",
                data: dataSeries,
            },
        ],
        chart: {
            height: 350,
            type: "bar",
            events: {
                click: function (chart, w, e) {},
            },
        },
        colors: colors,
        plotOptions: {
            bar: {
                columnWidth: "45%",
                distributed: true,
            },
        },
        dataLabels: {
            enabled: true,
            style: {
                colors: ["#000000"],
            },
        },
        legend: {
            show: false,
        },
        xaxis: {
            categories,
            labels: {
                style: {
                    colors: colors,
                    fontSize: "12px",
                },
            },
        },
        yaxis: {
            title: {
                text: "Jumlah Surat",
            },
            labels: {
                style: {
                    colors: "#000000",
                    fontSize: "12px",
                },
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " surat";
                },
            },
        },
    };

    let chart = new ApexCharts(container, options);
    chart.render();
};

grafikSurat();

const bulan = document.getElementById("bulan");
const tahun = document.getElementById("tahun");
if (bulan) {
    bulan.addEventListener("change", () => {
        grafikSurat(bulan.value, tahun.value);
    });
}
if (tahun) {
    tahun.addEventListener("change", () => {
        grafikSurat(bulan.value, tahun.value);
    });
}
