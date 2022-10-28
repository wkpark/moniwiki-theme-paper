<?php
$css_friendly=1; # please do not change it.
# theme options
$_newtheme=1;
$_sidebar=1; # enable sidebar
$_toggle=1; # enable sidebar toggle
$_calendar=0; # enable calendar
$_randomquote=1; # enable randomquote 1
$_submenu=0; # enable submenu
$_topbanner=0; # enable top banner
$_uppergoform=0; # enable goform on the top
$_splash=0; # enable splash image
$_logo=0; # enable logo
$_toptitle=0; # old-style title.
#$_no_urlicons=1; # do not insert url icons
#$_no_urlicons=2; # mirror style external url icon using css :before
#$_no_urlicons=3; # mirror style with url icon using a background image
$_no_urlicons=2; # insert url icons
$_use_lastmod=1; # show last modified info
$_use_contributors=0; # show contributors link

$imgdir=$themeurl."/imgs";
#$icon['rss']="<img src='$imgdir/feed.png' alt='RSS' style='vertical-align:middle;border:0px' />";

if (file_exists(dirname(__FILE__).'/local.php'))
    include(dirname(__FILE__).'/local.php');
