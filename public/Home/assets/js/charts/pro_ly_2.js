/*----------------------折线图-----------------------*/
//折线图堆叠
(function(){
	
	var myChart = echarts.init(document.getElementById("Stack"));
	
	option = {
    title: {
        text: '店铺销售分析'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['销售额','广告','促销','退货数量','退货率']
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
        data: ['11-13','11-14','11-15','11-16','11-17','11-18','11-19']
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
            name:'广告',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        },
        {
            name:'促销',
            type:'line',
            stack: '总量',
            data:[320, 332, 301, 334, 390, 330, 320]
        },
        {
            name:'退货数量',
            type:'line',
            stack: '总量',
            data:[820, 932, 901, 934, 1290, 1330, 1320]
        },

        {
            name:'退货率',
            type:'line',
            stack: '总量',
            data:[860, 932, 91, 934, 1990, 133, 1820]
        }

    ]
};

myChart.setOption(option);
})();





//支出都有哪些？   其他仓储，月租等
(function(){
    
var pie3 = echarts.init(document.getElementById("pie3"));

option = {
    title : {
        text: '支出都有哪些？',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['采购成本','物流成本','广告成本','促销费用','FBA服务费','亚马逊佣金','退款费用','其他费用']
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'采购成本'},
                {value:310, name:'物流成本'},
                {value:234, name:'广告成本'},
                {value:135, name:'促销费用'},
                {value:1548, name:'FBA服务费'},
                 {value:1548, name:'亚马逊佣金'},
                 {value:1548, name:'退款费用'},
                 {value:1548, name:'其他费用'}

            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};

pie3.setOption(option);
})();




