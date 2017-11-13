<?php 

function isSecureProtocol() {
    return isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME']  == 'https' ? true : false;
}
