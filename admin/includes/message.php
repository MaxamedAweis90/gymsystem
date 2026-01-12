<?php
// Display Session Messages using Gritter
if(isset($_SESSION['success_message'])){
    echo "<script>
    $(document).ready(function(){
        $.gritter.add({
            title: 'Success',
            text: '".$_SESSION['success_message']."',
            image: '../img/demo/envelope.png',
            sticky: false,
            time: 3000
        });
    });
    </script>";
    unset($_SESSION['success_message']);
}

if(isset($_SESSION['error_message'])){
    echo "<script>
    $(document).ready(function(){
        $.gritter.add({
            title: 'Error',
            text: '".$_SESSION['error_message']."',
            image: '../img/demo/envelope.png',
            sticky: false, 
            time: 3000
        });
    });
    </script>";
    unset($_SESSION['error_message']);
}
?>
