<!DOCTYPE html>
<html lang="zh_CN">
<head>
    {include file="common/head" /}
</head>
<body class="bg-gray-50">
<div class="min-h-screen">
    {include file="common/nav" /}
    <main class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6"><h2 class="text-2xl font-bold text-gray-900">主机详情</h2>
            <div class="flex space-x-4">
                <button class="!rounded-button bg-gray-500 text-white px-4 py-2 mr-4">返回列表</button>
                <button class="!rounded-button bg-custom text-white px-4 py-2">编辑主机</button>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm">
            <div class="grid grid-cols-2 gap-6 p-6">
                <div class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg"><h3 class="text-lg font-medium mb-4">基本信息</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div><label class="text-sm text-gray-500">主机名称</label>
                                <div class="font-medium">web-server-01</div>
                            </div>
                            <div><label class="text-sm text-gray-500">IP地址</label>
                                <div class="font-medium">192.168.1.100</div>
                            </div>
                            <div><label class="text-sm text-gray-500">操作系统</label>
                                <div class="font-medium">CentOS 7.9</div>
                            </div>
                            <div><label class="text-sm text-gray-500">Agent状态</label>
                                <div class="font-medium"><span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">在线</span>
                                </div>
                            </div>
                            <div><label class="text-sm text-gray-500">CPU使用率</label>
                                <div class="font-medium">45%</div>
                            </div>
                            <div><label class="text-sm text-gray-500">内存使用率</label>
                                <div class="font-medium">60%</div>
                            </div>
                            <div><label class="text-sm text-gray-500">磁盘使用率</label>
                                <div class="font-medium">75%</div>
                            </div>
                            <div><label class="text-sm text-gray-500">最后在线时间</label>
                                <div class="font-medium">2024-01-20 10:30:15</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg"><h3 class="text-lg font-medium mb-4">安全状态</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="bg-green-50 p-3 rounded-lg">
                                <div class="text-sm text-gray-500">已处理告警</div>
                                <div class="text-2xl font-bold text-green-600">12</div>
                            </div>
                            <div class="bg-yellow-50 p-3 rounded-lg">
                                <div class="text-sm text-gray-500">待处理告警</div>
                                <div class="text-2xl font-bold text-yellow-600">3</div>
                            </div>
                            <div class="bg-red-50 p-3 rounded-lg">
                                <div class="text-sm text-gray-500">高危漏洞</div>
                                <div class="text-2xl font-bold text-red-600">2</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg"><h3 class="text-lg font-medium mb-4">进程监控</h3>
                        <table class="min-w-full">
                            <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase">
                                <th class="py-2">进程名称</th>
                                <th class="py-2">PID</th>
                                <th class="py-2">CPU</th>
                                <th class="py-2">内存</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-2">nginx</td>
                                <td>1234</td>
                                <td>2.5%</td>
                                <td>128MB</td>
                            </tr>
                            <tr>
                                <td class="py-2">mysql</td>
                                <td>5678</td>
                                <td>4.2%</td>
                                <td>512MB</td>
                            </tr>
                            <tr>
                                <td class="py-2">php-fpm</td>
                                <td>9012</td>
                                <td>1.8%</td>
                                <td>256MB</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg"><h3 class="text-lg font-medium mb-4">端口监听</h3>
                        <table class="min-w-full">
                            <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase">
                                <th class="py-2">端口</th>
                                <th class="py-2">协议</th>
                                <th class="py-2">服务</th>
                                <th class="py-2">状态</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-2">80</td>
                                <td>TCP</td>
                                <td>HTTP</td>
                                <td><span class="text-green-600">LISTEN</span></td>
                            </tr>
                            <tr>
                                <td class="py-2">443</td>
                                <td>TCP</td>
                                <td>HTTPS</td>
                                <td><span class="text-green-600">LISTEN</span></td>
                            </tr>
                            <tr>
                                <td class="py-2">3306</td>
                                <td>TCP</td>
                                <td>MySQL</td>
                                <td><span class="text-green-600">LISTEN</span></td>
                            </tr>
                            </tbody>
                        </table>
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
