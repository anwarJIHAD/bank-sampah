/**
 * Dashboard Analytics
 */

'use strict';

(function () {
  let cardColor, labelColor, borderColor, chartBgColor, bodyColor;

  cardColor = config.colors.cardColor;
  labelColor = config.colors.textMuted;
  borderColor = config.colors.borderColor;
  chartBgColor = config.colors.chartBgColor;
  bodyColor = config.colors.bodyColor;
  // alert('oy');
  let tahun = '';
  $.ajax({
    url: 'http://localhost/banksampah_fix/C_dashboard/getTransNas', //url
    type: 'GET',
    data: { tahun: tahun },
    dataType: 'json',
    success: function (response) {
      var month_1 = response['month_1']
      var month_2 = response['month_2']
      var month_3 = response['month_3']
      var month_4 = response['month_4']
      var month_5 = response['month_5']
      var month_6 = response['month_6']
      var month_7 = response['month_7']
      var month_8 = response['month_8']
      var month_9 = response['month_9']
      var month_10 = response['month_10']
      var month_11 = response['month_11']
      var month_12 = response['month_12']

      const weeklyOverviewChartEl = document.querySelector('#weeklyOverviewChart'),
      weeklyOverviewChartConfig = {
        chart: {
          type: 'line', // Changed to 'line'
          height: 300,
          offsetY: -9,
          offsetX: -16,
          parentHeightOffset: 0,
          toolbar: {
            show: false
          }
        },
        series: [
          {
            name: 'Jumlah Transaksi',
            data: [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12],
            color: '#0000FF' // Set the line color to blue
          }
        ],
        colors: ['#0000FF'], // Change this to blue color
        dataLabels: {
          enabled: false
        },
        legend: {
          show: false
        },
        grid: {
          strokeDashArray: 8,
          borderColor,
          padding: {
            bottom: -10
          }
        },
        xaxis: {
          categories: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          tickPlacement: 'on',
          labels: {
            show: true
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          }
        },
        yaxis: {
          min: 0,
          max: 70,
          show: true,
          tickAmount: 4,
          labels: {
            formatter: function (val) {
              return parseInt(val) + ' x';
            },
            style: {
              fontSize: '0.75rem',
              fontFamily: 'Inter',
              colors: labelColor
            }
          }
        },
        states: {
          hover: {
            filter: {
              type: 'none'
            }
          },
          active: {
            filter: {
              type: 'none'
            }
          }
        },
        responsive: [
          {
            breakpoint: 1500,
            options: {
              plotOptions: {
                line: {
                  columnWidth: '40%'
                }
              }
            }
          },
          {
            breakpoint: 1200,
            options: {
              plotOptions: {
                line: {
                  columnWidth: '30%'
                }
              }
            }
          },
          {
            breakpoint: 815,
            options: {
              plotOptions: {
                line: {
                  borderRadius: 5
                }
              }
            }
          },
          {
            breakpoint: 768,
            options: {
              plotOptions: {
                line: {
                  borderRadius: 10,
                  columnWidth: '20%'
                }
              }
            }
          },
          {
            breakpoint: 568,
            options: {
              plotOptions: {
                line: {
                  borderRadius: 8,
                  columnWidth: '30%'
                }
              }
            }
          },
          {
            breakpoint: 410,
            options: {
              plotOptions: {
                line: {
                  columnWidth: '50%'
                }
              }
            }
          }
        ]
      };

      if (typeof weeklyOverviewChartEl !== undefined && weeklyOverviewChartEl !== null) {
        const weeklyOverviewChart = new ApexCharts(weeklyOverviewChartEl, weeklyOverviewChartConfig);
        weeklyOverviewChart.render();
      }
    }
  })

  $('#search_transaksinasabah').change(function () {
    var tahun = $(this).val().toLowerCase();
    console.log(tahun);
    $.ajax({
      url: 'http://localhost/banksampah_fix/C_dashboard/getTransNas', //url
      type: 'GET',
      data: { tahun: tahun },
      dataType: 'json',
      success: function (response) {
        var month_1 = response['month_1']
        var month_2 = response['month_2']
        var month_3 = response['month_3']
        var month_4 = response['month_4']
        var month_5 = response['month_5']
        var month_6 = response['month_6']
        var month_7 = response['month_7']
        var month_8 = response['month_8']
        var month_9 = response['month_9']
        var month_10 = response['month_10']
        var month_11 = response['month_11']
        var month_12 = response['month_12']

        const existingChartEl = document.querySelector('#weeklyOverviewChart');
        if (existingChartEl) {
          existingChartEl.remove();
        }
         // Recreate chart container element
        const newChartContainer = document.createElement('div');
        newChartContainer.id = 'weeklyOverviewChart';
        document.querySelector('.card-body.nasabah').appendChild(newChartContainer);


        const weeklyOverviewChartEl = document.querySelector('#weeklyOverviewChart'),
        weeklyOverviewChartConfig = {
          chart: {
            type: 'line', // Changed to 'line'
            height: 300,
            offsetY: -9,
            offsetX: -16,
            parentHeightOffset: 0,
            toolbar: {
              show: false
            }
          },
          series: [
            {
              name: 'Jumlah Transaksi',
              data: [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12],
              color: '#0000FF' // Set the line color to blue
            }
          ],
          colors: ['#0000FF'], // Change this to blue color
          dataLabels: {
            enabled: false
          },
          legend: {
            show: false
          },
          grid: {
            strokeDashArray: 8,
            borderColor,
            padding: {
              bottom: -10
            }
          },
          xaxis: {
            categories: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            tickPlacement: 'on',
            labels: {
              show: true
            },
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false
            }
          },
          yaxis: {
            min: 0,
            max: 70,
            show: true,
            tickAmount: 4,
            labels: {
              formatter: function (val) {
                return parseInt(val) + ' x';
              },
              style: {
                fontSize: '0.75rem',
                fontFamily: 'Inter',
                colors: labelColor
              }
            }
          },
          states: {
            hover: {
              filter: {
                type: 'none'
              }
            },
            active: {
              filter: {
                type: 'none'
              }
            }
          },
          responsive: [
            {
              breakpoint: 1500,
              options: {
                plotOptions: {
                  line: {
                    columnWidth: '40%'
                  }
                }
              }
            },
            {
              breakpoint: 1200,
              options: {
                plotOptions: {
                  line: {
                    columnWidth: '30%'
                  }
                }
              }
            },
            {
              breakpoint: 815,
              options: {
                plotOptions: {
                  line: {
                    borderRadius: 5
                  }
                }
              }
            },
            {
              breakpoint: 768,
              options: {
                plotOptions: {
                  line: {
                    borderRadius: 10,
                    columnWidth: '20%'
                  }
                }
              }
            },
            {
              breakpoint: 568,
              options: {
                plotOptions: {
                  line: {
                    borderRadius: 8,
                    columnWidth: '30%'
                  }
                }
              }
            },
            {
              breakpoint: 410,
              options: {
                plotOptions: {
                  line: {
                    columnWidth: '50%'
                  }
                }
              }
            }
          ]
        };

        if (typeof weeklyOverviewChartEl !== undefined && weeklyOverviewChartEl !== null) {
          const weeklyOverviewChart = new ApexCharts(weeklyOverviewChartEl, weeklyOverviewChartConfig);
          weeklyOverviewChart.render();
        }
      }
    })
  })



  // chart transaksi pelapak
  $.ajax({
    url: 'http://localhost/banksampah_fix/C_dashboard/getTransPel', //url
    type: 'GET',
    data: { tahun: tahun },
    dataType: 'json',
    success: function (response) {
      var month_1 = response['month_1']
      var month_2 = response['month_2']
      var month_3 = response['month_3']
      var month_4 = response['month_4']
      var month_5 = response['month_5']
      var month_6 = response['month_6']
      var month_7 = response['month_7']
      var month_8 = response['month_8']
      var month_9 = response['month_9']
      var month_10 = response['month_10']
      var month_11 = response['month_11']
      var month_12 = response['month_12']
    const chartPelapakEl = document.querySelector('#chartPelapak'),
    chartPelapakConfig = {
      chart: {
        type: 'bar',
        height: 200,
        offsetY: -9,
        offsetX: -16,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      series: [
        {
          name: 'Jumlah Transaksi',
          data: [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12]
        }
      ],
      colors: [chartBgColor],
      plotOptions: {
        bar: {
          borderRadius: 8,
          columnWidth: '30%',
          endingShape: 'rounded',
          startingShape: 'rounded',
          colors: {
            ranges: [
              {
                from: 0,
                to: 10,
                color: config.colors.primary
              },
              {
                from: 11,
                to: 40,
                color: config.colors.primary
              },
            ]
          }
        }
      },
      dataLabels: {
        enabled: false
      },
      legend: {
        show: false
      },
      grid: {
        strokeDashArray: 8,
        borderColor,
        padding: {
          bottom: -10
        }
      },
      xaxis: {
        categories: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustur', 'September', 'Oktober', 'November', 'Desember'],
        tickPlacement: 'on',
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        min: 0,
        max: 20,
        show: true,
        tickAmount: 4,
        labels: {
          formatter: function (val) {
            return parseInt(val) + ' x';
          },
          style: {
            fontSize: '0.75rem',
            fontFamily: 'Inter',
            colors: labelColor
          }
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      },
      responsive: [
        {
          breakpoint: 1500,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 815,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 5
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '20%'
              }
            }
          }
        },
        {
          breakpoint: 568,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 8,
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 410,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            }
          }
        }
      ]
    };
  if (typeof chartPelapakEl !== undefined && chartPelapakEl !== null) {
    const chartPelapak = new ApexCharts(chartPelapakEl, chartPelapakConfig);
    chartPelapak.render();
  }
    }
  })
  $('#search_transaksipelapak').change(function () {
    var tahun = $(this).val().toLowerCase();
    console.log(tahun);
    $.ajax({
      url: 'http://localhost/banksampah_fix/C_dashboard/getTransPel', //url
      type: 'GET',
      data: { tahun: tahun },
      dataType: 'json',
      success: function (response) {
        var month_1 = response['month_1']
        var month_2 = response['month_2']
        var month_3 = response['month_3']
        var month_4 = response['month_4']
        var month_5 = response['month_5']
        var month_6 = response['month_6']
        var month_7 = response['month_7']
        var month_8 = response['month_8']
        var month_9 = response['month_9']
        var month_10 = response['month_10']
        var month_11 = response['month_11']
        var month_12 = response['month_12']
        const weeklyOverviewChart = document.getElementById('chartPelapak');
          chartPelapak.innerHTML = '';
      const chartPelapakEl = document.querySelector('#chartPelapak'),
      chartPelapakConfig = {
        chart: {
          type: 'bar',
          height: 200,
          offsetY: -9,
          offsetX: -16,
          parentHeightOffset: 0,
          toolbar: {
            show: false
          }
        },
        series: [
          {
            name: 'Jumlah Transaksi',
            data: [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12]
          }
        ],
        colors: [chartBgColor],
        plotOptions: {
          bar: {
            borderRadius: 8,
            columnWidth: '30%',
            endingShape: 'rounded',
            startingShape: 'rounded',
            colors: {
              ranges: [
                {
                  from: 0,
                  to: 10,
                  color: config.colors.primary
                },
                {
                  from: 11,
                  to: 40,
                  color: config.colors.primary
                },
              ]
            }
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {
          show: false
        },
        grid: {
          strokeDashArray: 8,
          borderColor,
          padding: {
            bottom: -10
          }
        },
        xaxis: {
          categories: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustur', 'September', 'Oktober', 'November', 'Desember'],
          tickPlacement: 'on',
          labels: {
            show: false
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          }
        },
        yaxis: {
          min: 0,
          max: 20,
          show: true,
          tickAmount: 4,
          labels: {
            formatter: function (val) {
              return parseInt(val) + ' x';
            },
            style: {
              fontSize: '0.75rem',
              fontFamily: 'Inter',
              colors: labelColor
            }
          }
        },
        states: {
          hover: {
            filter: {
              type: 'none'
            }
          },
          active: {
            filter: {
              type: 'none'
            }
          }
        },
        responsive: [
          {
            breakpoint: 1500,
            options: {
              plotOptions: {
                bar: {
                  columnWidth: '40%'
                }
              }
            }
          },
          {
            breakpoint: 1200,
            options: {
              plotOptions: {
                bar: {
                  columnWidth: '30%'
                }
              }
            }
          },
          {
            breakpoint: 815,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 5
                }
              }
            }
          },
          {
            breakpoint: 768,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '20%'
                }
              }
            }
          },
          {
            breakpoint: 568,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 8,
                  columnWidth: '30%'
                }
              }
            }
          },
          {
            breakpoint: 410,
            options: {
              plotOptions: {
                bar: {
                  columnWidth: '50%'
                }
              }
            }
          }
        ]
      };
    if (typeof chartPelapakEl !== undefined && chartPelapakEl !== null) {
      const chartPelapak = new ApexCharts(chartPelapakEl, chartPelapakConfig);
      chartPelapak.render();
    }
      }
    })

  })
  // --------------------------------------------------------------------


  // chart operasional
  $.ajax({
    url: 'http://localhost/banksampah_fix/C_dashboard/getTransPel', //url
    type: 'GET',
    data: { tahun: tahun },
    dataType: 'json',
    success: function (response) {
      var month_1 = response['month_1']
      var month_2 = response['month_2']
      var month_3 = response['month_3']
      var month_4 = response['month_4']
      var month_5 = response['month_5']
      var month_6 = response['month_6']
      var month_7 = response['month_7']
      var month_8 = response['month_8']
      var month_9 = response['month_9']
      var month_10 = response['month_10']
      var month_11 = response['month_11']
      var month_12 = response['month_12']
    const chartoperasionalEl = document.querySelector('#chartoperasional'),
    chartoperasionalConfig = {
      chart: {
        type: 'bar',
        height: 200,
        offsetY: -9,
        offsetX: -16,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      series: [
        {
          name: 'Jumlah Transaksi',
          data: [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12]
        }
      ],
      colors: [chartBgColor],
      plotOptions: {
        bar: {
          borderRadius: 8,
          columnWidth: '30%',
          endingShape: 'rounded',
          startingShape: 'rounded',
          colors: {
            ranges: [
              {
                from: 0,
                to: 10,
                color: config.colors.primary
              },
              {
                from: 11,
                to: 20,
                color: chartBgColor
              },
            ]
          }
        }
      },
      dataLabels: {
        enabled: false
      },
      legend: {
        show: false
      },
      grid: {
        strokeDashArray: 8,
        borderColor,
        padding: {
          bottom: -10
        }
      },
      xaxis: {
        categories: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustur', 'September', 'Oktober', 'November', 'Desember'],
        tickPlacement: 'on',
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        min: 0,
        max: 20,
        show: true,
        tickAmount: 4,
        labels: {
          formatter: function (val) {
            return parseInt(val) + ' x';
          },
          style: {
            fontSize: '0.75rem',
            fontFamily: 'Inter',
            colors: labelColor
          }
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      },
      responsive: [
        {
          breakpoint: 1500,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 815,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 5
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '20%'
              }
            }
          }
        },
        {
          breakpoint: 568,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 8,
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 410,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            }
          }
        }
      ]
    };
  if (typeof chartoperasionalEl !== undefined && chartoperasionalEl !== null) {
    const chartoperasional = new ApexCharts(chartoperasionalEl, chartoperasionalConfig);
    chartoperasional.render();
  }
    }
  })
  $('#search_transaksipelapak').change(function () {
    var tahun = $(this).val().toLowerCase();
    console.log(tahun);
    $.ajax({
      url: 'http://localhost/banksampah_fix/C_dashboard/getTransPel', //url
      type: 'GET',
      data: { tahun: tahun },
      dataType: 'json',
      success: function (response) {
        var month_1 = response['month_1']
        var month_2 = response['month_2']
        var month_3 = response['month_3']
        var month_4 = response['month_4']
        var month_5 = response['month_5']
        var month_6 = response['month_6']
        var month_7 = response['month_7']
        var month_8 = response['month_8']
        var month_9 = response['month_9']
        var month_10 = response['month_10']
        var month_11 = response['month_11']
        var month_12 = response['month_12']
        const weeklyOverviewChart = document.getElementById('chartoperasional');
          chartoperasional.innerHTML = '';
      const chartoperasionalEl = document.querySelector('#chartoperasional'),
      chartoperasionalConfig = {
        chart: {
          type: 'bar',
          height: 200,
          offsetY: -9,
          offsetX: -16,
          parentHeightOffset: 0,
          toolbar: {
            show: false
          }
        },
        series: [
          {
            name: 'Jumlah Transaksi',
            data: [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12]
          }
        ],
        colors: [chartBgColor],
        plotOptions: {
          bar: {
            borderRadius: 8,
            columnWidth: '30%',
            endingShape: 'rounded',
            startingShape: 'rounded',
            colors: {
              ranges: [
                {
                  from: 0,
                  to: 10,
                  color: config.colors.primary
                },
                {
                  from: 11,
                  to: 20,
                  color: chartBgColor
                },
              ]
            }
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {
          show: false
        },
        grid: {
          strokeDashArray: 8,
          borderColor,
          padding: {
            bottom: -10
          }
        },
        xaxis: {
          categories: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustur', 'September', 'Oktober', 'November', 'Desember'],
          tickPlacement: 'on',
          labels: {
            show: false
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          }
        },
        yaxis: {
          min: 0,
          max: 20,
          show: true,
          tickAmount: 4,
          labels: {
            formatter: function (val) {
              return parseInt(val) + ' x';
            },
            style: {
              fontSize: '0.75rem',
              fontFamily: 'Inter',
              colors: labelColor
            }
          }
        },
        states: {
          hover: {
            filter: {
              type: 'none'
            }
          },
          active: {
            filter: {
              type: 'none'
            }
          }
        },
        responsive: [
          {
            breakpoint: 1500,
            options: {
              plotOptions: {
                bar: {
                  columnWidth: '40%'
                }
              }
            }
          },
          {
            breakpoint: 1200,
            options: {
              plotOptions: {
                bar: {
                  columnWidth: '30%'
                }
              }
            }
          },
          {
            breakpoint: 815,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 5
                }
              }
            }
          },
          {
            breakpoint: 768,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '20%'
                }
              }
            }
          },
          {
            breakpoint: 568,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 8,
                  columnWidth: '30%'
                }
              }
            }
          },
          {
            breakpoint: 410,
            options: {
              plotOptions: {
                bar: {
                  columnWidth: '50%'
                }
              }
            }
          }
        ]
      };
    if (typeof chartoperasionalEl !== undefined && chartoperasionalEl !== null) {
      const chartoperasional = new ApexCharts(chartoperasionalEl, chartoperasionalConfig);
      chartoperasional.render();
    }
      }
    })

  })
  // --------------------------------------------------------------------




  // Total Profit line chart
  // --------------------------------------------------------------------
  const totalProfitLineChartEl = document.querySelector('#totalProfitLineChart'),
    totalProfitLineChartConfig = {
      chart: {
        height: 90,
        type: 'line',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      grid: {
        borderColor: labelColor,
        strokeDashArray: 6,
        xaxis: {
          lines: {
            show: true
          }
        },
        yaxis: {
          lines: {
            show: false
          }
        },
        padding: {
          top: -15,
          left: -7,
          right: 9,
          bottom: -15
        }
      },
      colors: [config.colors.primary],
      stroke: {
        width: 3
      },
      series: [
        {
          data: [0, 20, 5, 30, 15, 45]
        }
      ],
      tooltip: {
        shared: false,
        intersect: true,
        x: {
          show: false
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      markers: {
        size: 6,
        strokeWidth: 3,
        strokeColors: 'transparent',
        strokeWidth: 3,
        colors: ['transparent'],
        discrete: [
          {
            seriesIndex: 0,
            dataPointIndex: 5,
            fillColor: cardColor,
            strokeColor: config.colors.primary,
            size: 6,
            shape: 'circle'
          }
        ],
        hover: {
          size: 7
        }
      },
      responsive: [
        {
          breakpoint: 1350,
          options: {
            chart: {
              height: 80
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            chart: {
              height: 100
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            chart: {
              height: 110
            }
          }
        }
      ]
    };
  if (typeof totalProfitLineChartEl !== undefined && totalProfitLineChartEl !== null) {
    const totalProfitLineChart = new ApexCharts(totalProfitLineChartEl, totalProfitLineChartConfig);
    totalProfitLineChart.render();
  }

  // Sessions Column Chart
  // --------------------------------------------------------------------
  const sessionsColumnChartEl = document.querySelector('#sessionsColumnChart'),
    sessionsColumnChartConfig = {
      chart: {
        height: 90,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      plotOptions: {
        bar: {
          barHeight: '100%',
          columnWidth: '20px',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 4,
          colors: {
            ranges: [
              {
                from: 25,
                to: 32,
                color: config.colors.danger
              },
              {
                from: 60,
                to: 75,
                color: config.colors.primary
              },
              {
                from: 45,
                to: 50,
                color: config.colors.danger
              },
              {
                from: 35,
                to: 42,
                color: config.colors.primary
              }
            ],
            backgroundBarColors: [chartBgColor, chartBgColor, chartBgColor, chartBgColor, chartBgColor],
            backgroundBarRadius: 4
          }
        }
      },
      grid: {
        show: false,
        padding: {
          top: -10,
          left: -10,
          bottom: -15
        }
      },
      dataLabels: {
        enabled: false
      },
      legend: {
        show: false
      },
      xaxis: {
        labels: {
          show: false
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      series: [
        {
          data: [30, 70, 50, 40, 60]
        }
      ],
      responsive: [
        {
          breakpoint: 1350,
          options: {
            chart: {
              height: 80
            },
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            chart: {
              height: 100
            },
            plotOptions: {
              bar: {
                columnWidth: '20%'
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            chart: {
              height: 110
            },
            plotOptions: {
              bar: {
                columnWidth: '10%'
              }
            }
          }
        },
        {
          breakpoint: 480,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '20%'
              }
            }
          }
        }
      ]
    };
  if (typeof sessionsColumnChartEl !== undefined && sessionsColumnChartEl !== null) {
    const sessionsColumnChart = new ApexCharts(sessionsColumnChartEl, sessionsColumnChartConfig);
    sessionsColumnChart.render();
  }
})();
