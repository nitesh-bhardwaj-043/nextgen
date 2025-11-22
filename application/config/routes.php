<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error';
$route['search'] = 'home/search';
$route["photo-gallery"]="gallery/photo_gallery";
$route["video-gallery"]="gallery/video_gallery";
$route["(:any).htm"]="home/error";
$route["infrastructure"]="about/infrastructure";
$route["why-choose-us"]="about/choose";
$route["home-relocation"]="services/homeRelocation";
$route["courier-and-cargo"]="services/courier";
$route["luggage-delivery"]="services/luggage";
$route["goods-insurance"]="services/insurance";

$route["deposit"]="services/deposit";
$route["withdraw"]="services/withdraw";
$route["setting"]="services/setting";
$route["dashboard"]="services/dashboard";
$route["editinfo"]="services/editinfo";
$route["changepassword"]="services/changepassword";
$route["bank"]="services/bank";
$route["login"]="services/login";
$route["register"]="services/register";
$route["forgot-password"]="services/forgotpass";
$route["terms-and-conditions"]="services/tc";
$route["refer"]="services/refer";
$route["help"]="services/help";
$route['logout'] = 'services/logout';
$route['nifty'] = 'home/nifty';
$route['nifty-json'] = 'home/nifty_json';



$route["office-relocation"]="services/office";
$route["car-transportation-service"]="services/car";
$route["our-branches"]="packers_movers/state";
$route["packers-movers-(:any)-india"]="packers_movers/state_services/$1";
$route["(:any)/packers-movers-(:any)"]="packers_movers/city/$1/$2";
$route["bihar"]="packers_movers/state_services/bihar";

$route['translate_uri_dashes'] = TRUE;