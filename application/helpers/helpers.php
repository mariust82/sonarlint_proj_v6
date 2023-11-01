<?php

function checkNumber($value) {
    return $value == 10.0 ? 10: $value;
}

function hasLogoImage($game_name) {
    if (file_exists(dirname(__DIR__, 2) . "/public/sync/game_logo/225x165/" . str_replace(" ", "_", strtolower($game_name)) . ".webp")) {
        return true;
    } else {
        return false;
    }
}

/**
 * @param $name String - name of the game to get play link
 * */
function getPlayLink($name) {
    return '<a href="/play/' . strtolower(str_replace(' ', '-', $name )) . '" title="' . $name . '">' . $name . '</a>';
}
