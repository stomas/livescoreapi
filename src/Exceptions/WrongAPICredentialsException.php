<?php namespace Stomas\Livescoreapi\Exceptions;

use Exception;

/**
 * Class WrongAPICredentialsException
 *
 * @package Stomas\Livescoreapi\Exceptions
 */
class WrongAPICredentialsException extends Exception {

    /**
     * @return string
     */
    function __toString()
    {
        return $this->code . ": " . $this->getMessage();
    }
}