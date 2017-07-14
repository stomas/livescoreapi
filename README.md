# LiveScoreAPI
## How to use

Install using composer
``` 
composer require "Stomas/Livescoreapi"
```

Add LivescoreAPIServiceProvider to config/app.php
```
'providers' => [
  Stomas\Livescoreapi\LivescoreAPIServiceProvider::class,
]
```

And use it in your code
```
$api = new Stomas\Livescoreapi\Wrapper\LiveScoreAPI();
$api->liveMatches(); //return array of Match objects
```

