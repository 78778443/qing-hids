<!DOCTYPE html>
<html lang="zh_CN">
<head>
    {include file="common/head" /}
</head>
<body class="bg-gray-50">
<div class="min-h-screen">
    {include file="common/nav" /}
    <main class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6"><h2 class="text-2xl font-bold text-gray-900">漏洞管理</h2>
            <div class="flex space-x-4">
                <div class="relative"><input type="text" placeholder="搜索漏洞..."
                                             class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom"/><i
                            class="fas fa-search absolute left-3 top-3 text-gray-400"></i></div>
                <button class="!rounded-button bg-custom text-white px-4 py-2">查看规则</button>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <div class="flex space-x-4">
                    <button class="text-gray-500 hover:text-custom px-3 py-1 text-sm font-medium border-b-2 border-custom text-custom">
                        全部漏洞
                    </button>
                    <button class="text-gray-500 hover:text-custom px-3 py-1 text-sm font-medium">高危</button>
                    <button class="text-gray-500 hover:text-custom px-3 py-1 text-sm font-medium">中危</button>
                    <button class="text-gray-500 hover:text-custom px-3 py-1 text-sm font-medium">低危</button>
                </div>
                <div class="flex space-x-2">
                    <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600"><i
                                class="fas fa-filter mr-1"></i>筛选
                    </button>
                    <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600"><i
                                class="fas fa-download mr-1"></i>导出
                    </button>
                </div>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        发现时间
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        漏洞名称
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        影响主机
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        漏洞类型
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        风险等级
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        修复状态
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-02-20 10:30:15</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CVE-2024-1234</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5台主机</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">远程代码执行</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">高危</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">待处理</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a href="#"
                                                                                     class="text-custom hover:text-custom-dark">处理</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-02-19 15:45:20</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CVE-2024-5678</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3台主机</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">权限提升</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">中危</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">已处理</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a href="#"
                                                                                     class="text-custom hover:text-custom-dark">查看</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-02-18 09:15:30</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CVE-2024-9012</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2台主机</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">信息泄露</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">低危</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">已忽略</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a href="#"
                                                                                     class="text-custom hover:text-custom-dark">查看</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-500">显示 1 至 3 条，共 12 条漏洞</div>
                    <div class="flex space-x-2">
                        <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600">上一页</button>
                        <button class="!rounded-button px-3 py-1 text-sm bg-custom text-white">1</button>
                        <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600">2</button>
                        <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600">3</button>
                        <button class="!rounded-button px-3 py-1 text-sm bg-gray-100 text-gray-600">下一页</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm mt-6 p-6">
            <div class="border-b border-gray-200 pb-4 mb-4"><h3 class="text-xl font-bold text-gray-900">漏洞详情</h3>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex items-center"><span class="w-24 text-gray-500">事件ID：</span><span
                                class="text-gray-900">CVE-2024-1234</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">漏洞名称：</span><span
                                class="text-gray-900">Apache Log4j 远程代码执行漏洞</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">影响范围：</span><span
                                class="text-gray-900">5台主机</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">发现时间：</span><span
                                class="text-gray-900">2024-02-20 14:30:25</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">威胁等级：</span><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">高危</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center"><span class="w-24 text-gray-500">漏洞类型：</span><span
                                class="text-gray-900">远程代码执行</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">CVSS评分：</span><span
                                class="text-gray-900">9.8</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">修复难度：</span><span
                                class="text-gray-900">中等</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">修复状态：</span><span
                                class="text-gray-900">待修复</span></div>
                    <div class="flex items-center"><span class="w-24 text-gray-500">修复建议：</span><span
                                class="text-gray-900">建议立即修复</span></div>
                </div>
            </div>
            <div class="mt-6"><h4 class="text-lg font-medium text-gray-900 mb-4">详细信息</h4>
                <div class="bg-gray-50 p-4 rounded-lg"><pre class="text-sm text-gray-600">漏洞描述：
Apache Log4j2 存在远程代码执行漏洞，攻击者可以利用该漏洞执行任意代码。

影响版本：
- Apache Log4j2 2.0-beta9 through 2.15.0

修复建议：
1. 升级 Log4j2 版本到 2.15.0 或更高版本
2. 设置系统属性 log4j2.formatMsgNoLookups=true
3. 移除 JndiLookup 类
4. 检查并更新依赖组件</pre>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-4">
                <button class="!rounded-button px-4 py-2 bg-gray-100 text-gray-600">暂不修复</button>
                <button class="!rounded-button px-4 py-2 bg-custom text-white">立即修复</button>
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
