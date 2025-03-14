$(function() {
    /* DashboardJS
     * -------
     * Data and config for chartjs
     */
    'use strict';

    //check all boxes in order status 
    $("#check-all").click(function () {
      $(".form-check-input").prop('checked', $(this).prop('checked'));
    });

    var areaMarketingData = {
        labels: ["2000", "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018"],
        datasets: [{
            label: '# of Votes',
            data: [60, 50, 55, 45, 58, 80, 60, 59, 70, 65, 24, 5, 15, 10, 30, 25, 35, 50, 40, 45],
            backgroundColor: [
                'rgba(2, 171, 254, 0.2)',
            ],
            pointBackgroundColor: 'rgba(255, 255, 255,1)',
            pointBorderColor: 'rgba(255, 255, 255,1)',
            borderColor: [
                'rgba(2, 171, 254,1)',
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }]
    };

    var areaMarketingOptions = {
        scales: {
            y: {
                display: false,
                grid: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    beginAtZero: false,
                }
            },
            x: {
                display: false,
            },
        },
        legend: {
            display: false
        },
        plugins: {
            filler: {
                propagate: true
            },
            legend: {
                display: false
            },
        },
        elements: {
            line: {
                tension: 0
            },
            tooltips: {
                backgroundColor: 'rgba(31, 59, 179, 1)',
            }
        }
    }
    var purchaseDetailDatadata = {
        labels: ["Jan", "Feb", "Mar", "Apr"],
        datasets: [{
                label: 'Offline purchases',
                data: [41676, 40776, 41676, 39676],
                backgroundColor: [
                    'rgba(31, 59, 179, 1)',
                    'rgba(31, 59, 179, 1)',
                    'rgba(31, 59, 179, 1)',
                    'rgba(31, 59, 179, 1)',
                ],
                borderColor: [
                    'rgba(31, 59, 179, 1)',
                    'rgba(31, 59, 179, 1)',
                    'rgba(31, 59, 179, 1)',
                    'rgba(31, 59, 179, 1)',
                ],
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Online purchases',
                data: [40982, 50982, 31982, 48982],
                backgroundColor: [
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                ],
                borderColor: [
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                ],
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Offline sales',
                data: [57545, 37545, 87545, 48982],
                backgroundColor: [
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                ],
                borderColor: [
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                ],
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Online sales',
                data: [47545, 27545, 48982, 97545],
                backgroundColor: [
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                ],
                borderColor: [
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                ],
                borderWidth: 2,
                fill: false
            }
        ],
    };
    var purchaseDetailOptions = {
        indexAxis: 'y',
        scales: {
            x: {
                position: 'bottom',
                display: true,
                grid: {
                    display: false,
                    drawBorder: true,
                },
                ticks: {
                    display: false //this will remove only the label
                }
            },
            y: {
                display: false,
                grid: {
                    drawBorder: true,
                    display: false,
                },
            },
            plugins: {
                legend: {
                    display: false,
                }
              }
        },
        plugins: [{
            afterDatasetUpdate: function(chart, args, options) {
                const chartId = chart.canvas.id;
                var i;
                const legendId = `${chartId}-legend`;
                const ul = document.createElement('ul');
                for (i = 0; i < chart.data.datasets.length; i++) {
                    ul.innerHTML += `
          <li>
          <div class="col-sm-6 col me-3 ms-3 ms-sm-0 me-sm-0 pe-md-0"><div class="row mb-3 align-items-center"><div class="col-md-2"><span class="legend-label" style="background-color: ${ chart.data.datasets[i].backgroundColor[i]}  "></span></div><div class="col-md-9 pl-md-2"><h3 class="mb-0"> ${ chart.data.datasets[i].data[i] }</h3></div><div class="col-sm-12"><p class="text-muted">${ chart.data.datasets[i].label}</p></div></div>

          </li>
        `;
                }
                return document.getElementById(legendId).appendChild(ul);
            }
        }],
        tooltips: {
            backgroundColor: 'rgba(31, 59, 179, 1)',
        }

    };


    var salesData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [{
                label: 'first label',
                data: [20, 25, 35, 45, 35, 40, 46, 44],
                backgroundColor: [
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                ],
                borderColor: [
                    'rgba(35, 175, 71, 1)'
                ],
                borderWidth: 4,
                lineTension: 0.4, 
                fill: false,
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 5, 0],
                pointHoverRadius: [0, 0, 0, 5, 0],
                pointBackgroundColor: ['rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)'],
                pointBorderColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
            },
            {
                label: 'second label',
                data: [30, 24, 28, 35, 40, 35, 32, 38],
                borderColor: [
                    'rgba(31, 59, 179, 1)',
                ],
                borderWidth: 4,
                fill: false,
                lineTension: 0.4, 
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 0, 0],
                pointHoverRadius: [0, 0, 0, 0, 0],
                pointBackgroundColor: ['rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)'],
                pointBorderColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
            },
            {
                label: 'third label',
                data: [35, 30, 36, 45, 35, 44, 48, 53],
                borderColor: [
                    'rgba(232, 233, 241,  .48)',
                ],
                backgroundColor: [
                    'rgba(232,233,241, .48)',
                ],
                borderWidth: 4,
                lineTension: 0.4,    
                fill: true,
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 0, 0],
                pointHoverRadius: [0, 0, 0, 0, 0],
                pointBackgroundColor: ['rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)'],
                pointBorderColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
            }
        ],
    };

    var salesDataOptions = {
        scales: {
            y: {
                display: false
            },
            x: {
                position: 'bottom',
                grid: {
                    drawBorder: false,
                    display: false,
                },
                ticks: {
                    beginAtZero: false,
                    stepSize: 50
                }
            },

        },
        elements: {
            point: {
                radius: 0
            }
        },
        tooltips: {
            backgroundColor: 'rgba(2, 171, 254, 1)',
        },
        plugins: {
            legend: {
                display: false,
            }
          }
    };
    var salesDataDark = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [{
                label: 'first label',
                data: [20, 25, 35, 45, 35, 40, 46, 44],
                backgroundColor: [
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                ],
                borderColor: [
                    'rgba(35, 175, 71, 1)'
                ],
                borderWidth: 4,
                tension:0.4,
                fill: false,
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 5, 0],
                pointHoverRadius: [0, 0, 0, 5, 0],
                pointBackgroundColor: ['rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)'],
                pointBorderColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
            },
            {
                label: 'second label',
                data: [30, 24, 28, 35, 40, 35, 32, 38],
                borderColor: [
                    'rgba(31, 59, 179, 1)',
                ],
                borderWidth: 4,
                tension:0.4,
                fill: false,
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 0, 0],
                pointHoverRadius: [0, 0, 0, 0, 0],
                pointBackgroundColor: ['rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)'],
                pointBorderColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
            },
            {
                label: 'third label',
                data: [35, 30, 36, 45, 35, 44, 48, 53],
                borderColor: [
                    'rgba(28,30,47, 1)',
                ],
                backgroundColor: [
                    'rgba(28,30,47, 1)',
                ],
                borderWidth: 4,
                tension:0.4,
                fill: true,
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 0, 0],
                pointHoverRadius: [0, 0, 0, 0, 0],
                pointBackgroundColor: ['rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)', 'rgba(35, 175, 71,1)'],
                pointBorderColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
            }
        ],
    };
    var salesDataOptionsDark = {
        scales: {
            y: {
                display: false
            },
            x: {
                position: 'bottom',
                grid: {
                    drawBorder: false,
                    display: false,
                },
                ticks: {
                    beginAtZero: false,
                    stepSize: 50
                }
            },

        },
        plugins: {
            legend: {
                display: false,
            }
        },
        elements: {
            point: {
                radius: 0
            }
        },
        tooltips: {
            backgroundColor: 'rgba(2, 171, 254, 1)',
        }
    };

    var acquisitionBarOption = {
        layout: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
            }
        },

        scales: {
            responsive: true,
            maintainAspectRatio: true,
            y: {
                stacked: true,
                display: false,
                grid: {
                    color: 'rgba(0, 0, 0, 0.03)',
                }
            },
            x: {
                stacked: true,
                display: false,
                barPercentage: 0.9,
                grid: {
                    display: false,
                }
            }
        },
        plugins: {
            legend: {
                display: false,
            }
          }
    };
    if ($('#acquisition-bar_1').length) {
        var acquisitionBar1 = $("#acquisition-bar_1").get(0).getContext("2d");
        var barChart = new Chart(acquisitionBar1, {
            type: 'bar',
            data: {
                labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5"],
                datasets: [{
                    data: [39, 39, 48, 28, 38],
                    backgroundColor: '#fff'
                }]
            },
            options: acquisitionBarOption
        });
    }
    if ($('#acquisition-bar_2').length) {
        var acquisitionBar2 = $("#acquisition-bar_2").get(0).getContext("2d");
        var barChart = new Chart(acquisitionBar2, {
            type: 'bar',
            data: {
                labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5"],
                datasets: [{
                    data: [43, 24, 32, 15, 20],
                    backgroundColor: '#fff'
                }]
            },
            options: acquisitionBarOption
        });
    }
    if ($('#circleProgress1').length) {
        var bar = new ProgressBar.Circle(circleProgress1, {
            color: '#0aadfe',
            strokeWidth: 10,
            trailWidth: 10,
            easing: 'easeInOut',
            duration: 1400,
            width: 42,
        });
        bar.animate(.18); // Number from 0.0 to 1.0
    }
    if ($('#circleProgress2').length) {
        var bar = new ProgressBar.Circle(circleProgress2, {
            color: '#fa424a',
            strokeWidth: 10,
            trailWidth: 10,
            easing: 'easeInOut',
            duration: 1400,
            width: 42,

        });
        bar.animate(.36); // Number from 0.0 to 1.0
    }

    // Get context with jQuery - using jQuery's .get() method.

    if ($("#salesTopChart").length) {
        var graphGradient = document.getElementById("salesTopChart").getContext('2d');;
        var saleGradientBg = graphGradient.createLinearGradient(25, 0, 75, 150);
        saleGradientBg.addColorStop(0, 'rgba(8, 239, 185, 0.1)');
        saleGradientBg.addColorStop(1, 'rgba(228, 243, 240, 0.5)');
        var salesTopData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: '# of Votes',
                data: [0, 30, 20, 70, 75],
                backgroundColor: saleGradientBg,
                borderColor: [
                    'rgba(35, 175, 71,1)',
                ],
                borderWidth: 3,
                fill: true, // 3: no fill
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 10, 0],
                pointHoverRadius: [0, 0, 0, 10, 0],
                pointBackgroundColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
                pointBorderColor: ['rgba(35, 175, 71,0.3)', 'rgba(35, 175, 71,0.3)', 'rgba(35, 175, 71,0.3)', 'rgba(35, 175, 71,0.3)'],
            }]
        };

        var salesTopOptions = {
            scales: {
                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: false,
                    }
                },
                x: {
                    grid: {
                        display: true,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: false,
                    }
                },
            },
            elements: {
                line: {
                    tension: 0.4,
                }
            },
            tooltips: {
                backgroundColor: 'rgba(31, 59, 179, 1)',
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    
        var salesTop = new Chart(graphGradient, {
            type: 'line',
            data: salesTopData,
            options: salesTopOptions
        });
    }


    if ($("#salesTopChartDark").length) {
        var graphGradientTop = document.getElementById('salesTopChartDark').getContext('2d');
        var canvas = document.getElementById("salesTopChartDark");

        var salesTopDataDark = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: '# of Votes',
                data: [0, 30, 20, 70, 75],
                backgroundColor: "#fff",
                borderColor: [
                    'rgba(35, 175, 71,1)',
                ],
                borderWidth: 3,
                fill: true, // 3: no fill
                pointBorderWidth: 4,
                pointRadius: [0, 0, 0, 10, 0],
                pointHoverRadius: [0, 0, 0, 10, 0],
                pointBackgroundColor: ['rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)', 'rgba(255, 255, 255,1)'],
                pointBorderColor: ['rgba(35, 175, 71,0.3)', 'rgba(35, 175, 71,0.3)', 'rgba(35, 175, 71,0.3)', 'rgba(35, 175, 71,0.3)'],
            }]
        };

        var salesTopOptionsDark = {
            scales: {
                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: false,
                    }
                },
            },
            legend: {
                display: false
            },
            elements: {
                line: {
                    tension: 0.4,
                }
            },
            tooltips: {
                backgroundColor: 'rgba(31, 59, 179, 1)',
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
        var areaChartCanvas = $("#salesTopChartDark").get(0).getContext("2d");
        var salesTop = new Chart(areaChartCanvas, {
            type: 'line',
            data: salesTopDataDark,
            options: salesTopOptionsDark
        });
    }

    if ($("#areaChartMarketing").length) {
        var areaChartCanvas = $("#areaChartMarketing").get(0).getContext("2d");
        var areaChartMarketing = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaMarketingData,
            options: areaMarketingOptions
        });
    }

    if ($("#purchaseDetails").length) {
        const purchaseDetailsCanvas = document.getElementById('purchaseDetails');
        new Chart(purchaseDetailsCanvas, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr"],
                datasets: [{
                    label: 'Offline purchases',
                    data: [41676, 40776, 41676, 39676],
                    backgroundColor: [
                        'rgba(31, 59, 179, 1)',
                        'rgba(31, 59, 179, 1)',
                        'rgba(31, 59, 179, 1)',
                        'rgba(31, 59, 179, 1)',
                    ],
                    borderColor: [
                        'rgba(31, 59, 179, 1)',
                        'rgba(31, 59, 179, 1)',
                        'rgba(31, 59, 179, 1)',
                        'rgba(31, 59, 179, 1)',
                    ],
                    borderWidth: 2,
                    fill: false
                    },
                    {
                        label: 'Online purchases',
                        data: [40982, 50982, 31982, 48982],
                        backgroundColor: [
                            'rgba(35, 175, 71, 1)',
                            'rgba(35, 175, 71, 1)',
                            'rgba(35, 175, 71, 1)',
                            'rgba(35, 175, 71, 1)',
                        ],
                        borderColor: [
                            'rgba(35, 175, 71, 1)',
                            'rgba(35, 175, 71, 1)',
                            'rgba(35, 175, 71, 1)',
                            'rgba(35, 175, 71, 1)',
                        ],
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Offline sales',
                        data: [57545, 37545, 87545, 48982],
                        backgroundColor: [
                            'rgba(2, 171, 254, 1)',
                            'rgba(2, 171, 254, 1)',
                            'rgba(2, 171, 254, 1)',
                            'rgba(2, 171, 254, 1)',
                        ],
                        borderColor: [
                            'rgba(2, 171, 254, 1)',
                            'rgba(2, 171, 254, 1)',
                            'rgba(2, 171, 254, 1)',
                            'rgba(2, 171, 254, 1)',
                        ],
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Online sales',
                        data: [47545, 27545, 48982, 97545],
                        backgroundColor: [
                            'rgba(224, 224, 224, 1)',
                            'rgba(224, 224, 224, 1)',
                            'rgba(224, 224, 224, 1)',
                            'rgba(224, 224, 224, 1)',
                        ],
                        borderColor: [
                            'rgba(224, 224, 224, 1)',
                            'rgba(224, 224, 224, 1)',
                            'rgba(224, 224, 224, 1)',
                            'rgba(224, 224, 224, 1)',
                        ],
                        borderWidth: 2,
                        fill: false
                    }
                ],
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        position: 'bottom',
                        display: true,
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                        ticks: {
                            display: false //this will remove only the label
                        }
                    },
                    y: {
                        display: false,
                        grid: {
                            drawBorder: true,
                            display: false,
                        },
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
            plugins: [{
                afterDatasetUpdate: function(chart, args, options) {
                    const chartId = chart.canvas.id;
                    var i;
                    const legendId = `${chartId}-legend`;
                    const ul = document.createElement('ul');
                    for (i = 0; i < chart.data.datasets.length; i++) {
                        ul.innerHTML += `
              <li>
              <div class="col-sm-12 col me-3 ms-3 ms-sm-0 me-sm-0 pe-md-0"><div class="row mb-3 align-items-center"><div class="col-md-2"><span class="legend-label" style="background-color: ${ chart.data.datasets[i].backgroundColor[i]}  "></span></div><div class="col-md-9 pl-md-2"><h3 class="mb-0"> ${ chart.data.datasets[i].data[i] }</h3></div><div class="col-sm-12"><p class="text-muted">${ chart.data.datasets[i].label}</p></div></div>

              </li>
            `;
                    }
                    return document.getElementById(legendId).appendChild(ul);
                }
            }]
        });
    }

    if ($("#purchaseDetailsDark").length) {
        const purchaseDetailsDarkCanvas = document.getElementById('purchaseDetailsDark');
        new Chart(purchaseDetailsDarkCanvas, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr"],
        datasets: [{
                label: 'Offline purchases',
                data: [41676, 40776, 41676, 39676],
                backgroundColor: [
                    'rgba(0,24,255, 1)',
                    'rgba(0,24,255, 1)',
                    'rgba(0,24,255, 1)',
                    'rgba(0,24,255, 1)',
                ],
                borderColor: [
                    'rgba(0,24,255, 1)',
                    'rgba(0,24,255, 1)',
                    'rgba(0,24,255, 1)',
                    'rgba(0,24,255, 1)',
                ],
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Online purchases',
                data: [40982, 50982, 31982, 48982],
                backgroundColor: [
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                ],
                borderColor: [
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                    'rgba(35, 175, 71, 1)',
                ],
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Offline sales',
                data: [57545, 37545, 87545, 48982],
                backgroundColor: [
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                ],
                borderColor: [
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                    'rgba(2, 171, 254, 1)',
                ],
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Online sales',
                data: [47545, 27545, 48982, 97545],
                backgroundColor: [
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                ],
                borderColor: [
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                    'rgba(224, 224, 224, 1)',
                ],
                borderWidth: 2,
                fill: false
                }
            ],
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        position: 'bottom',
                        display: true,
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                        ticks: {
                            display: false //this will remove only the label
                        }
                    },
                    y: {
                        display: false,
                        grid: {
                            drawBorder: true,
                            display: false,
                        },
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
            plugins: [{
                afterDatasetUpdate: function(chart, args, options) {
                    const chartId = chart.canvas.id;
                    var i;
                    const legendId = `${chartId}-legend`;
                    const ul = document.createElement('ul');
                    for (i = 0; i < chart.data.datasets.length; i++) {
                        ul.innerHTML += `
              <li>
              <div class="col-sm-12 col me-3 ms-3 ms-sm-0 me-sm-0 pe-md-0"><div class="row mb-3 align-items-center"><div class="col-md-2"><span class="legend-label" style="background-color: ${ chart.data.datasets[i].backgroundColor[i]}  "></span></div><div class="col-md-9 pl-md-2"><h3 class="mb-0"> ${ chart.data.datasets[i].data[i] }</h3></div><div class="col-sm-12"><p class="text-muted">${ chart.data.datasets[i].label}</p></div></div>

              </li>
            `;
                    }
                    return document.getElementById(legendId).appendChild(ul);
                }
            }]
        });
    }

    if ($("#salesChart").length) {
        var lineChartCanvas = $("#salesChart").get(0).getContext("2d");
        var saleschart = new Chart(lineChartCanvas, {
            type: 'line',
            data: salesData,
            options: salesDataOptions
        });
    }
    if ($("#salesChartDark").length) {
        var lineChartCanvasDark = $("#salesChartDark").get(0).getContext("2d");
        var saleschartdark = new Chart(lineChartCanvasDark, {
            type: 'line',
            data: salesDataDark,
            options: salesDataOptionsDark
        });
    }


    if ($("#revenue-overview").length) {
        const revenueoverviewCanvas = document.getElementById('revenue-overview');
        new Chart(revenueoverviewCanvas, {
            type: 'line',
            data: {
                labels: ["A", "B", "C", "D", "E", "F", "g", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "g", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "g", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "T", "U", "V", "W", "X", "Y", "Z"],
                datasets: [{
                        label: 'This year',
                        data: [56, 56, 55, 58, 58, 57, 56, 55, 55, 56, 56, 57, 57, 57, 58, 58, 58, 56, 56, 56, 56, 56, 58, 58, 57, 55, 54, 54, 54, 56, 56, 56, 55, 55, 53, 53, 53, 53, 55, 55, 55, 56, 56, 56, 55, 56, 56, 56, 55, 54, 54, 56, 56, 56, 57, 57, 57, 57, 55, 55, 56, 56, 54, 54, 54, 54, 56, 57, 57, 55, 55, 56, 56, 57, 57, 58, 59, 58, 58, 58, 56, 56, 58, 58],
                        borderColor: [
                            '#392ccd'
                        ],
                        borderWidth: 2.5,
                        fill: false,
                        backgroundColor: "rgba(255, 255, 255, 1)"
                    },
                    {
                        label: 'Past year',
                        data: [26, 26, 25, 28, 28, 27, 26, 25, 25, 26, 26, 27, 27, 27, 28, 28, 28, 26, 26, 26, 26, 26, 28, 28, 27, 25, 24, 24, 24, 26, 26, 26, 25, 25, 23, 23, 23, 23, 25, 25, 25, 26, 26, 26, 25, 26, 26, 26, 25, 24, 24, 26, 26, 26, 27, 27, 27, 27, 25, 25, 26, 26, 24, 24, 24, 24, 26, 27, 27, 25, 25, 26, 26, 27, 27, 28, 29, 28, 28, 28, 26, 26, 28, 28],
                        borderColor: [
                            '#17c964',
                        ],
                        borderWidth: 2.5,
                        fill: false,
                        backgroundColor: "rgba(255, 255, 255, 1)"
                    }
                ],
            },
            options: {
                scales: {
                    y: {
                        display: false,
                        grid: {
                            display: false,
                            drawTicks: false,
                            drawBorder: false,
                        },
                        ticks: {
                            display: false,
                            autoSkip: true,
                            maxTicksLimit: 10,
                            stepSize: 35,
                            beginAtZero: true,
                        }
                    },
                    x: {
                        display: true,
                        position: 'top',
                        grid: {
                            drawBorder: true,
                            display: true,
                            color: "#ededed",
                        },
                        ticks: {
                            display: true,
                            beginAtZero: true,
                            autoSkip: true,
                            maxTicksLimit: 12,
                            stepSize: 20
                        }
                    },

                },
                elements: {
                    point: {
                        radius: 0
                    }
                },
                tooltips: {
                    backgroundColor: 'rgba(2, 171, 254, 1)',
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
            plugins: [{
                afterDatasetUpdate: function(chart, args, options) {
                    const chartId = chart.canvas.id;
                    var i;
                    const legendId = `${chartId}-legend`;
                    const ul = document.createElement('ul');
                    for (i = 0; i < chart.data.datasets.length; i++) {
                        ul.innerHTML += `
              <li>
              <div class="col-sm-6 col me-3 ms-3 ms-sm-0 me-sm-0 pe-md-0"><div class="row mb-3 align-items-center"><div class="col-sm-12"><h6>${chart.data.datasets[i].label }</h6></div><div class="d-flex"><div class="me-2"><span class="legend-label" style="background-color: ${ chart.data.datasets[i].borderColor[0] } "></span></div><div class="pl-md-2"><h2 class="mb-0">  ${ chart.data.datasets[i].data[i] } </h2></div></div><div class="col-sm-12"><p class="text-small text-muted"> ${ chart.data.datasets[i].data[5] } % Total</p></div></div>

              </li>
            `;
                    }
                    return document.getElementById(legendId).appendChild(ul);
                }
            }]
        });
    }


    if ($("#revenue-overview-dark").length) {
        const revenueoverviewdarkCanvas = document.getElementById('revenue-overview-dark');
        new Chart(revenueoverviewdarkCanvas, {
            type: 'line',
            data: {
                labels: ["A", "B", "C", "D", "E", "F", "g", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "g", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "g", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "T", "U", "V", "W", "X", "Y", "Z"],
                datasets: [{
                        label: 'This year',
                        data: [56, 56, 55, 58, 58, 57, 56, 55, 55, 56, 56, 57, 57, 57, 58, 58, 58, 56, 56, 56, 56, 56, 58, 58, 57, 55, 54, 54, 54, 56, 56, 56, 55, 55, 53, 53, 53, 53, 55, 55, 55, 56, 56, 56, 55, 56, 56, 56, 55, 54, 54, 56, 56, 56, 57, 57, 57, 57, 55, 55, 56, 56, 54, 54, 54, 54, 56, 57, 57, 55, 55, 56, 56, 57, 57, 58, 59, 58, 58, 58, 56, 56, 58, 58],
                        borderColor: [
                            '#fff'
                        ],
                        borderWidth: 2.5,
                        fill: false,
                        backgroundColor: "rgba(255, 255, 255, 1)"
                    },
                    {
                        label: 'Past year',
                        data: [26, 26, 25, 28, 28, 27, 26, 25, 25, 26, 26, 27, 27, 27, 28, 28, 28, 26, 26, 26, 26, 26, 28, 28, 27, 25, 24, 24, 24, 26, 26, 26, 25, 25, 23, 23, 23, 23, 25, 25, 25, 26, 26, 26, 25, 26, 26, 26, 25, 24, 24, 26, 26, 26, 27, 27, 27, 27, 25, 25, 26, 26, 24, 24, 24, 24, 26, 27, 27, 25, 25, 26, 26, 27, 27, 28, 29, 28, 28, 28, 26, 26, 28, 28],
                        borderColor: [
                            '#17c964',
                        ],
                        borderWidth: 2.5,
                        fill: false,
                        backgroundColor: "rgba(255, 255, 255, 1)"
                    }
                ],
            },
            options: {
                scales: {
                    y: {
                        display: false,
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 10,
                            stepSize: 35,
                            beginAtZero: true,
                        }
                    },
                    x: {
                        display: true,
                        position: 'top',
                        grid: {
                            drawBorder: false,
                            display: true,
                            color: "#1e1e1e",
                        },
                        ticks: {
                            beginAtZero: true,
                            autoSkip: true,
                            maxTicksLimit: 12,
                            stepSize: 20
                        }
                    },
    
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },
                tooltips: {
                    backgroundColor: 'rgba(2, 171, 254, 1)',
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
            plugins: [{
                afterDatasetUpdate: function(chart, args, options) {
                    const chartId = chart.canvas.id;
                    var i;
                    const legendId = `${chartId}-legend`;
                    const ul = document.createElement('ul');
                    for (i = 0; i < chart.data.datasets.length; i++) {
                        ul.innerHTML += `
              <li>
              <div class="col-sm-6 col me-3 ms-3 ms-sm-0 me-sm-0 pe-md-0"><div class="row mb-3 align-items-center"><div class="col-sm-12"><h6>${chart.data.datasets[i].label }</h6></div><div class="d-flex"><div class="me-2"><span class="legend-label" style="background-color: ${ chart.data.datasets[i].borderColor[0] } "></span></div><div class="pl-md-2"><h2 class="mb-0">  ${ chart.data.datasets[i].data[i] } </h2></div></div><div class="col-sm-12"><p class="text-small text-light"> ${ chart.data.datasets[i].data[5] } % Total</p></div></div>

              </li>
            `;
                    }
                    return document.getElementById(legendId).appendChild(ul);
                }
            }]
        });
    }

});
/*--------------------------------
   ----- REALTIME CHART -----
   --------------------------------*/