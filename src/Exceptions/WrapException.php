<?php namespace Stomas\Livescoreapi\Exceptions;

/**
 * Class WrapException
 *
 * @package Stomas\Livescoreapi\Exceptions
 */
class WrapException extends Exception {

    /**
     * @return string
     */
    function __toString()
    {
        return $this->code . ": " . $this->getMessage();
    }
}