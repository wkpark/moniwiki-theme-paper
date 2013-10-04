<?php /* MoniWiki Theme by wkpark at kldp.org */
if (!empty($DBInfo->use_scrap))
  include_once("plugin/scrap.php");
if (!empty($this->_no_urlicons))
  echo <<<EOF
<style type='text/css'>
img.url { /* display: none; /* */ }

a.externalLink.unnamed {
  background: url($this->themeurl/imgs/http.png) no-repeat 0 center;
  padding: 0 0 0 14px;
  opacity: .8;
  filter: alpha(opacity=80);
}

a.externalLink.unnamed[target="_blank"]:after {
  content: "";
  background: url($this->themeurl/imgs/external.png) no-repeat 0 center;
  display: inline-block;
  width: 14px;
  height: 14px;
  vertical-align: middle;
  margin: -2px 0 0 1px;
  opacity: .7;
  filter: alpha(opacity=70);
}

img.externalLink { display: none; }
</style>\n
EOF;
?>
<div id='mainBody'>
<div id='wikiIcon'><?php echo $upper_icon.$icons.$rss_icon?></div>
   <!-- goform on the MenuBar -->
   <div id='goForm'>
<form id='go' action='' method='get' onsubmit="return moin_submit();">
   <div>
<input type='text' name='value' size='20' accesskey='s' class='goto' />
<input type='hidden' name='action' value='goto' />
<input type='submit' name='status' class='submitBtn' value='Go' />
   </div>
</form>
   </div>
<?php echo $menu?>
<?php empty($msg) ? '' : print $msg; ?>
<div id='container'>
<!-- ?php echo '<div id="wikiTrailer"><p><span>'.$trail.'</span></p></div>';? -->
<div id='mycontent'>
<?php echo '<div class="wikiTitle" id="wikiTitle">'.$title.'</div>';?>
<?php echo $subindex;?>
<?php
if (empty($options['action']) and !empty($DBInfo->use_scrap)) {
  $scrap = macro_Scrap($this, 'js');
  if (!empty($scrap)) {
    echo "<div id='scrap'>";
    echo $scrap;
    echo "</div>";
    $js = $this->get_javascripts();
    if ($js) {
      echo $js;
    }
  }
}
