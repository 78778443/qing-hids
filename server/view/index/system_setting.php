<!DOCTYPE html>
<html lang="zh_CN">
<head>
    {include file="common/head" /}
</head>
<body class="bg-gray-50">
<div class="min-h-screen">
    {include file="common/nav" /}
    <main class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6"><h2 class="text-2xl font-bold text-gray-900">系统配置</h2>
            <div class="flex space-x-4">
                <div class="relative"><input type="text" placeholder="搜索配置项..."
                                             class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom"/><i
                            class="fas fa-search absolute left-3 top-3 text-gray-400"></i></div>
                <button class="!rounded-button bg-custom text-white px-4 py-2">查看配置</button>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6 grid grid-cols-2 gap-6">
                <div class="space-y-6">
                    <div class="bg-white rounded-lg p-4 border border-gray-200"><h3 class="text-lg font-medium mb-4">
                            Agent配置</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between"><span>自动升级</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                            <div class="flex items-center justify-between"><span>开机自启动</span><label class="switch"><input
                                            type="checkbox" checked=""/><span class="slider round"></span></label></div>
                            <div class="flex items-center justify-between"><span>实时防护</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-gray-200"><h3 class="text-lg font-medium mb-4">
                            数据采集配置</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between"><span>进程监控</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                            <div class="flex items-center justify-between"><span>文件监控</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                            <div class="flex items-center justify-between"><span>网络连接监控</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                            <div class="flex items-center justify-between"><span>系统日志采集</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-white rounded-lg p-4 border border-gray-200"><h3 class="text-lg font-medium mb-4">
                            告警配置</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between"><span>邮件通知</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                            <div class="flex items-center justify-between"><span>短信通知</span><label
                                        class="switch"><input type="checkbox"/><span
                                            class="slider round"></span></label></div>
                            <div class="flex items-center justify-between"><span>企业微信通知</span><label
                                        class="switch"><input type="checkbox" checked=""/><span
                                            class="slider round"></span></label></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-gray-200"><h3 class="text-lg font-medium mb-4">
                            审计日志配置</h3>
                        <div class="space-y-4">
                            <div class="form-group"><label
                                        class="block text-sm font-medium text-gray-700 mb-2">日志保留天数</label><select
                                        class="form-select block w-full mt-1">
                                    <option>30天</option>
                                    <option>60天</option>
                                    <option>90天</option>
                                    <option>180天</option>
                                </select></div>
                            <div class="form-group"><label
                                        class="block text-sm font-medium text-gray-700 mb-2">日志存储路径</label><input
                                        type="text" class="form-input block w-full" value="/var/log/hids/"/></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    const securityTrendChart = echarts.init(document.getElementById('securityTrendChart'));
    const threatTypeChart = echarts.init(document.getElementById('threatTypeChart'));

    const securityTrendOption = {
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                name: '安全事件',
                type: 'line',
                smooth: true,
                data: [120, 132, 101, 134, 90, 230, 210, 182, 191, 234, 290, 330],
                itemStyle: {
                    color: '#000000'
                },
                areaStyle: {
                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                        {
                            offset: 0,
                            color: 'rgba(0, 0, 0, 0.2)'
                        },
                        {
                            offset: 1,
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    ])
                }
            }
        ]
    };

    const threatTypeOption = {
        tooltip: {
            trigger: 'item'
        },
        legend: {
            orient: 'horizontal',
            bottom: '0%'
        },
        series: [
            {
                name: '威胁类型',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: 40,
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [
                    {value: 35, name: '暴力破解'},
                    {value: 25, name: '异常进程'},
                    {value: 20, name: '文件篡改'},
                    {value: 15, name: '系统漏洞'},
                    {value: 5, name: '其他'}
                ]
            }
        ]
    };

    securityTrendChart.setOption(securityTrendOption);
    threatTypeChart.setOption(threatTypeOption);

    window.addEventListener('resize', function () {
        securityTrendChart.resize();
        threatTypeChart.resize();
    });
</script>


</body>
</html>
