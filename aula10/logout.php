<?php
session_start();
session_unset();
session_destroy();
header("Location: pratica1_index.php");




?>