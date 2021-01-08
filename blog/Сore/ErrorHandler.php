<?php

namespace Blog;

/**
 * Class ErrorHandler
 * @package Blog
 */
class ErrorHandler
{
    /**
     * ErrorHandler constructor.
     */
    public function __construct()
    {
        if(DEBUG){
            error_reporting(E_ALL);
        }else{
            error_reporting(null);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * @param $error
     */
    public function exceptionHandler($error)
    {
        $this->logErrors($error->getMessage(),
                         $error->getFile(), 
                         $error->getLine());

        $this->displayError("Exception",
                            $error->getMessage(),
                            $error->getFile(), 
                            $error->getLine(),
                            $error->getCode());
    }

    /**
     * @param string $message
     * @param string $file
     * @param string $line
     */
    public function logErrors($message = '', $file = '', $line = '')
    {
        if(!file_exists(ROOT . "/tmp/errors.log")) {
            $fp = fopen("/tmp/errors.log", "w");
        }
        error_log("[". date("Y-m-d H:i:s") ."]" . " Error message: {$message} | File name: {$file} | Line: {$line}\n=======================\n", 3, ROOT . "/tmp/errors.log");
    }

    /**
     * @param $errornum
     * @param $errorstr
     * @param $errorfile
     * @param $errorline
     * @param string $response
     */
    public function displayError($errornum, $errorstr, $errorfile, $errorline, $response = '404')
    {
        http_response_code($response);
        if(!DEBUG){
            require_once WWW . "/errors/404.php";
            exit;
        }else{
            require_once WWW . "/errors/development.php";
        }
    }
}