<?php

use App\Controllers\Article;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'logincontroller::home');
$routes->post('login-check', 'logincontroller::check');

$routes->get('loginsss', 'logincontroller::show');

//login



$routes->get('user-add','UserController::create');
$routes->post('user-store','UserController::store');


//employee
$routes->get('article','Article::index');
$routes->get('employee-add','Article::create');
$routes->post('employee-store','Article::store');
$routes->get('employee/edit/(:num)','Article::edit/$1');
$routes->post('employee/update/(:num)','Article::update/$1');
$routes->get('employee/deletes/(:num)','Article::deletes/$1');

//add
$routes->get("add-all", "add::add");

$routes->get("add","add::task");
$routes->post("add-topic","add::addtopic");

$routes->get("show-subtopic","add::addsubtopic");
$routes->post("add-subtopic","add::savesubtopic");  

$routes->get("show-image","add::addimage");
$routes->post("add-image","add::saveimage"); 

$routes->get("show-content","add::addcontent");
$routes->post("add-content","add::savecontent"); 


$routes->get("add-imagecontent","add::contentsaveImage"); 

//scree4
$routes->get("screen4/(:num)","screen4controller::main/$1");

$routes->get("delete/content/(:num)","screen4controller::delete/$1");

     
//notification
$routes->get("topics", "notification::topicscheck");
$routes->get("topic", "notification::topictable");
$routes->get("subtopic", "notification::subtopictable");
$routes->get("content", "notification::contenttable");


//notopic app and diss
$routes->get('topicapp/(:num)','notification::topicapprove/$1');
$routes->get('topicdis/(:num)','notification::topicdisapprove/$1');

$routes->get('subtopicapp/(:num)','notification::subtopicapprove/$1');
$routes->get('subtopicdis/(:num)','notification::subtopicdisapprove/$1');


$routes->get('contapp/(:num)','notification::contapprove/$1');
$routes->get('contdis/(:num)','notification::contdisapprove/$1');


//screen 3

$routes->get("box/(:num)", "screen3::screen3/$1");


//profile
$routes->get("profile","Profile::userprofile");
$routes->post("image","Profile::updateProfilePic");
$routes->get("userstatus","Profile::status");


//admin
$routes->get("adminhome", "admincontroller::screen3");


//logout
$routes->get('logout','logincontroller::logout');


//userhome
$routes->get("userhome", "screen3::userhome");
$routes->get("count/(:num)", "screen3::contentcount/$1");


$routes->get('trending', 'ContentController::index');
