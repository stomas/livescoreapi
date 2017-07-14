<?php namespace Stomas\Livescoreapi\Wrapper;


/**
 * Class Match
 *
 * @package Stomas\Livescoreapi\Wrapper
 */
class Match {

    /**
     * @var id
     */
    private $id;
    /**
     * @var home_name
     */
    private $home_name;
    /**
     * @var away_name
     */
    private $away_name;
    /**
     * @var score
     */
    private $score;
    /**
     * @var ht_score
     */
    private $ht_score;
    /**
     * @var ft_score
     */
    private $ft_score;
    /**
     * @var et_score
     */
    private $et_score;
    /**
     * @var time
     */
    private $time;
    /**
     * @var status
     */
    private $status;
    /**
     * @var added
     */
    private $added;
    /**
     * @var last_changed
     */
    private $last_changed;
    /**
     * @var league_id
     */
    private $league_id;
    /**
     * @var league_name
     */
    private $league_name;

    /**
     * @param array $attributes
     */
    function __construct(array $attributes)
    {
        //Getting attributes from array
        foreach($attributes as $key=>$value){
            if(property_exists(Match::class, $key)){
                $this->$key = $value;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * @return mixed
     */
    public function getAwayName()
    {
        return $this->away_name;
    }

    /**
     * @return mixed
     */
    public function getEtScore()
    {
        return $this->et_score;
    }

    /**
     * @return mixed
     */
    public function getFtScore()
    {
        return $this->ft_score;
    }

    /**
     * @return mixed
     */
    public function getHomeName()
    {
        return $this->home_name;
    }

    /**
     * @return mixed
     */
    public function getHtScore()
    {
        return $this->ht_score;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLeagueId()
    {
        return $this->league_id;
    }

    /**
     * @return mixed
     */
    public function getLastChanged()
    {
        return $this->last_changed;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return mixed
     */
    public function getLeagueName()
    {
        return $this->league_name;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return Score::AwayPoints($this->getScore());
    }

    /**
     * @return mixed
     */
    public function getHomePoints(){
        return Score::HomePoints($this->getScore());
    }

    /**
     * @return mixed
     */
    public function getAwayPoints(){
        return Score::AwayPoints($this->getScore());
    }

}