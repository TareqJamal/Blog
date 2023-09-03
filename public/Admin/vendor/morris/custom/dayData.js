// Morris Days
var day_data = [
	{"period": "2016-10-01", "licensed": 3213, "Elite": 887},
	{"period": "2016-09-30", "licensed": 3321, "Elite": 776},
	{"period": "2016-09-29", "licensed": 3671, "Elite": 884},
	{"period": "2016-09-20", "licensed": 3176, "Elite": 448},
	{"period": "2016-09-19", "licensed": 3376, "Elite": 565},
	{"period": "2016-09-18", "licensed": 3976, "Elite": 627},
	{"period": "2016-09-17", "licensed": 2239, "Elite": 660},
	{"period": "2016-09-16", "licensed": 3871, "Elite": 676},
	{"period": "2016-09-15", "licensed": 3659, "Elite": 656},
	{"period": "2016-09-10", "licensed": 3380, "Elite": 663}
];
Morris.Line({
	element: 'dayData',
	data: day_data,
	xkey: 'period',
	ykeys: ['licensed', 'Elite'],
	labels: ['Licensed', 'Elite'],
	resize: true,
	hideHover: "auto",
	gridLineColor: "#e4e6f2",
	pointFillColors:['#ffffff'],
	pointStrokeColors: ['#ff5661'],
	lineColors:['#118cf1', '#FF7E39'],
});