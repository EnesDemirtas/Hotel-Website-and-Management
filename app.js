function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(37.774929, -122.419418),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}


var ctx1 = document.getElementById('myChart_1').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Satuday', 'Sunday'],
        datasets: [{
                label: 'Full Rooms',
                data: [12, 19, 5, 14, 19, 7, 9],
                backgroundColor: 'rgba(54,146,241,0.75)',
                borderColor: 'rgba(255,90,0,0.69)',
                borderWidth: 1
            },
            {
                label: 'Empty Rooms',
                data: [8, 1, 15, 6, 1, 13, 11],
                backgroundColor: 'rgba(255,90,0,0.69)',
                borderColor: 'rgba(54,146,241,0.75)',
                borderWidth: 1
            }
        ],

    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },

            x: {
                beginAtZero: true,
            }
        },

        plugins: {
            title: {
                display: true,
                text: 'Weekly'
            }
        }
    }
});



var ctx2 = document.getElementById('myChart_2').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        datasets: [{
            label: 'Full Rooms',
            data: [12, 19, 5, 14, 19, 7, 9],
            backgroundColor: 'rgba(54,146,241,0.75)',
            borderColor:'rgba(255,90,0,0.69)',
            borderWidth: 1
        },
        {
            label: 'Empty Rooms',
            data: [8, 1, 15, 6, 1, 13, 11],
            backgroundColor: 'rgba(255,90,0,0.69)',
            borderColor: 'rgba(54,146,241,0.75)',
            borderWidth: 1
        }
    ],
        
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },

            x: {
                beginAtZero: true,
            }
        },

        plugins: {
            title: {
                display:true,
                text: 'Quarterly'
            }
        }
    }
});

var ctx3 = document.getElementById('myChart_3').getContext('2d');
var myChart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'My Dataset',
            data: [125, 170, 190, 155, 140, 320, 340, 405, 265, 145, 100, 130],
            backgroundColor: [
                '#9ede73',
                '#f7ea00',
                '#e48900',
                '#be0000',
                '#9ddfd3',
                '#903749',
                '#b4a5a5',
                'rgba(22,178,96,0.86)',
                '#046582',
                '#3a6351',
                '#b8b5ff',
                'rgba(107,78,1,0.91)'
            ]
        }
    ],
        
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },

            x: {
                beginAtZero: true,
            }
        },

        plugins: {
            title: {
                display:true,
                text: 'Total Number of Guests (Monthly)'
            }
        }
    }
});


function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}



