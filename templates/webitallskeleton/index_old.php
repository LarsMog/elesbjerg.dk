<?php  
/*------------------------------------------------------------------------
# author    Webitall ApS
# copyright Copyright © 2012 webitall. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.webitall.dk
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// parameters (template)
$modernizr = $this->params->get('modernizr');
$bootstrapjs = $this->params->get('bootstrapjs');
$bootstrapcss = $this->params->get('bootstrapcss');
$pie = $this->params->get('pie');

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// CSS
$doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
$doc->addStyleSheet($tpath.'/css/template.css'); 

// JS
$doc->addScript($tpath.'/js/jquery.min.js');
$doc->addScript($tpath.'/js/bootstrap.min.js'); 
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr.js'); 

// Columns
if ($this->countModules('left') && !$this->countModules('right')){ $leftcol = "3"; $centercol = "9";
}elseif (!$this->countModules('left') && $this->countModules('right')){ $rightcol = "3"; $centercol = "9";
}elseif ($this->countModules('left') && $this->countModules('right')){ $leftcol = "3"; $rightcol = "3"; $centercol = "6";
}elseif (!$this->countModules('left') && !$this->countModules('right')){ $centercol = "12"; }

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png">
  <?php if ($pie==1) : ?>
    <!--[if lte IE 8]>
      <style> 
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
    <![endif]-->
  <?php endif; ?>
  
  <?php if ($bootstrapjs==1) : ?>
	  <script>
	  	jQuery.noConflict();
	  </script>
  <?php endif; ?>
  
  <?php if ($this->params->get( 'ga' )) : ?>  
	  <script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $this->params->get('ga');?>']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	  </script>
  <?php endif; ?>
  
</head>
	
<body class="<?php echo $pageclass; ?>">


      
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <jdoc:include type="modules" name="topmenu" style="raw" />
          </div>
        </div>
      </div>
    </div>

<div class="container">

    <div class="row">

    <div class="row-fluid">
        <div class="span12">
	  <jdoc:include type="modules" name="slider" style="XHTML" />
	</div>
    </div>
  
    <div class="row-fluid">
        <div class="span12">
	
	  <div class="apan<?php echo $centercol;?>">
	     <jdoc:include type="component" />
	  </div>
	  <?php if ($this->countModules('right')) : ?>
	    <div class="apan<?php echo $rightcol;?>">
	       <jdoc:include type="modules" name="right" style="XHTML" />
	    </div>
	  <?php endif; ?>
      </div>
    </div>

  </div> <!--container ->
</body>
</html>

