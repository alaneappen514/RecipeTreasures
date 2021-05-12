<?php
    function sanitizeStr($input) {
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        
        return $input;
    }

    function truncateEmail($input){
        $processInput = explode("@",$input);
        $nameContent = $processInput[0];
        return $nameContent;
    }
?>