<?php namespace Stomas\Livescoreapi\Wrapper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Stomas\Livescoreapi\Exceptions\WrongAPICredentialsException;


/**
 * Class LiveScoreAPI
 *
 * @package Stomas\Livescoreapi\Wrapper
 */
class LiveScoreAPI
    {

    /**
     * @var GuzzleHTTP client
     */
    private $httpClient;

    /**
     * @var ApiKey
     */
    private $apiKey;

    /**
     * @var ApiSecret
     */
    private $apiSecret;

    /**
     * @param null $key
     * @param null $secret
     *
     * @throws WrongAPICredentialsException
     */
    public function __construct ($key = null, $secret = null)
    {

        //Assign API key and secret
        $this->assignCredentials ($key, $secret);

        //Initialize new GuzzleHTTP instance
        $this->httpClient = new Client();

        //Checking if correct credentials
        $this->isCorrectCredentials ();
    }

    /**
     * Gets all matches that are now in www.livescore-api.com
     *
     * @throws WrapException
     * @return array of Matches are currently playing
     */
    public function liveMatches ()
    {

        try {
            $response = $this->httpClient->request ("GET", "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret);

            $arrayResponse = json_decode ((string) $response->getBody (), true);

            return $this->wrapMatches ($arrayResponse['data']['match']);

        } catch (ClientException $e) {
            $response = json_decode ((string) $e->getResponse ()->getBody (), true);

            throw new WrapException($response['error'], $e->getResponse ()->getStatusCode ());
        }
    }

    /**
     * Wraps matches, adds them to array and return as array of Matches objects.
     *
     * @param $arrayResponse
     *
     * @return array
     */
    private function wrapMatches ($arrayResponse)
    {

        $matches = [];
        foreach ($arrayResponse as $arrayMatch) {
            array_push ($matches, new Match($arrayMatch));
        }

        return $matches;
    }

    /**
     * @param $key
     * @param $secret
     */
    private function assignCredentials ($key, $secret)
    {

        if (!$key || !$secret) {
            $this->apiKey = config ('livescore.api_key');
            $this->apiSecret = config ('livescore.api_secret');
        } else {
            $this->apiKey = $key;
            $this->apiSecret = $secret;
        }
    }

    /**
     * Checks if credentials are good.
     * @throws WrongAPICredentialsException
     */
    private function isCorrectCredentials ()
    {

        try {
            $this->httpClient->request ("GET", "http://livescore-api.com/api-client/users/pair.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret);
        } catch (ClientException $e) {
            $response = json_decode ((string) $e->getResponse ()->getBody (), true);

            throw new WrongAPICredentialsException($response['error'], $e->getResponse ()->getStatusCode ());
        }
    }

    }

