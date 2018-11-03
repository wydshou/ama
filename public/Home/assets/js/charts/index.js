

//今日财务
(function(){
	var myChart = echarts.init(document.getElementById("index-line-11"));
	
	option = {

    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['昨日','今日'],
        x: "right"
    },
    
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['00:00','02:00','04:00','06:00','08:00','10:00','12:00','14:00','16:00','18:00','20:00','22:00']
    },
    yAxis: {
        type: 'value',
        axisLabel: {
            formatter: '{value} $'
        }
    },
    series: [
        {
            name:'昨日',
            type:'line',
            data:[19, 110, 1050, 13, 100, 15, 100, 100, 15, 100, 105, 190],
          
        },
        {
            name:'今日',
            type:'line',
            data:[100, 150, 20, 520, 30, 2280, 500, 10, 15, 100, 15, 180],
        
         
        }
    ]
};


                    
                    
	
	myChart.setOption(option);
})();


















