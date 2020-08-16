/*if ($('#ampiechart1').length) {
    var chart = AmCharts.makeChart("ampiechart1", {
        "type": "pie",
        "labelRadius": -35,
        "labelText": "[[percents]]%",
        "dataProvider": [{
            "country": "Jaguar Cars",
            "litres": 501.9,
            "backgroundColor": "#815DF6"
        }, {
            "country": "Ferrari",
            "litres": 301.9,
            "backgroundColor": "#67B7DC"
        }, {
            "country": "Ireland",
            "litres": 201.1,
            "backgroundColor": "#9c82f4"
        }, {
            "country": "The Netherlands",
            "litres": 150,
            "backgroundColor": "#FDD400"
        }],
        "color": "#fff",
        "colorField": "backgroundColor",
        "valueField": "litres",
        "titleField": "country"
    });
}
var dateArray = [];
for (var i = 12; i > 0; i--) {
    //var days; // Days you want to subtract
    var date = new Date();
    var last = new Date(date.getTime() - (i * 24 * 60 * 60 * 1000));
    var day =last.getDate();
    var month=last.getMonth()+1;
    var year=last.getFullYear();
    lastDate = day+"-"+month+"-"+year;
    dateArray.push(lastDate);
}


if ($('#ambarchart4').length) {
    var chart = AmCharts.makeChart("ambarchart4", {
        "type": "serial",
        "theme": "light",
        "marginRight": 70,
        "dataProvider": [{
            "country": dateArray[0],
            "visits": 3025,
            "color": "#8918FE"
        }, {
            "country": dateArray[1],
            "visits": 1882,
            "color": "#7474F0"
        }, {
            "country": dateArray[2],
            "visits": 1809,
            "color": "#C5C5FD"
        }, {
            "country": dateArray[3],
            "visits": 1322,
            "color": "#952FFE"
        }, {
            "country": dateArray[4],
            "visits": 1122,
            "color": "#7474F0"
        }, {
            "country": dateArray[5],
            "visits": 1114,
            "color": "#CBCBFD"
        }, {
            "country": dateArray[6],
            "visits": 984,
            "color": "#FD9C21"
        }, {
            "country": dateArray[7],
            "visits": 711,
            "color": "#0D8ECF"
        }, {
            "country": dateArray[8],
            "visits": 665,
            "color": "#0D52D1"
        }, {
            "country": dateArray[9],
            "visits": 580,
            "color": "#2A0CD0"
        }, {
            "country": dateArray[10],
            "visits": 443,
            "color": "#8A0CCF"
        }, {
            "country": dateArray[11],
            "visits": 441,
            "color": "#9F43FE"
        }],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left",
            "title": false
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "visits"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45
        },
        "export": {
            "enabled": false
        }

    });
}

if ($('#ambarchart6').length) {
    var chart = AmCharts.makeChart("ambarchart6", {
        "type": "serial",
        "theme": "light",
        "handDrawn": true,
        "handDrawScatter": 3,
        "legend": {
            "useGraphSettings": true,
            "markerSize": 12,
            "valueWidth": 0,
            "verticalGap": 0
        },
        "dataProvider": [{
            "year": 'March',
            "Product-Sale": 23.5,
            "Avg-Price": 18.1,
            "color": "#952FFE"
        }, {
            "year": 'February',
            "Product-Sale": 26.2,
            "Avg-Price": 22.8,
            "color": "#5182DE"
        }, {
            "year": 'January',
            "Product-Sale": 30.1,
            "Avg-Price": 23.9,
            "color": "#8282F1"
        }, {
            "year": 'December',
            "Product-Sale": 29.5,
            "Avg-Price": 25.1,
            "color": "#B369FE"
        }, {
            "year": 'November',
            "Product-Sale": 24.6,
            "Avg-Price": 25,
            "color": "#51ADDD"
        }],
        "valueAxes": [{
            "minorGridAlpha": 0.08,
            "minorGridEnabled": true,
            "position": "top",
            "axisAlpha": 0
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
            "title": "Product Sales",
            "type": "column",
            "fillAlphas": 1,
            "fillColorsField": "color",
            "valueField": "Product-Sale"
        }, {
            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "lineColor": "#AA59FE",
            "bulletColor": "#FFFFFF",
            "useLineColorForBulletBorder": true,
            "fillAlphas": 0,
            "lineThickness": 2,
            "lineAlpha": 1,
            "bulletSize": 7,
            "title": "Avg Price",
            "valueField": "Avg-Price"
        }],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start"
        },
        "export": {
            "enabled": false
        }

    });
}*/

if ($('#verview-shart').length) {
    var myConfig = {
        "type": "line",

        "scale-x": { //X-Axis
            /*"labels": ["0", "10", "20", "30", "40", "50", "60", "70", "80", "90", "100"],*/
            "labels" : dateArray,
            "label": {
                "font-size": 14,
                "offset-x": 0,
            },
            "item": { //Scale Items (scale values or labels)
                "font-size": 10,
            },
            "guide": { //Guides
                "visible": false,
                "line-style": "solid", //"solid", "dotted", "dashed", "dashdot"
                "alpha": 1
            }
        },
        "plot": { "aspect": "spline" },
        "series": [{
                "values": [20, 25, 30, 35, 45, 40, 40, 35, 25, 17, 40, 50],
                "line-color": "#F0B41A",
                /* "dotted" | "dashed" */
                "line-width": 5 /* in pixels */ ,
                "marker": { /* Marker object */
                    "background-color": "#D79D3B",
                    /* hexadecimal or RGB value */
                    "size": 5,
                    /* in pixels */
                    "border-color": "#D79D3B",
                    /* hexadecimal or RBG value */
                }
            },
            {
                "values": [40, 45, 30, 20, 30, 35, 45, 55, 40, 30, 55, 30],
                "line-color": "#0884D9",
                /* "dotted" | "dashed" */
                "line-width": 5 /* in pixels */ ,
                "marker": { /* Marker object */
                    "background-color": "#067dce",
                    /* hexadecimal or RGB value */
                    "size": 5,
                    /* in pixels */
                    "border-color": "#067dce",
                    /* hexadecimal or RBG value */
                }
            }
        ]
    };

    zingchart.render({
        id: 'verview-shart',
        data: myConfig,
        height: "100%",
        width: "100%"
    });
}

/*--------------  coin_sales4 bar chart start ------------*/
if ($('#coin_sales4').length) {
    var ctx = document.getElementById("coin_sales4").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10"],
            datasets: [{
                label: "Sales",
                data: [250, 320, 380, 330, 420, 250, 180, 250, 100, 300],
                backgroundColor: [
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#1b1e5b',
                    '#00aeef'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}

/*--------------  coin_sales4 bar chart End ------------*/

/*--------------  coin_sales5 bar chart start ------------*/
if ($('#coin_sales5').length) {
    var ctx = document.getElementById("coin_sales5").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10"],
            datasets: [{
                label: "Sales",
                data: [250, 220, 380, 130, 420, 230, 180, 220, 150, 300],
                backgroundColor: [
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#1b1e5b',
                    '#00aeef'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}

/*--------------  coin_sales5 bar chart End ------------*/

/*--------------  coin_sales6 bar chart start ------------*/
if ($('#coin_sales6').length) {
    var ctx = document.getElementById("coin_sales6").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10"],
            datasets: [{
                label: "Sales",
                data: [250, 320, 380, 120, 420, 530, 180, 250, 80, 250],
                backgroundColor: [
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#1b1e5b',
                    '#00aeef'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}

/*--------------  coin_sales6 bar chart End ------------*/

/*--------------  coin_sales7 bar chart start ------------*/
if ($('#coin_sales7').length) {
    var ctx = document.getElementById("coin_sales7").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10"],
            datasets: [{
                label: "Sales",
                data: [100, 300, 350, 350, 420, 150, 300, 250, 250, 300],
                backgroundColor: [
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#00aeef',
                    '#1b1e5b',
                    '#1b1e5b',
                    '#00aeef'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}