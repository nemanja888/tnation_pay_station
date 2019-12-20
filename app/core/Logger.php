<?php


namespace App\core;


class Logger
{
    private static $instance = NULL;
    private $logs;

    private function __construct()
    {
        $this->logs = array();
    }
    /**
     * Gets instance of the Logger
     * @return Logger instance
     * @access public
     */
    public static function getInstance()
    {
        if(self::$instance === NULL) {
            self::$instance = new Logger();
        }
        return self::$instance;
    }

    /**
     * Adds a message to the log
     * @param $action
     * @access public
     */
    public function log($action)
    {
        $this->logs[] = [
            'action' => $action,
            'timestamp' => date('Y.m.d H:i')
        ];
    }
    /**
     * Returns array of logs
     * @return array Array of log messages
     * @access public
     */
    public function get_logs() {
        return $this->logs;
    }
}