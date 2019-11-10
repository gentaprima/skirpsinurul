$(function () {
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar')); 
    new Chart(document.getElementById("bansos_chart").getContext("2d"), getChartJs('bansos')); 
});

function getChartJs(type) {
    var config = null;

    if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                datasets: [{
                    label: "Mampu",
                    data: [65, 59, 80, 81, 56, 55, 40,30],
                    backgroundColor: 'rgba(77, 6, 48, 1)'
                }, {
                        label: "Kurang Mampu",
                        data: [28, 48, 40, 19, 86, 27, 90,50],
                        backgroundColor: 'rgba(239, 108, 0, 1)'
                    },{
                        label: "Tidak Mampu",
                        data: [28, 48, 40, 19, 86, 27, 90,50],
                        backgroundColor: 'rgba(221, 44, 0, 1)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if(type === 'bansos'){
        config = {
            type: 'bar',
            data: {
                labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                datasets: [{
                        label: "Bantuan Sosial Pangan",
                        data: [65, 59, 80, 81, 56, 55, 40,30],
                        backgroundColor: 'rgba(77, 6, 48, 1)'
                    }, {
                        label: "PBI - JK",
                        data: [28, 48, 40, 19, 86, 27, 90,50],
                        backgroundColor: 'rgba(239, 108, 0, 1)'
                    },{
                        label: "Kartu Indonesia Pintar",
                        data: [28, 48, 40, 19, 86, 27, 90,50],
                        backgroundColor: 'rgba(221, 44, 0, 1)'
                    },{
                        label: "Program Keluarga Harapan",
                        data: [28, 48, 40, 19, 86, 27, 90,50],
                        backgroundColor: 'rgba(221, 44, 0, 1)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
   
    return config;
}