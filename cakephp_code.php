<?php

Configure::write('debug', 0);

/**
 * A random string used in security hashing methods.
 */
Configure::write('Security.salt', 'DYhG93b0qyJfIxfs2guVoUusfvdgiR2G0Faryani');

/**
 * A random numeric string (digits only) used to encrypt/decrypt strings.
 */
Configure::write('Security.cipherSeed', '76859309657453542462349687865');

Configure::load('cfg_vars');

class DATABASE_CONFIG
{
    function __construct ()
    {       
	    $url = parse_url(getenv('DATABASE_URL'));

	    $this->default = array(
	    		'datasource' => 'Database/Postgres',
	    		'persistent' => false,
	    		'host' => $url['host'],
	    		'login' => $url['user'],
	    		'password' => $url['pass'],
	    		'database' => substr($url['path'],1),
	    		'prefix' => '',
	    		//'encoding' => 'utf8',
	    );		
    }
}


/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 */
 
 /*
 * Get Controllers list
*/
$Controllers = App::objects('controller');

preg_match('/^(?:www\.)?(?:(.+)\.)?(.+\..+)$/i', env('HTTP_HOST'), $match);

Configure::write('domainurl', $BASE_URL);

Router::connect('/*', array('controller' => 'User', 'action' => 'index'));

Router::redirect('/*', 'http://www.xyz.com'));

require 'webroot' . DIRECTORY_SEPARATOR . 'index.php';

/**
 * The full path to the directory which holds "app", WITHOUT a trailing DS.
 *
 */
define('ROOT', dirname(dirname(dirname(__FILE__))));

