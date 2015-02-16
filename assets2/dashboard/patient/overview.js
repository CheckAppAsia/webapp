var ewi = 0;

$(document).ready(function(){
	
	function loadNextWidget(){
		if(enbledWidgets.length >ewi){
			_ajax('dashboard/patient/overview/loadWidgetData',{
				'widget_id': enbledWidgets[ewi]
			},function(response){
				$("#widget_"+enbledWidgets[ewi]+" .data_icon").addClass(response.color);
				$("#widget_"+enbledWidgets[ewi]+" .data_icon .fa").addClass(response.icon);
				$("#widget_"+enbledWidgets[ewi]+" .data_amount_1").text(response.value1);
				$("#widget_"+enbledWidgets[ewi]+" .data_amount_2").text(response.value2);
				ewi++;
				loadNextWidget();
			})
		}
	}
	
	loadNextWidget();
	
	
	 $('.highcharts.bgp').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Blood Pressure Graph'
            },
            subtitle: {
                text: 'All Today 7 days last 30 days'
            },
            xAxis: {
                type: 'datetime',
				 title: {
                    text: 'Date'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            yAxis: {
                title: {
                    text: 'Systolic'
                },
                min: 100,
                minorGridLineWidth: 0,
                gridLineWidth: 0,
                alternateGridColor: null,
                plotBands: [{
                    from: 160,
                    to: 161,
                    color: '#FE605F',
                    label: {
                        text: 'High Blood Pressure',
                        style: {
                            color: '#333'
                        }
                    }
                }, {
                    from: 140,
                    to: 141,
                    color: '#FE7312',
                    label: {
                        text: 'Marginal Blood Pressure',
                        style: {
                            color: '#333',
							'text-align':'right'
                        }
                    }
                }, {
                    from: 120,
                    to: 121,
                    color: '#ACFEAE',
                    label: {
                        text: 'Normal Blood Pressure',
                        style: {
                            color: '#333'
                        }
                    }
                }]
            },
            tooltip: {
                valueSuffix: ' m/s'
            },
            plotOptions: {
                spline: {
                    lineWidth: 2,
                    states: {
                        hover: {
                            lineWidth: 2
                        }
                    },
                    marker: {
                        enabled: true
                    },
                    pointInterval: 86400000, // one hour
                    pointStart: Date.UTC(2014, 9, 6, 0, 0, 0)
                }
            },
            series: [{
                name: 'BP',
                data: [133, 155, 153, 168, 167, 145, 167, 159, 153, 150, 141, 182, 155, 136, 141, 151, 150, 141, 160, 157, 141, 148, 135, 125, 151, 140, 121, 126, 143, 141, 148, 140, 129, 130, 138, 109, 108, 105, 129, 108, 108, 115, 115, 116, 132, 149, 148, 113, 118, 129, 118, 115, 104, 130, 122, 132, 110, 120, 110, 139, 125, 128, 110, 124, 128]
    
            }]
            ,
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
	
});