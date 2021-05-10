<?php
    function sanitizeStr($input) {
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        
        return $input;
    }
?>