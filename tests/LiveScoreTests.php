<?php namespace Test;

use CreatesApplication;
use Illuminate\Foundation\Testing\TestCase;
use Stomas\Livescoreapi\Wrapper\LiveScoreAPI;


class LiveScoreTests extends TestCase {

    use CreatesApplication;

    /** @test */
    public function it_throws_exception_if_api_credentials_are_wrong(){
        $this->expectException('Stomas\Livescoreapi\Exceptions\WrongAPICredentialsException');

        $wrong_key = "asdfager";
        $wrong_secret = "23fsdfg";

        new LiveScoreAPI($wrong_key, $wrong_secret);
    }

    /** @test */
    public function it_receives_array_of_matches(){
        $api = new LiveScoreAPI();

        $matchesArray = $api->liveMatches();

        $this->assertTrue((count($matchesArray) > 0), true);
    }
}
 