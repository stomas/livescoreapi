<?php

namespace Stomas\Livescoreapi\Wrapper;


/**
 * Class Score
 *
 * @package Stomas\Livescoreapi\Wrapper
 */
class Score {

    /**
     * @param $score
     *
     * @return mixed
     */
    static function HomePoints($score){
        return (new Score)->getMatchResultArray($score)[1];
    }

    /**
     * @param $score
     *
     * @return mixed
     */
    static function AwayPoints($score){
        return (new Score)->getMatchResultArray($score)[2];
    }

    /**
     * @param $score
     *
     * @return mixed
     */
    private function getMatchResultArray($score){
        preg_match("/(\d+)-(\d+)/", str_replace(" ", "", $score), $output_array);
        return $output_array;
    }
} 