<?php
function division($a, $b) {
    $c = @(a/b); 
    if($b === 0) {
      $c = 10;
    }
    return $c;
}
?>