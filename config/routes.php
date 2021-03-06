<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');
Router::extensions(['pdf']);
Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Main', 'action' => 'index']);
    //$routes->connect('/', ['controller' => 'Users', 'action' => 'dashboard']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});

    $u = Router::url(null,true);  
    
    //slug Services
    Router::connect(
        '/services/:id/:slug',
        array('controller' => 'Services', 'action' => 'frontview'),
        array(
            'pass' => array('id', 'slug'),
            'id' => '[0-9]+',
            'slug' => '[a-zA-Z0-9_-]+'
        )
    ); 

    //slug Pages
    Router::connect(
    '/pages/:id/:slug',
    array('controller' => 'Pages', 'action' => 'frontview'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    );    

    //slug News
    Router::connect(
    '/news/:id/:slug',
    array('controller' => 'News', 'action' => 'frontview'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    ); 

    //slug Product
    Router::connect(
    '/products/:id/:slug',
    array('controller' => 'Products', 'action' => 'frontview'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    ); 

    //slug Product
    Router::connect(
    '/product/:id/:slug',
    array('controller' => 'Products', 'action' => 'frontview'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    ); 
    
    Router::connect(
    '/products/listing/:id/:slug',
    array('controller' => 'Products', 'action' => 'listing'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    ); 

    //slug Pages - Contact us
    Router::connect(
    '/contact-us/',
    array('controller' => 'Pages', 'action' => 'contact_us'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    ); 

    //slug Pages - about-us
    Router::connect(
    '/about-us/',
    array('controller' => 'Pages', 'action' => 'frontview', 2),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    );    

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
