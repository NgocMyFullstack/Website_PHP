<?php
session_start();

unset($_SESSION['loginadmin']);
unset($_SESSION['name']);
unset($_SESSION['user_id']);
unset($_SESSION['image']);
header('location:login.php');
