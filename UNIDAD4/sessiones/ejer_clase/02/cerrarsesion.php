<?php
session_start();

session_unset();

session_destroy();

header("Location: 02-session.php");