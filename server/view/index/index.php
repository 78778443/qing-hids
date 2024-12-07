<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            rel="stylesheet"
    />
    <link
            href="https://ai-public.mastergo.com/gen_page/tailwind-custom.css"
            rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script
            src="https://ai-public.mastergo.com/gen_page/tailwind-config.min.js"
            data-color="#000000"
            data-border-radius="small"
    ></script>
</head>
<body class="bg-gray-50">
<div class="min-h-screen">
    {include file="common/nav" /}
    <main class="max-w-7xl mx-auto py-6 px-4">
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">主机总数</h3>
                    <i class="fas fa-server text-custom text-xl"></i>
                </div>
                <p class="mt-2 text-3xl font-semibold text-custom">1,286</p>
                <p class="mt-2 text-sm text-gray-500">较上周增长 12.5%</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">安全事件</h3>
                    <i class="fas fa-shield-alt text-yellow-500 text-xl"></i>
                </div>
                <p class="mt-2 text-3xl font-semibold text-yellow-500">89</p>
                <p class="mt-2 text-sm text-gray-500">本周新增 23 起</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">漏洞数量</h3>
                    <i class="fas fa-bug text-red-500 text-xl"></i>
                </div>
                <p class="mt-2 text-3xl font-semibold text-red-500">156</p>
                <p class="mt-2 text-sm text-gray-500">待修复 45 个</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">基线合规率</h3>
                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                </div>
                <p class="mt-2 text-3xl font-semibold text-green-500">92.6%</p>
                <p class="mt-2 text-sm text-gray-500">较上月提升 2.1%</p>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-2 bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900">安全事件趋势</h3>
                    <div class="flex space-x-2">
                        <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600">本周</button>
                        <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600">本月</button>
                        <button class="!rounded-button px-3 py-1 text-sm bg-custom text-white">全年</button>
                    </div>
                </div>
                <div id="securityTrendChart" class="h-80"></div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-6">威胁类型分布</h3>
                <div id="threatTypeChart" class="h-80"></div>
            </div>
        </div>

        <div class="mt-6 bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">最近安全事件</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            时间
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            主机名
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            IP地址
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            事件类型
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            风险等级
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            状态
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-02-28 15:23:45</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">web-server-01</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">192.168.1.100</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">暴力破解</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">高危</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">处理中</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-02-28 14:56:12</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">db-server-02</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">192.168.1.101</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">异常进程</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">中危</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">已处理</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-02-28 14:30:18</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">app-server-03</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">192.168.1.102</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">文件篡改</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">高危</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">已处理</td>
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
