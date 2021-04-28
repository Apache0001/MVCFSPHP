<?php

/** 
 *  ###################
 *  ##### VALIDATE ####
 *  ###################
 */

 
 /**
  * This function filter field to email
  * @param string $email
  * @return bool
  */

 function is_email(string $mail):bool
 {
     return filter_var($mail. FILTER_VALIDATE_EMAIL);
 }

 /**
  * This function filter field to password
  * @param string $password
  * @return bool
  */

 function is_passwd(string $password):bool
 {
     if(password_get_info($password)['algo'] || mb_strlen($password) >= 8 && mb_strlen($password) <= 16 ? true : false){
         return true;
     }
     return false;
 }

 /** 
 *  ###################
 *  ##### STRING ######
 *  ###################
 */

 function str_slug(string $string)
 {
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

 }


 /** 
 *  ###################
 *  ##### URL ######
 *  ###################
 */

function url(string $path = null): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")){
        if($path){
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST;
    }
    if($path){
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE;
    
}

/**
 * @return string
 */

function url_back(): string
{
    return ($_SERVER['HTTP_REFERER'] ?? url());
}


/**
 * @param string $url
 */
function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    if (filter_input(INPUT_GET, "route", FILTER_DEFAULT) != $url) {
        $location = url($url);
        header("Location: {$location}");
        exit;
    }
}

