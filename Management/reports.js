var ctx1 = document.getElementById('myChart_1').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Satuday', 'Sunday'],
        datasets: [{
            label: 'Full Rooms',
            data: [report_weekly['Mon'], report_weekly['Tue'], report_weekly['Wed'], report_weekly['Thu'], report_weekly['Fri'],
            report_weekly['Sat'], report_weekly['Sun']],
            backgroundColor: 'rgba(54,146,241,0.75)',
            borderColor: 'rgba(255,90,0,0.69)',
            borderWidth: 1
        },
        {
            label: 'Empty Rooms',
            data: [total_rooms - report_weekly['Mon'], total_rooms - report_weekly['Tue'], total_rooms - report_weekly['Wed'],
            total_rooms - report_weekly['Thu'], total_rooms - report_weekly['Fri'], total_rooms - report_weekly['Sat'],
            total_rooms - report_weekly['Sun']],
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
                text: 'Past Week Room Status'
            }
        }
    }
});

var monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];
var d = new Date();
var current_month = d.getMonth() +1;



var ctx2 = document.getElementById('myChart_2').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: [monthNames[current_month-3-1], monthNames[current_month-2-1], monthNames[current_month-1-1], monthNames[current_month-1+1-1]],
        datasets: [{
            label: 'Income',
            data: [monthly_income[current_month-3], monthly_income[current_month-2], monthly_income[current_month-1], 
            monthly_income[current_month-1+1]],
            backgroundColor: 'rgba(54,146,241,0.75)',
            borderColor: 'rgba(255,90,0,0.69)',
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
                text: "Last 4 Months' Income"
            }
        }
    }
});

