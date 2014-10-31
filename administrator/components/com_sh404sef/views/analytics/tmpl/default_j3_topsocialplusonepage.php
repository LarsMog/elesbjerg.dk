<?php
/**
 * sh404SEF - SEO extension for Joomla!
 *
 * @author      Yannick Gaultier
 * @copyright   (c) Yannick Gaultier 2014
 * @package     sh404SEF
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     4.4.0.1725
 * @date		2014-04-09
 */

// Security check to ensure this file is being included by a parent file.
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

	if (!empty($this->analytics->analyticsData->topSocialPlusOnePage)) : ?>

   <h2><?php echo JText::_('COM_SH404SEF_ANALYTICS_SOCIAL_PLUS_ONE_PAGE_ENGAGEMENT'); ?></h2>

 	<table class="table table-striped" >
    <thead>
      <tr>
        <th>
          <?php echo '#'; ?>
        </th>

        <th rel="tooltip" <?php echo Sh404sefHelperHtml::wrapBootstrapTipTitle(JText::_('COM_SH404SEF_ANALYTICS_TOP5_URL'), JText::_('COM_SH404SEF_ANALYTICS_TT_URL_DESC'));?>>
        <?php echo JText::_( 'COM_SH404SEF_ANALYTICS_TOP5_URL' ); ?>
        </th>

        <th rel="tooltip" <?php echo Sh404sefHelperHtml::wrapBootstrapTipTitle(JText::_('COM_SH404SEF_ANALYTICS_TOTAL_PLUSONE_PAGE_ENGAGEMENT'), JText::_('COM_SH404SEF_ANALYTICS_TOTAL_PLUSONE_PAGE_ENGAGEMENT_DESC'));?>>
        <?php echo JText::_( 'COM_SH404SEF_ANALYTICS_TOTAL_PLUSONE_PAGE_ENGAGEMENT' ); ?>
        </th>

        <th>
        <?php echo '%'; ?>
        </th>

        <th rel="tooltip" <?php echo Sh404sefHelperHtml::wrapBootstrapTipTitle(JText::_('COM_SH404SEF_ANALYTICS_TOP5_AVG_TIME_ON_PAGE'), JText::_('COM_SH404SEF_ANALYTICS_TT_AVG_TIME_ON_PAGE_DESC'));?>>
        <?php echo JText::_( 'COM_SH404SEF_ANALYTICS_TOP5_AVG_TIME_ON_PAGE' ); ?>
        </th>
      </tr>
    </thead>


 	 <tbody>
        <?php
          $k = 0;
          $i = 1;
          foreach($this->analytics->analyticsData->topSocialPlusOnePage as $entry) :
        ?>

        <tr class="<?php echo "row$k"; ?>">

          <td class="shl-centered" width="3%">
            <?php echo $i; ?>
          </td>

          <td width="62%">
            <?php
            $path = str_replace( JURI::root(),'',  $entry->dimension['eventLabel']);
              echo $this->escape( $path);
            ?>
          </td>

          <td class="shl-centered" width="15%">
            <?php echo $this->escape( $entry->totalEvents); ?>
          </td>

          <td class="shl-centered" width="10%">
            <?php
              echo $this->escape( sprintf( '%0.1f', $entry->eventsPerCent*100));
            ?>
          </td>

          <td class="shl-centered" width="10%">
            <?php
              echo $this->escape( sprintf( '%0.1f', $entry->avgTimeOnPage));
            ?>
          </td>

        </tr>
        <?php
        $k = 1 - $k;
        $i++;
      endforeach;

 	    ?>

 	  </tbody>
  </table>

 	<?php else : ?>
 	  <h4 class="muted"><?php echo JText::_('COM_SH404SEF_ANALYTICS_SOCIAL_NO_PLUS_ONE_PAGE_ENGAGEMENT'); ?></h4>
 	<?php endif; ?>
