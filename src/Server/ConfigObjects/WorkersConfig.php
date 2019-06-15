<?php


namespace AnthraxisBR\FastWork\Server\ConfigObjects;


use AnthraxisBR\FastWork\Server\ServerHandler;

class WorkersConfig
{

    public $dispatch_mode = 3;
    public $worker_num = 1;
    public $task_worker_num = 4;
    public $task_ipc_mode = 3;
    public $message_queue_key; //0x70001001
    public $task_tmpdir; ///data/task/
    public $open_cpu_affinity;
    public $open_eof_check;
    public $open_eof_split;

    public function __construct()
    {
        $workers = ServerHandler::getExtraConfig();

        $workers = $workers['worker'];

        $this->setDispatchMode(isset($workers['dispatch_mode']) ? $workers['dispatch_mode'] : null);
        $this->setWorkerNum(isset($workers['worker']['worker_num']) ? $workers['worker_num'] : 1);
        $this->setTaskWorkerNum(isset($workers['worker']['task_worker_num']) ? $workers['task_worker_num'] : 4);
        $this->setTaskIpcMode(isset($workers['worker']['task_ipc_mode']) ? $workers['task_ipc_mode'] : 3);
        $this->setMessageQueueKey(isset($workers['worker']['message_queue_key']) ? $workers['message_queue_key'] : null);
        $this->setTaskTmpdir(isset($workers['worker']['task_tmpdir']) ? $workers['task_tmpdir'] : null);
        $this->setOpenCpuAffinity(isset($workers['worker']['open_cpu_affinity']) ? $workers['open_cpu_affinity'] : null);
        $this->setOpenEofCheck(isset($workers['worker']['open_eof_check;']) ? $workers['open_eof_check;'] : null);
        $this->setOpenEofSplit(isset($workers['worker']['open_eof_split']) ? $workers['open_eof_split'] : null);

    }

    /**
     * @return int
     */
    public function getDispatchMode(): int
    {
        return $this->dispatch_mode;
    }

    /**
     * @param int $dispatch_mode
     */
    public function setDispatchMode($dispatch_mode): void
    {
        $this->dispatch_mode = $dispatch_mode;
    }

    /**
     * @return int
     */
    public function getWorkerNum(): int
    {
        return $this->worker_num;
    }

    /**
     * @param int $worker_num
     */
    public function setWorkerNum($worker_num): void
    {
        $this->worker_num = $worker_num;
    }

    /**
     * @return int
     */
    public function getTaskWorkerNum(): int
    {
        return $this->task_worker_num;
    }

    /**
     * @param int $task_worker_num
     */
    public function setTaskWorkerNum($task_worker_num): void
    {
        $this->task_worker_num = $task_worker_num;
    }

    /**
     * @return int
     */
    public function getTaskIpcMode(): int
    {
        return $this->task_ipc_mode;
    }

    /**
     * @param int $task_ipc_mode
     */
    public function setTaskIpcMode($task_ipc_mode): void
    {
        $this->task_ipc_mode = $task_ipc_mode;
    }

    /**
     * @return mixed
     */
    public function getMessageQueueKey()
    {
        return $this->message_queue_key;
    }

    /**
     * @param mixed $message_queue_key
     */
    public function setMessageQueueKey($message_queue_key): void
    {
        $this->message_queue_key = $message_queue_key;
    }

    /**
     * @return mixed
     */
    public function getTaskTmpdir()
    {
        return $this->task_tmpdir;
    }

    /**
     * @param mixed $task_tmpdir
     */
    public function setTaskTmpdir($task_tmpdir): void
    {
        $this->task_tmpdir = $task_tmpdir;
    }

    /**
     * @return mixed
     */
    public function getOpenCpuAffinity()
    {
        return $this->open_cpu_affinity;
    }

    /**
     * @param mixed $open_cpu_affinity
     */
    public function setOpenCpuAffinity($open_cpu_affinity): void
    {
        $this->open_cpu_affinity = $open_cpu_affinity;
    }

    /**
     * @return mixed
     */
    public function getOpenEofCheck()
    {
        return $this->open_eof_check;
    }

    /**
     * @param mixed $open_eof_check
     */
    public function setOpenEofCheck($open_eof_check): void
    {
        $this->open_eof_check = $open_eof_check;
    }

    /**
     * @return mixed
     */
    public function getOpenEofSplit()
    {
        return $this->open_eof_split;
    }

    /**
     * @param mixed $open_eof_split
     */
    public function setOpenEofSplit($open_eof_split): void
    {
        $this->open_eof_split = $open_eof_split;
    }



}