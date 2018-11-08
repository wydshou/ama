

//实时销售概况
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
























(function(){
    var myChart = echarts.init(document.getElementById("index-bar-11"));
    
    option = {
    color: ['#df4b4e'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : ['10-11', '10-12', '10-13', '10-14', '10-15', '10-16', '10-17'],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'直接访问',
            type:'bar',
            barWidth: '60%',
            data:[10, 52, 200, 334, 390, 330, 220]
        }
    ]
};

                    
                    
    
    myChart.setOption(option);
})();



















(function(){
	var myChart = echarts.init(document.getElementById("index-line-1"));
	
	option = {

    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['花费','广告销售额'],
        x: "right"
    },
    
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['10-10','10-11','10-12','10-13','10-14','10-15','10-16']
    },
    yAxis: {
        type: 'value',
        axisLabel: {
            formatter: '{value} $'
        }
    },
    series: [
        {
            name:'花费',
            type:'line',
            data:[19, 101, 150, 113, 100, 135, 100],
          
        },
        {
            name:'广告销售额',
            type:'line',
            data:[100, 150, 200, 520, 360, 220, 500],
        
         
        }
    ]
};


                    
                    
	
	myChart.setOption(option);
})();




(function(){
    var myChart = echarts.init(document.getElementById("index-bar-1"));
    
    option = {
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : ['10-11', '10-12', '10-13', '10-14', '10-15', '10-16', '10-17'],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'直接访问',
            type:'bar',
            barWidth: '60%',
            data:[10, 52, 200, 334, 390, 330, 220]
        }
    ]
};

                    
                    
    
    myChart.setOption(option);
})();





//折线图堆叠
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack"));
    
    option = {
    title: {
        text: ''
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['评论数','好评数','Feedback数','好评Feedback']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['10-11','10-12','10-13','10-14','10-15','10-16','10-17']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'评论数',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'好评数',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'Feedback数',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        },
        {
            name:'好评Feedback',
            type:'line',
            stack: '总量',
            data:[320, 332, 301, 334, 390, 330, 320]
        },
    
    ]
};

myChart.setOption(option);
})();
