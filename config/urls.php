<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); 
require_once('mpm/urls/functions.php');
use function Mpm\Urls\{path,includes};

/*patterns
path(
    url:"/blog_detail/(?P<id>\d+)/",
    view:'blog/blog_detail.php',
    name:'blog_detail'
  ),*/

$urlpatterns =  [
  ...includes('mpm/admin/urls'),//Admin Urls
  ...includes('mpm/auth/urls'),//Authentication
  path('','home','home'),
];

