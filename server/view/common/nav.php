<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="font-[&#39;Pacifico&#39;] text-2xl text-custom">Qing-hids</div>
                <div class="hidden md:flex ml-10 space-x-8">
                    <a href="{:URL('index')}"
                       class="text-gray-500 hover:text-custom px-3 py-2 text-sm font-medium">概览</a>
                    <a href="{:URL('alert_list')}"
                       class="text-custom px-3 py-2 text-sm font-medium border-b-2 border-custom">威胁检测</a>
                    <a href="{:URL('bug_list')}"
                       class="text-gray-500 hover:text-custom px-3 py-2 text-sm font-medium">漏洞管理</a>
                    <a href="{:URL('baseline_list')}"
                       class="text-gray-500 hover:text-custom px-3 py-2 text-sm font-medium">基线检查</a>
                    <a href="{:URL('system_setting')}"
                       class="text-gray-500 hover:text-custom px-3 py-2 text-sm font-medium">系统配置</a>
                </div>
            </div>
            <div class="flex items-center">
                <!--                <button class="!rounded-button bg-custom text-white px-4 py-2 text-sm">新建任务</button>-->
                <div class="ml-4 relative">
                    <img class="h-8 w-8 rounded-full"
                         src="/static/images/logo.jpg"
                         alt="用户头像"/>
                </div>
            </div>
        </div>
    </div>
</nav>