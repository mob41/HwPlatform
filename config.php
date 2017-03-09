<?php
//This file defines the HwPlatform configurations

//Platform Name
define("PLATFORM_NAME", "HwPlatform");

//SQL database hostname
define("DB_HOST", "localhost");

//SQL database port
define("DB_PORT", 3389);

//SQL database username
define("DB_USER", "hwplat");

//SQL database password
define("DB_PASS", "hwplat");

//SQL database name
define("DB_NAME", "hwplat_db");

// =!= Legacy =!=
//
//  Don't change
//  the following
//  unless you know
//  what are you
//  doing
//
// =!=  Only  =!=

define("DB_TABLE_USERS", "hwplat_users"); //Users table
define("DB_TABLE_HW_DUE", "hwplat_hw_due"); //Homework table (Stores due dates)
define("DB_TABLE_HW_EXCHG", "hwplat_hw_exchg"); //Homework data for exchanging
define("DB_TABLE_UPLOADS", "hwplat_uploads"); //Uploads (in Base64)
?>