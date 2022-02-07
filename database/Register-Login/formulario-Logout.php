<?php
session_start();// destruimos la session de usuarios.
session_destroy();
header("Location: ../..");
?>