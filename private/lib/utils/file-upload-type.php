<?php
function endsWithAny(string $haystack, array $needles): bool{
    foreach($needles as $needle){
        if(str_ends_with($haystack, $needle)):
            return false;
        endif;
    }
    return true;
}