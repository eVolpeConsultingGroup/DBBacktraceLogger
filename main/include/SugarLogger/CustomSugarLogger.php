<?php

class SugarBacktraceLogger extends SugarLogger implements LoggerTemplate
{
    /**
     * Constructor
     *
     * Reads the config file for logger settings
     */
    public function __construct()
    {
        parent::__construct();
        LoggerManager::setLogger('default', 'SugarBacktraceLogger');
        // LoggerManager::setLogger('fatal', 'SugarBacktraceLogger');
        // LoggerManager::setLogger('error', 'SugarBacktraceLogger');
        // LoggerManager::setLogger('default','SugarLogger');
    }

    /**
     * see LoggerTemplate::log()
     */
    public function log($level, $message)
    {
        if (!$this->initialized) {
            return;
        }
        //lets get the current user id or default to -none- if it is not set yet
        $userID = (!empty($GLOBALS['current_user']->id)) ? $GLOBALS['current_user']->id : '-none-';

        //if we haven't opened a file pointer yet let's do that
        if (!$this->fp) {
            $this->fp = fopen($this->full_log_file, 'a');
        }

        // change to a string if there is just one entry
        if (is_array($message) && count($message) == 1) {
            $message = array_shift($message);
        }

        // change to a human-readable array output if it's any other array
        if (is_array($message)) {
            $message = print_r($message, true);
        }

        //write out to the file including the time in the dateFormat the process id , the user id , and the log level as well as the message

        //TODO DO DOKOŃCZENIA JAKAŚ KONFIGURACJA CZY COŚ W ADMINISTRACJI
        if (true) {
            $debug = print_r(debug_backtrace(2), 1);
            $debug_md5 = md5($debug);
            $debug_escape = $GLOBALS['db']->quote($debug);
            $message_escape = $GLOBALS['db']->quote($message);
            $GLOBALS['db']->query("INSERT INTO ev_backtrace_log(id,message,debug) VALUES ('{$debug_md5}','{$message_escape}','{$debug_escape}') ON DUPLICATE KEY UPDATE counter=counter+1; ");

            $this->write(strftime($this->dateFormat) . ' [' . getmypid() . '][' . $userID . '][' . strtoupper($level) . '] ' . $message . ":" . $debug_md5 . "\n");
        } else {
            $this->write(strftime($this->dateFormat) . ' [' . getmypid() . '][' . $userID . '][' . strtoupper($level) . '] ' . $message . "\n");
        }
    }
}
