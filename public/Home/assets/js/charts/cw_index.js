


//毛利及成本占比


(function(){
	var myChart = echarts.init(document.getElementById("index-pie1"));
	
	option = {
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient : 'vertical',
        x : 'left',
        data:['销售额','毛率','返点占比','退货率','推广占比' ,'头程占比' ,'采购占比' ,'AMZ占比']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {
                show: true, 
                type: ['pie', 'funnel'],
                option: {
                    funnel: {
                        x: '25%',
                        width: '50%',
                        funnelAlign: 'center',
                        max: 1548
                    }
                }
            },
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    series : [
        {
            name:'销售额',
            type:'pie',
            radius : ['10%', '82%'],
            itemStyle : {
                normal : {
                    label : {
                        show : false
                    },
                    labelLine : {
                        show : false
                    }
                },
                emphasis : {
                    label : {
                        show : true,
                        position : 'center',
                        textStyle : {
                            fontSize : '20',
                            fontWeight : 'bold'
                        }
                    }
                }
            },
            data:[
                {value:335, name:'毛率'},
                {value:310, name:'返点占比'},
                {value:234, name:'退货率'},
                {value:135, name:'推广占比'},
                {value:1548, name:'头程占比'},
                {value:158, name:'采购占比'},
                {value:148, name:'AMZ占比'}


            ]
        }
    ]
};
                    
                    
	
	myChart.setOption(option);
})();





//库存情况
(function(){
	var myChart = echarts.init(document.getElementById("index-line-1"));
	
	option = {

    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['FBA库存','退货'],
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
            name:'FBA库存',
            type:'line',
            data:[19, 101, 150, 113, 100, 135, 100],
          
        },
        {
            name:'退货',
            type:'line',
            data:[100, 150, 200, 520, 360, 220, 500],
        
         
        }
    ]
};


                    
                    
	
	myChart.setOption(option);
})();


//销售额表现

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
            data : ['10-11', '10-12', '10-13', '10-14', '10-15', '10-16', '10-17', '10-15', '10-16', '10-17', '10-16', '10-17', '10-16', '10-17', '10-16', '10-17', '10-16', '10-17', '10-17', '10-16', '10-17', '10-17', '10-16', '10-17'],
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
            name:'销售额',
            type:'bar',
            barWidth: '60%',
            data:[10, 52, 200, 334, 390, 330, 220, 334, 390, 334, 390, 334, 390, 334, 390, 334, 390, 334, 390, 334, 390, 334, 390]
        }
    ]
};

                    
                    
    
    myChart.setOption(option);
})();





//最近半年报表
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
        data:['销售额','成本','毛利润','毛率']
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
        data: ['6月','7月','8月','9月','10月','11月','12月']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'销售额',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'成本',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'毛利润',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        },
        {
            name:'毛率',
            type:'line',
            stack: '总量',
            data:[320, 332, 301, 334, 390, 330, 320]
        },
    
    ]
};

myChart.setOption(option);
})();
