<?php

if(isset($_POST['abonne'])){
        
        $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        if ($mail) {
            echo $mail.'<br>';
            
            echo '<script>document.write(navigator.appName)</script>';
        }

}
