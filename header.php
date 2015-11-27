<?php /* MoniWiki Theme by wkpark at kldp.org */
if ($this->_no_urlicons == 1)
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
else if ($this->_no_urlicons == 2)
  echo <<<EOF
<style type='text/css'>
img.url { /* display: none; /* */ }

a.externalLink:before {
  padding: 0 0.1em;
  background: #008000;
  color: #FFF;
  content: "外";
  border-radius: 1px;
  opacity: .7;
  filter: alpha(opacity=70);
  margin-right: 0.1em;
}

#wikiMenu a.externalLink.named:before {
  content: '';
  padding: 0;
  background: none;
}

a.externalLink.source:before {
  content: '本';
}

</style>\n
EOF;

echo <<<EOF
<script type="text/javascript">
function toggle_menu() {
  var menu = document.getElementById('wikiMenu');
  if (!menu) return;

  if (menu.style.height == 0)
    menu.style.height = 0;
  if (parseInt(menu.style.height) == 0) {
    menu.style.height = 'auto';
    menu.className = '';
  } else {
    menu.style.height = '0';
    menu.className = 'collapse';
  }
  console.log(menu.style.height);
}
</script>

EOF;

if (is_mobile() and !empty($_COOKIE['desktop'])) {
  echo '<div class="switch-pc-mobile">';
  echo '<a href="?mobile=1" class="switch-to-mobile">Mobile version</a>';
  echo '</div>';
}
?>
<div id='mainBody'>
<div id='wikiIcon'><?php echo $upper_icon.$icons.$rss_icon?></div>
   <!-- goform on the MenuBar -->
<div class='navbar-fixed-top navbar'>
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" onclick="toggle_menu()">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="brand hidden-desktop"><?php
echo $this->link_tag($this->frontpage,'',$DBInfo->sitename);
?></span>
<div id="wikiMenu" class="collapse">
   <div id='goForm'>
<form id='go' action='' method='get' onsubmit="return moin_submit();">
   <div>
<input type='text' name='value' size='20' accesskey='s' class='goto' />
<input type='hidden' name='action' value='goto' />
<input type='submit' name='status' class='submitBtn' value='Go' />
   </div>
</form>
   </div>
<?php echo str_replace('<div id="wikiMenu">', '', $menu); ?>
</div></div></div>

<?php empty($msg) ? '' : print $msg; ?>
<div id='container'>
<!-- ?php echo '<div id="wikiTrailer"><p><span>'.$trail.'</span></p></div>';? -->
<div id='mycontent' class='hentry'>
<?php echo '<div class="wikiTitle entry-title" id="wikiTitle">'.$title.'</div>';?>
<?php echo $subindex;?>
<?php
if (empty($options['action']) and !empty($lastedit) and !empty($this->_use_lastmod)):
    echo "<p class='last-modified'>".
        "<span class='i18n' lang='ko' title='last modified:'>"._("last modified:")."</span> <span class='updated'><span class='value-title' title='$datetime'>$lastedit $lasttime</span></span>";
    if ($this->_use_contributors) {
        $url = $this->link_url($this->page->urlname, '?action=contributors');
        echo ' ', sprintf(_("by %s"),
            "<span class='editors'><span class='vcard'><a class='fn nickname url' href='".$url."'>".
            "<span class='i18n' lang='ko' title='Contributors'>"._("Contributors")."</span></a></span></span>");
    }
    echo "</p>";
endif;
?>
<?php
if (empty($options['action']) and !empty($DBInfo->use_scrap)) {
  $scrap = $this->macro_repl('Scrap', 'js');
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

if (empty($options['action']) and !empty($DBInfo->use_discuss)) {
  $discuss = $this->macro_repl('Discuss', 'js');
  if (!empty($discuss)) {
    echo "<div id='discuss'>";
    echo $discuss;
    echo "</div>";
    $js = $this->get_javascripts();
    if ($js) {
      echo $js;
    }
    echo "<div id='discuss-links'>";
    echo "</div>";
  }
}
