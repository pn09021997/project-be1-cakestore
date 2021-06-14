<?php
session_start();
include_once "../admin/config.php";
include_once "../admin/models/Db.php";
include_once "../admin/models/user.php";

$user = new User();