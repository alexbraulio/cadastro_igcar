<?php
/**
 * @package SISTEMA_IGCAR
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// ClientePf
	'GET:clientepfs' => array('route' => 'ClientePf.ListView'),
	'GET:clientepf/(:num)' => array('route' => 'ClientePf.SingleView', 'params' => array('id' => 1)),
	'GET:api/clientepfs' => array('route' => 'ClientePf.Query'),
	'POST:api/clientepf' => array('route' => 'ClientePf.Create'),
	'GET:api/clientepf/(:num)' => array('route' => 'ClientePf.Read', 'params' => array('id' => 2)),
	'PUT:api/clientepf/(:num)' => array('route' => 'ClientePf.Update', 'params' => array('id' => 2)),
	'DELETE:api/clientepf/(:num)' => array('route' => 'ClientePf.Delete', 'params' => array('id' => 2)),
		
	// ClientePj
	'GET:clientepjs' => array('route' => 'ClientePj.ListView'),
	'GET:clientepj/(:num)' => array('route' => 'ClientePj.SingleView', 'params' => array('id' => 1)),
	'GET:api/clientepjs' => array('route' => 'ClientePj.Query'),
	'POST:api/clientepj' => array('route' => 'ClientePj.Create'),
	'GET:api/clientepj/(:num)' => array('route' => 'ClientePj.Read', 'params' => array('id' => 2)),
	'PUT:api/clientepj/(:num)' => array('route' => 'ClientePj.Update', 'params' => array('id' => 2)),
	'DELETE:api/clientepj/(:num)' => array('route' => 'ClientePj.Delete', 'params' => array('id' => 2)),
		
	// Login
	'GET:logins' => array('route' => 'Login.ListView'),
	'GET:login/(:num)' => array('route' => 'Login.SingleView', 'params' => array('id' => 1)),
	'GET:api/logins' => array('route' => 'Login.Query'),
	'POST:api/login' => array('route' => 'Login.Create'),
	'GET:api/login/(:num)' => array('route' => 'Login.Read', 'params' => array('id' => 2)),
	'PUT:api/login/(:num)' => array('route' => 'Login.Update', 'params' => array('id' => 2)),
	'DELETE:api/login/(:num)' => array('route' => 'Login.Delete', 'params' => array('id' => 2)),
		
	// Servico
	'GET:servicos' => array('route' => 'Servico.ListView'),
	'GET:servico/(:any)' => array('route' => 'Servico.SingleView', 'params' => array('id' => 1)),
	'GET:api/servicos' => array('route' => 'Servico.Query'),
	'POST:api/servico' => array('route' => 'Servico.Create'),
	'GET:api/servico/(:any)' => array('route' => 'Servico.Read', 'params' => array('id' => 2)),
	'PUT:api/servico/(:any)' => array('route' => 'Servico.Update', 'params' => array('id' => 2)),
	'DELETE:api/servico/(:any)' => array('route' => 'Servico.Delete', 'params' => array('id' => 2)),
		
	// Veiculo
	'GET:veiculos' => array('route' => 'Veiculo.ListView'),
	'GET:veiculo/(:any)' => array('route' => 'Veiculo.SingleView', 'params' => array('id' => 1)),
	'GET:api/veiculos' => array('route' => 'Veiculo.Query'),
	'POST:api/veiculo' => array('route' => 'Veiculo.Create'),
	'GET:api/veiculo/(:any)' => array('route' => 'Veiculo.Read', 'params' => array('id' => 2)),
	'PUT:api/veiculo/(:any)' => array('route' => 'Veiculo.Update', 'params' => array('id' => 2)),
	'DELETE:api/veiculo/(:any)' => array('route' => 'Veiculo.Delete', 'params' => array('id' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
?>