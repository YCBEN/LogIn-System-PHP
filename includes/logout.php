<?php

session_start();
session_unset();

/*<li ><form action="includes/logout.php">
                    <input type="submit" class="btn btn-danger btn-block" value="Logout">
                    </form></li>'*/

header("Location: ../index.php?succes=LoggedOut");
    exit();
?>


