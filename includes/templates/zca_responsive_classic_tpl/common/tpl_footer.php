<?php
/**
 * Common Template - tpl_footer.php
 * 
 * zca_diy_tpl 1.0.0 
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Fri Jan 8 17:06:29 2016 -0500 Modified in v1.5.5 $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));
?>

<?php
if (!isset($flag_disable_footer) || !$flag_disable_footer) {
?>

<!--bof-navigation display -->
<div id="navSuppWrapper">
<div id="navSupp">
    <ul class="list-inline">
<li class="list-inline-item"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
<?php if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_footer.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_footer.php'); ?>
<?php } ?>
</ul>
</div>
</div>
<!--eof-navigation display -->

<div class="p-2"></div>

<?php 
if (ZCA_ACTIVATE_FOOTERBLOCKS == 'true') {
$box_locs = explode(',', '1,2,3,4,5,6,7,8,9');
foreach ($box_locs as $box_loc) {

require($template->get_template_dir('tpl_modules_zca_footerbox_blocks.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_zca_footerbox_blocks.php');
}
 }
 ?> 

<!--bof-ip address display -->
<?php
if (SHOW_FOOTER_IP == '1') {
?>
<div id="siteinfoIP" class="centeredContent"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></div>
<?php
}
?>
<!--eof-ip address display -->

<!--bof-banner #5 display -->
<?php
  if (SHOW_BANNERS_GROUP_SET5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET5)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerFive" class="banners content-align-center pad-3"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
<!--eof-banner #5 display -->

<!--bof- site copyright display -->
<div id="siteinfoLegal" class="legalCopyright centeredContent"><?php echo FOOTER_TEXT_BODY; ?></div>
<!--eof- site copyright display -->

<?php
} // flag_disable_footer
?>

<?php if (false || (isset($showValidatorLink) && $showValidatorLink == true)) { ?>
<a href="https://validator.w3.org/check?uri=<?php echo urlencode('http' . ($request_type == 'SSL' ? 's' : '') . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . (strstr($_SERVER['REQUEST_URI'], '?') ? '&' : '?') . zen_session_name() . '=' . zen_session_id()); ?>" target="_blank">VALIDATOR</a>
<?php } ?>
