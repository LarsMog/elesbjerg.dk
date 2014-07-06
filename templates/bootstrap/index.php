<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- styles -->
	<link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/css/bootstrap-responsive.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/css/docs.css" type="text/css" />
	

    <!-- favicon and touch icons -->
    <link rel="shortcut icon" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>images/bootstrap-apple-57x57.png">
    <link rel="apple-touch-icon" sizes="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>72x72" href="images/bootstrap-apple-72x72.png">
    <link rel="apple-touch-icon" sizes="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>114x114" href="images/bootstrap-apple-114x114.png">
<?php
if ($this->countModules('left') && !$this->countModules('right')){ $leftcol = "3"; $centercol = "9";
}elseif (!$this->countModules('left') && $this->countModules('right')){ $rightcol = "3"; $centercol = "9";
}elseif ($this->countModules('left') && $this->countModules('right')){ $leftcol = "3"; $rightcol = "3"; $centercol = "6";
}elseif (!$this->countModules('left') && !$this->countModules('right')){ $centercol = "12"; }
?>
<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/jquery.js"></script>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/css/prettify.css" type="text/css" />
</head>

<body>
<div class="container container-outer">

<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
	  <a href="/"><img src="/images/logo.png" title="Enhedslisten Esbjerg" alt="Enhedslisten Esbjerg" style="margin-left:5px;float:left;margin-right:50px;height:70px"/></a>
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

      <div class="row-fluid">

        
	  <?php if ($this->countModules('left')) : ?>
	    <div class="span<?php echo $leftcol;?>">
	       <jdoc:include type="modules" name="left" style="XHTML" />
	    </div>
	  <?php endif; ?>
	
	  <div class="span<?php echo $centercol;?>">
	  <?php if ($this->countModules('slider')) : ?>
	      <div class="row-fluid slider">
	       <jdoc:include type="modules" name="slider" style="raw" />
	      </div>
	  <?php endif; ?>
	     <jdoc:include type="component" />
	  </div>
	  <?php if ($this->countModules('right')) : ?>
	    <div class="span<?php echo $rightcol;?> rightcollum">
	       <jdoc:include type="modules" name="right" style="XHTML" />
	    </div>
	  <?php endif; ?>
      </div>
  

      <hr>

      <footer>
        <jdoc:include type="modules" name="footer" style="xhtml" />
      </footer>
      
      
    </div>
    <!-- Javascript at the end so the pages load faster -->
	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/google-code-prettify/prettify.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-transition.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-alert.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-modal.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-scrollspy.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-tab.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-tooltip.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-popover.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-button.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-collapse.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-carousel.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/bootstrap-typeahead.js"></script>
	<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/js/application.js"></script>

  </body>
</html>
