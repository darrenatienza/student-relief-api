<?php
/**
 * PHP-CRUD-API v2              License: MIT
 * Maurits van der Schee: maurits@vdschee.nl
 * https://github.com/mevdschee/php-crud-api
 *
 * Dependencies:
 * - vendor/psr/*: PHP-FIG
 *   https://github.com/php-fig
 * - vendor/nyholm/*: Tobias Nyholm
 *   https://github.com/Nyholm
 **/


// file: src/index.php
namespace Tqdev\PhpCrudApi {
    include 'api.include.php';
    include 'config.php';
    
    use Tqdev\PhpCrudApi\Api;
    use Tqdev\PhpCrudApi\Config;
    use Tqdev\PhpCrudApi\RequestFactory;
    use Tqdev\PhpCrudApi\ResponseUtils;

    $config = new Config($setting);
    $request = RequestFactory::fromGlobals();
    $api = new Api($config);
    $response = $api->handle($request);
    ResponseUtils::output($response);
}
