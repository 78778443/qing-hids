## 简介
实现的主机入侵检测系统（Host-based Intrusion Detection System, HIDS）。它旨在帮助系统管理员监控和检测主机上的各种安全事件，包括文件变更、网络连接、系统日志中的可疑活动以及文件完整性。

## 功能列表
1. **文件监控**
    - 监控指定目录的文件变化（创建、修改、删除）。
    - 支持多个目录的监控，例如 `/etc/`, `/var/www/`, `/usr/bin/`。

2. **网络监控**
    - 监控网络连接和流量，捕获可疑的外联行为。
    - 读取 `/proc/net/tcp` 文件以获取当前的网络连接信息。

3. **日志监控**
    - 实时监控系统日志（如 `/var/log/auth.log` 和 `/var/log/secure`）中的可疑活动。
    - 捕获与登录失败、sudo命令执行和root登录相关的日志条目。

4. **文件完整性**
    - 为关键目录生成文件快照，并检测文件的变化（哈希校验）。
    - 使用 SHA-256 哈希算法确保文件的完整性。

5. **数据存储**
    - 使用 SQLite 存储所有监控数据，并对关键数据进行加密存储。
    - 存储的数据包括事件类型、消息内容和时间戳。

6. **远程通信**
    - 支持将事件上报到远程服务器（支持 HTTP/HTTPS）。
    - 每小时将最近一小时内的事件数据发送到指定的远程服务器。

7. **日志清理**
    - 定期清理超过30天的历史日志，确保日志文件不会无限增长。

## 使用方法
1. **安装依赖**
    - 确保系统已安装 PHP 和 SQLite 扩展。
    - 安装方法：`sudo apt-get install php php-sqlite3`

2. **配置**
    - 编辑 `index.php` 文件，配置以下参数：
        - `$dbFile`: SQLite 数据库文件路径。
        - `$logFile`: 日志文件路径。
        - `$snapshotFile`: 文件快照文件路径。
        - `$serverUrl`: 远程服务器URL。
        - `$watchPaths`: 需要监控的目录路径。
        - `$logPaths`: 需要监控的日志文件路径。
        - `$key`: 数据加密的密钥。

3. **运行**
    - 在命令行中运行 `php index.php` 启动 HIDS Agent。
    - HIDS Agent 将每60秒执行一次监控任务，并将结果记录到数据库和日志文件中。

## 示例
```php
$agent = new HIDSAgent();
$agent->run();
```


## 贡献
欢迎贡献代码和提出改进建议！请遵循以下步骤：
1. Fork 本项目。
2. 创建一个新的分支：`git checkout -b feature/new-feature`
3. 提交您的更改：`git commit -am 'Add some feature'`
4. 推送到您的分支：`git push origin feature/new-feature`
5. 提交 Pull Request

## 许可证
本项目采用 MIT 许可证。
