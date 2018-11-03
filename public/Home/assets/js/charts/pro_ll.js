/*----------------------折线图-----------------------*/
//买家访问数
(function(){
	
	var myChart = echarts.init(document.getElementById("Stack"));
	
	option = {
    title: {
        text: '买家访问数'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['本商品','同行平均','同行优秀']
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
            name:'本商品',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'同行平均',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'同行优秀',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();





//页面浏览次数
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack1"));
    
    option = {
    title: {
        text: '页面浏览次数'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['本商品','同行平均','同行优秀']
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
            name:'本商品',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'同行平均',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'同行优秀',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();





//转化率
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack2"));
    
    option = {
    title: {
        text: '转化率'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['本商品','同行平均','同行优秀']
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
            name:'本商品',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'同行平均',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'同行优秀',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();





//购买按钮赢得率
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack3"));
    
    option = {
    title: {
        text: '购买按钮赢得率'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['本商品','同行平均','同行优秀']
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
            name:'本商品',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'同行平均',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'同行优秀',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();



//销量
(function(){
    
    var myChart = echarts.init(document.getElementById("Stack4"));
    
    option = {
    title: {
        text: '销量'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['本商品','同行平均','同行优秀']
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
            name:'本商品',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
        {
            name:'同行平均',
            type:'line',
            stack: '总量',
            data:[220, 182, 191, 234, 290, 330, 310]
        },
        {
            name:'同行优秀',
            type:'line',
            stack: '总量',
            data:[150, 232, 201, 154, 190, 330, 410]
        }
    ]
};

myChart.setOption(option);
})();