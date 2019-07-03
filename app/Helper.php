<?php

function setActive($path, $active = 'active'){
    return strtolower(request()->path()) === strtolower(ltrim($path[0], "/")) ? $active : '';
}
