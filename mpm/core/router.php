<?php
namespace Mpm\Core;
use function Mpm\View\render;
use function Mpm\Urls\{reverse,redirect};


class Router {
  
  public static function process($url,$urlpatterns){
    if(substr(trim($url),-1)!='/') $url.='/';

    $paths = array_column($urlpatterns,0);
    $pattern_matching_process_string = "";
    for($i = 0;$i<count($urlpatterns);$i++) {
      //handler key=>$value pairs alternation in path
      $current_url = $urlpatterns[$i][0];
      
      if(empty(trim($current_url)))
        $current_url = "/";
      $j = $i+1;
      $pattern_matching_process_string .= ("$j. ".$current_url."<br>");
      $pattern = "@^".$current_url."$@";
      
      if(preg_match($pattern, $url,$matches)){
        $groups = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
        $url_matched = $urlpatterns[$i];
        $view_name = $urlpatterns[$i][1];
        break;
      }
    }

    if(isset($view_name)){
      if(count($groups)>0){
        $view = $view_name;
        echo($view($_SERVER,$groups));
      } else{
        $view = $view_name;
        echo($view($_SERVER));
      }
    } else {
      if(DEBUG===true){
        $mpmException = array(
          "name"=>"no_reverse_match",
          "title"=>"No Reverse Match For",
          "target"=>$url,
          "extra"=>array("title"=>"Mpm Tried in this order","data"=>$pattern_matching_process_string)
        );
        echo(render($_SERVER,"debug.php",array("mpm_exception"=>$mpmException))); 
      }
      else {
        redirect(reverse('404'));
      }
    }//if_else $view_name
  }//method process
}//class Router