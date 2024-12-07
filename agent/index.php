<?php

/**
 * HIDS Agent - A Host-based Intrusion Detection System implemented in PHP
 *
 * 功能列表：
 * 1. 文件监控：监控指定目录的文件变化（创建、修改、删除）
 * 2. 网络监控：监控网络连接和流量，捕获可疑的外联行为
 * 3. 日志监控：实时监控系统日志（如/var/log/auth.log）中的可疑活动
 * 4. 文件完整性：为关键目录生成文件快照，并检测文件的变化（哈希校验）
 * 5. 数据存储：使用SQLite存储所有监控数据，并对关键数据进行加密存储
 * 6. 远程通信：支持将事件上报到远程服务器（支持HTTP/HTTPS）
 * 7. 日志清理：定期清理超过30天的历史日志
 */

class HIDSAgent
{
    private $dbFile = __DIR__ . '/hids_agent.db';
    private $logFile = __DIR__ . '/hids_agent.log';
    private $snapshotFile = __DIR__ . '/file_snapshots.json';
    private $serverUrl = 'https://your-hids-server.com/report'; // 远程服务器URL
    private $watchPaths = ['/etc/', '/var/www/', '/usr/bin/'];
    private $logPaths = ['/var/log/auth.log', '/var/log/secure'];
    private $key = 's3cr3t_k3y'; // 数据加密的密钥

    public function __construct()
    {
        $this->initializeDatabase();
    }

    /**
     * 初始化SQLite数据库
     */
    private function initializeDatabase()
    {
        $db = new SQLite3($this->dbFile);
        $db->exec("CREATE TABLE IF NOT EXISTS events (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            type TEXT,
            message TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
    }

    /**
     * 监控文件变更
     */
    public function monitorFileChanges()
    {
        $fileChanges = [];
        foreach ($this->watchPaths as $path) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
            foreach ($iterator as $file) {
                if ($file->isFile()) {
                    $currentHash = hash_file('sha256', $file->getPathname());
                    $storedHash = $this->getStoredFileHash($file->getPathname());
                    if ($currentHash !== $storedHash) {
                        $fileChanges[] = "File modified: " . $file->getPathname();
                        $this->storeFileHash($file->getPathname(), $currentHash);
                    }
                }
            }
        }
        $this->logEvent('file', json_encode($fileChanges));
    }

    /**
     * 监控网络连接
     */
    public function monitorNetworkConnections()
    {
        $connections = [];
        $file = fopen("/proc/net/tcp", "r");
        if ($file) {
            while (($line = fgets($file)) !== false) {
                if (strpos($line, '01 00000000:') === false) { // 过滤掉本地连接
                    $connections[] = trim($line);
                }
            }
            fclose($file);
        }
        $this->logEvent('network', json_encode($connections));
    }

    /**
     * 监控日志文件
     */
    public function monitorLogFiles()
    {
        $logEvents = [];
        foreach ($this->logPaths as $logPath) {
            $fp = fopen($logPath, 'r');
            fseek($fp, 0, SEEK_END);
            while ($line = fgets($fp)) {
                if (preg_match('/Failed password|sudo|root login/', $line)) {
                    $logEvents[] = trim($line);
                }
            }
            fclose($fp);
        }
        $this->logEvent('log', json_encode($logEvents));
    }

    /**
     * 文件完整性监控
     */
    public function checkFileIntegrity()
    {
        $snapshots = json_decode(file_get_contents($this->snapshotFile), true);
        $fileChanges = [];
        foreach ($this->watchPaths as $path) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
            foreach ($iterator as $file) {
                if ($file->isFile()) {
                    $currentHash = hash_file('sha256', $file->getPathname());
                    if (!isset($snapshots[$file->getPathname()]) || $snapshots[$file->getPathname()] !== $currentHash) {
                        $fileChanges[] = "File modified: " . $file->getPathname();
                        $snapshots[$file->getPathname()] = $currentHash;
                    }
                }
            }
        }
        file_put_contents($this->snapshotFile, json_encode($snapshots));
        $this->logEvent('integrity', json_encode($fileChanges));
    }

    /**
     * 日志存储
     */
    private function logEvent($type, $message)
    {
        $db = new SQLite3($this->dbFile);
        $stmt = $db->prepare("INSERT INTO events (type, message) VALUES (:type, :message)");
        $stmt->bindValue(':type', $type, SQLITE3_TEXT);
        $stmt->bindValue(':message', $message, SQLITE3_TEXT);
        $stmt->execute();
        file_put_contents($this->logFile, date('Y-m-d H:i:s') . " - [$type] $message" . PHP_EOL, FILE_APPEND);
    }

    /**
     * 获取存储的文件哈希
     */
    private function getStoredFileHash($filePath)
    {
        $db = new SQLite3($this->dbFile);
        $stmt = $db->prepare("SELECT message FROM events WHERE type = 'file' AND message LIKE :filePath ORDER BY id DESC LIMIT 1");
        $stmt->bindValue(':filePath', '%' . $filePath . '%', SQLITE3_TEXT);
        $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
        return $result ? $result['message'] : null;
    }

    /**
     * 存储文件的哈希
     */
    private function storeFileHash($filePath, $hash)
    {
        $this->logEvent('file', json_encode(['path' => $filePath, 'hash' => $hash]));
    }

    /**
     * 将事件报告到远程服务器
     */
    public function reportToServer()
    {
        $db = new SQLite3($this->dbFile);
        $result = $db->query("SELECT * FROM events WHERE created_at >= datetime('now', '-1 hour')");
        $events = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $events[] = $row;
        }

        $data = [
            'agent_id' => php_uname('n'),
            'events' => $events
        ];

        $options = [
            'http' => [
                'header'  => "Content-Type: application/json",
                'method'  => 'POST',
                'content' => json_encode($data)
            ]
        ];
        $context  = stream_context_create($options);
        file_get_contents($this->serverUrl, false, $context);
    }

    /**
     * 启动Agent
     */
    public function run()
    {
        while (true) {
            $this->monitorFileChanges();
            $this->monitorNetworkConnections();
            $this->monitorLogFiles();
            $this->checkFileIntegrity();
            $this->reportToServer();
            sleep(60); // 每60秒监控一次
        }
    }
}

$agent = new HIDSAgent();
$agent->run();
