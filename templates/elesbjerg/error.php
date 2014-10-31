<?php  
/*------------------------------------------------------------------------
# author    Webitall ApS
# copyright Copyright © 2013 webitall. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.webitall.dk
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// parameters (template)

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu(); 
$params = JFactory::getApplication()->getTemplate(true)->params;
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;
$this->setGenerator(null);

// CSS
 $doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
$doc->addStyleSheet($tpath.'/css/template.css'); 
 $doc->addStyleSheet($tpath.'/css/font-awesome.min.css');
 $doc->addStyleSheet($tpath.'/css/font-awesome-ie7.min.css');

// JS
$doc->addScript($tpath.'/js/jquery.min.js');
$doc->addScript($tpath.'/js/bootstrap.min.js'); 
$doc->addScript($tpath.'/js/modernizr.js'); 

// Columns
if ($doc->countModules('left') && !$doc->countModules('right')){ $leftcol = "3"; $centercol = "9";
}elseif (!$doc->countModules('left') && $doc->countModules('right')){ $rightcol = "3"; $centercol = "9";
}elseif ($doc->countModules('left') && $doc->countModules('right')){ $leftcol = "3"; $rightcol = "3"; $centercol = "6";
}elseif (!$doc->countModules('left') && !$doc->countModules('right')){ $centercol = "12"; }

?><!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>

<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage()); ?></title>

<!--<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />-->
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/crm/css/bootstrap.min.css" type="text/css" />

</head>
	
<body<?php if($pageclass): ?>class="<?php echo $pageclass; ?>"<?php endif; ?>>
<div class="container">
<div class="row-fluid">
	<div class="span12">
		<!-- Begin Content -->
		<h1 class="page-header"><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>
		<div class="well">
			<div class="row-fluid">
				<div class="span6">
					<p><strong><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></strong></p>
					<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
					<ul>
						<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
						<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
						<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
						<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
					</ul>
				</div>
				<div class="span6">
					<?php if (JModuleHelper::getModule('search')) : ?>
						<p><strong><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
						<p><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
						<?php
							$module = JModuleHelper::getModule('search');
							echo JModuleHelper::renderModule($module);
						?>
					<?php endif; ?>
					<p><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></p>
					<p><a href="<?php echo $this->baseurl; ?>/index.php" class="btn"><i class="icon-home"></i> <?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
				</div>
			</div>
			<hr />
			<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
			<blockquote>
				<span class="label label-inverse"><?php echo $this->error->getCode(); ?></span> <?php echo $this->error->getMessage();?>
			</blockquote>
			<?php echo $this->renderBacktrace();?>
		</div>
	</div>
</div>
</div>
</body>
</html>
