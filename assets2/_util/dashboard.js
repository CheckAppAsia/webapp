$(function () {

	$(".edit_widget .edit").on("click",function(){
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			//$(".edit_widget .options").hide('slide',{direction:'up'},350);
			$(".edit_widget .options").fadeOut('fast');
		}else{
			$(this).addClass("active");
			$(".edit_widget .options").fadeIn('fast');
		}
	});

	$('.highcharts.line_label').highcharts({
		chart: {
			type: 'line'
		},
		title: {
			text: 'Health Data'
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: 'Heart',
			data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		}, {
			name: 'Blood',
			data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		}]
	});
	
	$('.highcharts.bar_label').highcharts({
		chart: {
			type: 'column'
		},
		title: {
			text: 'Glucose Level'
		},
		subtitle: {
			text: '7 Days History'
		},
		xAxis: {
			categories: [
				'12/5',
				'13/5',
				'14/5',
				'15/5',
				'16/5',
				'17/5',
				'18/5',
			]
		},
		yAxis: {
			min: 0,
			title: {
				text: ''
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Glucose',
			data: [165, 148, 159, 150, 161, 153, 157]

		}
		/*, {
			name: 'New York',
			data: [83.6, 78.8, 98.5]

		}, {
			name: 'London',
			data: [48.9, 38.8, 39.3]

		}, {
			name: 'Berlin',
			data: [42.4, 33.2, 34.5]

		}*/
		]
	});
	
	
});