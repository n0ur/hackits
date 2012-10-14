<?

///////////////////////////////////////////////////////////////////////////////////
// 888    888        d8888  .d8888b.  888    d8P  8888888 88888888888 .d8888b.   //
// 888    888       d88888 d88P  Y88b 888   d8P     888       888    d88P  Y88b  //
// 888    888      d88P888 888    888 888  d8P      888       888    Y88b.       //
// 8888888888     d88P 888 888        888d88K       888       888     "Y888b.    //
// 888    888    d88P  888 888        8888888b      888       888        "Y88b.  //
// 888    888   d88P   888 888    888 888  Y88b     888       888          "888  //
// 888    888  d8888888888 Y88b  d88P 888   Y88b    888       888    Y88b  d88P  //
// 888    888 d88P     888  "Y8888P"  888    Y88b 8888888     888     "Y8888P"   //
///////////////////////////////////////////////////////////////////////////////////
//                                                                               //
// File:        settings.php                                                     //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Site-wide settings                                               //
//                                                                               //
// Input:       -                                                                //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

// MySQL settings
$dbhost           = "localhost";
$dbname           = "hackits.be";
$dbwriteuser      = "hackits-write";
$dbreaduser       = "hackits-read";

// Messages
$wrongpasserror   = "Computer says no.";
$msg_notloggedin  = "Not logged in";

// Course- and challenge-ID ranges
$minchallengeid   = 0;
$maxchallengeid   = 100000;
$mincourseid      = 0;
$maxcourseid      = 100000;

// Course system
$successpercentage = 75; // % of answers that need to be correct to 'pass' an examn
$retrytimeout = 3600;    // seconds a user has to wait until retrying an examn

//////////////////////
// Private settings //
//////////////////////

// MySQL passwords
$dbwritepass      = "";
$dbreadpass		  = "";

// Form passwords for staff
$challengeaddpass = "";
$courseaddpass    = "";

// Fill private settings with secret data
require("private_settings.php");

?>
