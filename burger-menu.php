<?php
// Source: https://github.com/richi/
// This file may be used and distributed under the terms of the public license.

// BurgerMenu plugin
class YellowBurgerMenu
{
	const VERSION = "0.1.7";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = NULL;
		
		if($name == "subpages" && $shortcut)
		{
			list($location, $pagesMax) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($location)) $location = $page->getPage("main")->getLocation(true);
			if(empty($pagesMax)) $pagesMax = 99;
			$sub = $this->yellow->pages->find($location);
			$pages = $sub ? $sub->getChildren(!$sub->isVisible()) : $this->yellow->pages->clean();
			$pages->limit($pagesMax);
			$page->setLastModified($pages->getModified());			
			$output = "<div class=\"navigation-subpages\">\n";
			if(count($pages))
			{
				$output .= "<ul>\n";
				foreach($pages as $page)
				{
					$output .= "<li><a ".($page->isActive() ? " class=\"active\"" : "")." href=\"".$page->getLocation(true)."\">".$page->getHtml("titleNavigation")."</a></li>\n";
				}
				$output .= "</ul>\n";
			} 
			$output .= "</div>\n";
		}
		return $output;
	}


	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = null;
		if($name=="header")
		{
			$locationStylesheet = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation")."burger-menu.css";
			$fileNameStylesheet = $this->yellow->config->get("pluginDir")."burger-menu.css";
			if(is_file($fileNameStylesheet)) $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$locationStylesheet\" />\n";
		}
		
		if($name=="footer") 
		{
			$output = <<<EOD
<div id="burger-icon"><span></span><span></span><span></span></div>
<script>
(function() {
  function toggleNav() {
    if (document.body.classList && document.body.classList.toggle) {
      document.body.classList.toggle('burger-active');
    } else  {
      if (document.body.className === '') {
        document.body.className += ' burger-active';
      } else {
        document.body.className = "";
      }
    }
  }
  document.getElementById('burger-icon').addEventListener('click', toggleNav);
})();
</script>
EOD;
		}
		return $output;
	}
}

$yellow->plugins->register("burgermenu", "YellowBurgerMenu", YellowBurgerMenu::VERSION);
?>