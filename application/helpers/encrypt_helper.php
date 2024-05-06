<?php

function encrypt1($param) {
    $id = $param * 44 + 37;
    return $id;
}

function decrypt1($param) {
    $id = ($param - 37) / 44;
    return $id;
}
