/*----------------------折线图-----------------------*/
//商品流量走势
(function(){
	
	var myChart = echarts.init(document.getElementById("Stack"));
	
	option = {
    title: {
        text: '商品流量走势'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['买家访问数','页面浏览次数','转化率','购买按钮赢得率']
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
        data: ['周一','周二','周三','周四','周五','周六','周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'买家访问数',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'页面浏览次数',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'转化率',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        },
        {
            name:'购买按钮赢得率',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        }

    ]
};

myChart.setOption(option);
})();





//类目排名BSR
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack1"));
    
    option = {
    title: {
        text: '类目排名'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['类目1','类目2','类目3']
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
        data: ['周一','周二','周三','周四','周五','周六','周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'类目1',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'类目2',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'类目3',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();





//关键词排名
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack2"));
    
    option = {
    title: {
        text: '关键词排名'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['关键词1','关键词2','关键词3']
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
        data: ['周一','周二','周三','周四','周五','周六','周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'关键词1',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'关键词2',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'关键词3',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 10, 330, 10]
        }
    ]
};

myChart.setOption(option);
})();





//广告业绩
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack3"));
    
    option = {
    title: {
        text: '广告业绩'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['PPC曝光量','PPC点击','PPC花费','ACoAS']
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
        data: ['周一','周二','周三','周四','周五','周六','周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'PPC曝光量',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'PPC点击',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'PPC花费',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 14, 190, 330, 410]
        },
        {
            name:'ACoAS',
            type:'line',
            stack: '总量',
            data:[150, 232, 21, 154, 10, 30, 410]
        }
    ]
};

myChart.setOption(option);
})();









//星级/评分
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack4"));
    
    option = {
    title: {
        text: '星级/评分'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['星级','评分']
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
        data: ['周一','周二','周三','周四','周五','周六','周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'星级',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'评分',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        }
    ]
};

myChart.setOption(option);
})();








//预估可售天数
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack5"));
    
    option = {
    title: {
        text: '预估可售天数'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['7天可售天数','15天可售天数','30天可售天数']
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
        data: ['周一','周二','周三','周四','周五','周六','周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'7天可售天数',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'15天可售天数',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'30天可售天数',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 14, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();












//销售利润分析
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack6"));
    
    option = {
    title: {
        text: '销售利润分析'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['销量','销售额','退款','毛利']
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
        data: ['10-11','10-12','周三','周四','周五','周六','10-17']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'销量',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'销售额',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'退款',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        },
        {
            name:'毛利',
            type:'line',
            stack: '总量',
            data:[15, 22, 21, 154, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();