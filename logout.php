<?php

session_start();
unset($_SESSION['user']);
header('location:index.php?status="success&message="deconnexion=ok"');
echo "Vous êtes bien déconnecté!";

