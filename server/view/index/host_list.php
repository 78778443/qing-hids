<!DOCTYPE html>
<html lang="zh_CN">
<head>
    {include file="common/head" /}
</head>
<body class="bg-gray-50">
<div class="min-h-screen">
    {include file="common/nav" /}
    <main class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6"><h2 class="text-2xl font-bold text-gray-900">资产列表</h2>
            <div class="flex space-x-4">
                <div class="relative"><input type="text" placeholder="搜索主机名称..."
                                             class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom"/><i
                            class="fas fa-search absolute left-3 top-3 text-gray-400"></i></div>
                <button class="!rounded-button bg-custom text-white px-4 py-2">添加主机</button>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            主机名称
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            IP地址
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            操作系统
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Agent状态
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            最后在线时间
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">web-server-01</td>
                        <td class="px-6 py-4 whitespace-nowrap">192.168.1.100</td>
                        <td class="px-6 py-4 whitespace-nowrap">CentOS 7.9</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">在线</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-01-20 10:30:15</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-custom hover:text-custom-dark mr-3">详情</button>
                            <button class="text-red-600 hover:text-red-800">删除</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">db-server-01</td>
                        <td class="px-6 py-4 whitespace-nowrap">192.168.1.101</td>
                        <td class="px-6 py-4 whitespace-nowrap">Ubuntu 20.04</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">在线</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-01-20 10:29:55</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-custom hover:text-custom-dark mr-3">详情</button>
                            <button class="text-red-600 hover:text-red-800">删除</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">app-server-01</td>
                        <td class="px-6 py-4 whitespace-nowrap">192.168.1.102</td>
                        <td class="px-6 py-4 whitespace-nowrap">Windows Server 2019</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">离线</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-01-19 23:45:30</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-custom hover:text-custom-dark mr-3">详情</button>
                            <button class="text-red-600 hover:text-red-800">删除</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">cache-server-01</td>
                        <td class="px-6 py-4 whitespace-nowrap">192.168.1.103</td>
                        <td class="px-6 py-4 whitespace-nowrap">Ubuntu 22.04</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">在线</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-01-20 10:28:45</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-custom hover:text-custom-dark mr-3">详情</button>
                            <button class="text-red-600 hover:text-red-800">删除</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
