<?php namespace Raymondidema\Validator;

use Exception;
use Illuminate\Support\MessageBag;

class FormValidatorException extends Exception {
    /**
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * @param string     $message
     * @param MessageBag $errors
     */
    function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }

} 