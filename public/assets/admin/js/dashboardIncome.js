$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Chart Dashboard
var chart;
$(function() {
    // Create a Bar Chart with Morris
    chart = Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'chart',
        data: getEmptyData(), // Using a function to initialize with default 12 months
        xkey: 'month', 
        ykeys: ['revenue'],
        labels: ['Doanh Thu'],
        resize: true,
        barColors: ['#ffba68'],
    });

    // Set default value for the year input to the current year
    var currentYear = new Date().getFullYear();
    $('#income_year').val(currentYear);

    // Trigger the chart update when the year input changes
    $('#income_year').on('change', function() {
        getInfo();
    });

    getInfo();
});

// Function to create an empty data structure with default 12 months
function getEmptyData() {
    var defaultData = [];
    for (var i = 1; i <= 12; i++) {
        defaultData.push({ month: i, revenue: 0 });
    }
    return defaultData;
}

function getInfo() {
    var year = $('#income_year').val(); 
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: { year: year},
        url: '/admin/dashboard/handle-income',
        success: function(data) {
            // Update the chart with new data
            chart.setData(fillDefaultData(data));
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

// Function to fill the default data array with received data
function fillDefaultData(receivedData) {
    var defaultData = getEmptyData();
    for (var i = 0; i < receivedData.length; i++) {
        var monthIndex = receivedData[i].month - 1;
        defaultData[monthIndex] = receivedData[i];
    }

    return defaultData;
}