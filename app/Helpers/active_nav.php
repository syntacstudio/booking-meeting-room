<?php
/**
 * Set any link as active by adding active class
 * @param [uri] $uri Current URI
 * @param string $ouput CLASS class name
 */
function active_nav($uri, $output = 'active')
{
    if( is_array($uri) ) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)){
            return $output;
        }
    }
}