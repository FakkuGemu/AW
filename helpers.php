<?php

function post($name, $default = '') {
    return isset($_POST[$name]) ? $_POST[$name] : $default;
}