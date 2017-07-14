<?php
/**
 * Created by PhpStorm.
 * User: rt
 * Date: 17-07-14
 * Time: 13:58
 */

namespace Test;


use Illuminate\Foundation\Testing\TestCase;
use CreatesApplication;
use Stomas\Livescoreapi\Wrapper\Match;

class MatchTest extends TestCase {
    use CreatesApplication;

    /** @test */
    function it_shows_home_team_points(){
        $this->assertEquals(1,$this->make_match()->getHomePoints());
    }

    /** @test */
    function it_shows_away_team_points(){

        $this->assertEquals(0,$this->make_match()->getAwayPoints());
    }

    function make_match(){
        return new Match([
            'id' => '1234',
            'home_name' => 'Delin Izhevsk',
            'away_name' => 'Dynamo Kirov',
            'score' => '1 - 0',
            'ht_score' => '1 - 0',
            'ft_score' => '',
            'et_score' => '',
            'time' => 'HT',
            'status' => 'HALF TIME BREAK',
            'added' => '2017-07-14 10:34:01',
            'last_changed' => '2017-07-14 11:03:01',
            'league_id' => '17',
            'league_name' => 'Cup'
        ]);
    }
}
 