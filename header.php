<?php /* MoniWiki Theme by wkpark at kldp.org */
if (!empty($DBInfo->use_scrap))
  include_once("plugin/scrap.php");
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
<!-- ?php echo '<div id="wikiTrailer"><p><span>'.$trail.'</span></p></div>';?i -->
<div id='mycontent'>
<?php echo '<div class="wikiTitle" id="wikiTitle">'.$title.'</div>';?>
<?php echo $subindex;?>
<?php
if (empty($options['action']) and !empty($DBInfo->use_scrap)) {
  $scrap = macro_Scrap($this);
  if (!empty($scrap)) {
    echo "<div class='scrap'>";
    echo $scrap;
    echo "</div>";
  }
}
?>
