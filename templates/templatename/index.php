<?php defined( '_JEXEC' ) or die; 

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = &$app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/template.css'); 
//$doc->addScript($tpath.'/js/modernizr.js'); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="no-js" lang="<?=$this->language?>">

  <head>
    <jdoc:include type="head" />
  </head>
  
  <body id="<?php
$menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) { echo 'frontpage'; } ?>">
<a name="#top"></a>
    <div id="overall">
      <div id="top">
        <div id="logo"><a href="/"><img src="/images/logo.png" title="Nordstjerne" alt="Nordstjerne" /></a></div>
        <div id="topmenu"><jdoc:include type="modules" name="topmenu" style="XHTML" /></div>
        <div id="staticmenu"><jdoc:include type="modules" name="staticmenu" style="XHTML" /></div>
      </div>
  <?php if ($this->countModules('infobox')) : ?>
  <div id="header">
    <div class="infobox"><jdoc:include type="modules" name="infobox" style="XHTML" /></div>
  </div>
  <?php endif; ?>
  
  <div id="main">
  <div class="inmain">
  <?php if ($this->countModules('frontpagetop')) : ?>
  <div id="frontpagetop"><jdoc:include type="modules" name="frontpagetop" style="XHTML" /></div>
  <?php endif; ?>
  <?php if ($this->countModules('left')) : ?>
    <div id="left">
    <jdoc:include type="modules" name="left" style="XHTML" />

    </div>
  <?php endif; ?>
  <?php if ($this->countModules('right')) : ?>
    <div id="right">
    <jdoc:include type="modules" name="right" style="XHTML" />

    </div>
  <?php endif; ?>
<div id="center">  
   <jdoc:include type="component" />
</div>   

      </div>
    </div>
	<div id="staticmenu"><jdoc:include type="modules" name="staticmenu" style="XHTML" /></div>
    <div id="bottom">
    <div id="bottommenu"><jdoc:include type="modules" name="bottommenu" style="XHTML" /></div>
    <div id="bottomlink"></div>
    </div>
   


      <div id="footer"><div class="infooter"><jdoc:include type="modules" name="footer" style="XHTML" /></div></div>    
    </div>
        <div id="bottombox"><jdoc:include type="modules" name="bottombox" style="XHTML" />
          <div id="bottomboxinner">
          <div id="bottomlogo"></div>
        
    </div>
    <jdoc:include type="modules" name="debug" />

<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.elesbjerg.dk/" : "http://piwik.elesbjerg.dk/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://piwik.elesbjerg.dk/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->

	</body>

</html>