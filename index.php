
<?php
    include_once 'includes/header.php';

   ?>


<?php
    if(isset($_SESSION['id'])){
        echo "You are logged In";
    }else{
        echo "HOME";
    }

?>

<?php
    include_once 'includes/footer.php';

?>

