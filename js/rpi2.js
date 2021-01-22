var datalength=0; 
var last_datalength=0;  
var graph_dataTemp = [];
var graph_dataHum = [];
var chartTemp,chartHum;

function plot_data()
{
	var tgl = document.getElementById('tgl').value;
	$.ajax({                                      
		url: 'data.php', 
		type: "GET",				
		data: "&dlen="+datalength+"&table=weatherdata&tgl="+tgl,	
		dataType: 'json',                   
		success: function(dataInDB)    
		{
			onsuccess(dataInDB);
			cache: false;
		} 
	});
	function onsuccess(dataInDB)
	{
		if (dataInDB !=0 && dataInDB !=1) //data kosong
		{
			var dattemp = dataInDB[0];
			var dathum = dataInDB[1];
			dattemp = dattemp.sort();
			dathum = dathum.sort();
			
			for (var z in dattemp){
				graph_dataTemp.push(dattemp[z]);
				//console.log(dattemp[z]);
				}
			for (var m in dathum){
				graph_dataHum.push(dathum[m]);
				//console.log(dathum[m]);
				}
			last_datalength = datalength;
			datalength = graph_dataTemp.length;
			//isi data ke html
			document.getElementById('Tempvalue').innerHTML=graph_dataTemp[datalength-1][1];
			document.getElementById('Humvalue').innerHTML=graph_dataHum[datalength-1][1];
			document.getElementById('updateTemp').innerHTML = "Update: "+dataInDB[2][0];
			document.getElementById('updateHum').innerHTML = "Update: "+dataInDB[2][0];
			
			tempChart(graph_dataTemp);
			humChart(graph_dataHum);
			
		}
	}
	setTimeout(plot_data,1000);
}	
function getDate()
{
	$('#datetimepicker1').datetimepicker({
	pickTime: false,
	defaultDate:new Date(),
	});
}

function tempChart(datatemp)
{
	$('#tempchart').highcharts({
		title: {
            text: '',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            type :'datetime',	
        },
        yAxis: {
            title: {
                text: 'Temperature (C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Temp',
			data: datatemp//[]
        }]
	});
}

function humChart(datahum)
{
	$('#humchart').highcharts({
		title: {
            text: '',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            type :'datetime',
        },
        yAxis: {
            title: {
                text: 'Humidity (%RH)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%RH'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Hum',
			data: datahum//[]
        }]
	});
}

$("#excel").click(function(){
	var tgl = document.getElementById('tgl').value;
	location.href = 'excel.php?table=weatherdata&tgl='+tgl;
});

$("#L1N").click(function(){
	$.ajax({                                      
		url: 'serial.php', 
		type: "GET",				
		data: "&data=L1N",	                   
		success: function()    
		{
			location.href='index.php';
			//console.log('Lampu 1 ON');
		} 
	});
});
$("#L1F").click(function(){
	$.ajax({                                      
		url: 'serial.php', 
		type: "GET",				
		data: "&data=L1F",	                   
		success: function()    
		{
			location.href='index.php';
			//console.log('Lampu 1 OFF');
		} 
	});
});
$("#L2N").click(function(){
	$.ajax({                                      
		url: 'serial.php', 
		type: "GET",				
		data: "&data=L2N",	                   
		success: function()    
		{
			location.href='index.php';
			//console.log('Lampu 2 ON');
		} 
	});
});
$("#L2F").click(function(){
	$.ajax({                                      
		url: 'serial.php', 
		type: "GET",				
		data: "&data=L2F",	                   
		success: function()    
		{
			location.href='index.php';
			//console.log('Lampu 2 OFF');
		} 
	});
});

$(document).ready(function() {	
	Highcharts.setOptions({
		global:{
			useUTC:false
		}
	});
	getDate();
	plot_data();
});