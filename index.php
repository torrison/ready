<?php

// Git Here =)

// Session system
session_start();
// Debug mode switch
$GLOBALS['debug_mode'] = false;
// Config Data
require ("config.php");


// Loading Main Libraries

require ("libs/c7_defend.php");                                    				// POST, GET, COOKIE, FILES, SESSION Data Defend Functions
require ("libs/c7_mysql.php");  												// MySQL Library
require ("libs/c7_file_system.php");                             			 	// FileSystem Controller
require ("libs/c7_url.php");                             			 			// URL works
require ("libs/c7_get_view.php");                                               // Lib for include the view parts

// Access system
require ("modules/auth/c7_auth_controller.php");

// Lead Maker
require ("modules/leadmaker/c7_leadmaker_controller.php");
// Gallery Maker
require ("modules/gallery/c7_gallery_controller.php");
// Social Maker
require ("modules/social/c7_social_controller.php");
// Site catalog
require ("modules/catalog/c7_catalog_controller.php");
// Main Page
require ("modules/main_page/c7_main_page_controller.php");
// Search system
require ("modules/search/c7_search_controller.php");
// Real Time Innovation
//require ("modules/real_time/c7_real_time_controller.php"); // Test for TerraSoft
// Form Validation System
require ("modules/validation/c7_validation_controller.php");
// Program Incubator
require ("modules/incubator/c7_incubator_controller.php");
// People Base
require ("modules/people/c7_people_controller.php");
// Planing organiser
require ("modules/planer/c7_planer_controller.php");
// Project Management
require ("modules/project/c7_project_controller.php");
//Example Module
//require ("modules/example/c7_example_controller.php");
// Admin panel
require ("modules/admin/c7_admin_controller.php");

if ($GLOBALS['url_array'][0] == "ajax") require ("libs/c7_ajax.php");                        				  // Ajax transfer
else require ("modules/themes/c7_themes_controller.php");
?>