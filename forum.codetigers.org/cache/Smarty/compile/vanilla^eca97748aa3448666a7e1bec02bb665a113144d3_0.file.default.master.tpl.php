<?php
/* Smarty version 3.1.33, created on 2020-05-03 11:27:06
  from '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/themes/bittersweet/views/default.master.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5eaeaa8a7fdf19_55107217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eca97748aa3448666a7e1bec02bb665a113144d3' => 
    array (
      0 => '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/themes/bittersweet/views/default.master.tpl',
      1 => 1572313752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaeaa8a7fdf19_55107217 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.asset.php','function'=>'smarty_function_asset',),1=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.home_link.php','function'=>'smarty_function_home_link',),2=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.link.php','function'=>'smarty_function_link',),3=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.logo.php','function'=>'smarty_function_logo',),4=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.searchbox.php','function'=>'smarty_function_searchbox',),5=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.dashboard_link.php','function'=>'smarty_function_dashboard_link',),6=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.discussions_link.php','function'=>'smarty_function_discussions_link',),7=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.activity_link.php','function'=>'smarty_function_activity_link',),8=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.inbox_link.php','function'=>'smarty_function_inbox_link',),9=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.custom_menu.php','function'=>'smarty_function_custom_menu',),10=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.profile_link.php','function'=>'smarty_function_profile_link',),11=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.signinout_link.php','function'=>'smarty_function_signinout_link',),12=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.breadcrumbs.php','function'=>'smarty_function_breadcrumbs',),13=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.module.php','function'=>'smarty_function_module',),14=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.vanillaurl.php','function'=>'smarty_function_vanillaurl',),15=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.event.php','function'=>'smarty_function_event',),));
?>
<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['CurrentLocale']->value['Lang'];?>
">
<head>
    <?php echo smarty_function_asset(array('name'=>"Head"),$_smarty_tpl);?>

</head>
<body id="<?php echo $_smarty_tpl->tpl_vars['BodyID']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['BodyClass']->value;?>
">
<div id="Frame">
    <div class="Top">
        <div class="Row">
            <div class="TopMenu">
                <?php echo smarty_function_home_link(array(),$_smarty_tpl);?>

                <!--
                You can add more of your top-level navigation links like this:

                <a href="#">Store</a>
                <a href="#">Blog</a>
                <a href="#">Contact Us</a>
                -->
            </div>
        </div>
    </div>
    <div role="banner" class="Banner">
        <div class="Row">
            <strong class="SiteTitle"><a href="<?php echo smarty_function_link(array('path'=>"/"),$_smarty_tpl);?>
"><?php echo smarty_function_logo(array(),$_smarty_tpl);?>
</a></strong>
            <!--
            We've placed this optional advertising space below. Just comment out the line and replace "Advertising Space" with your 728x90 ad banner.
            -->
            <!-- <div class="AdSpace">Advertising Space</div> -->
        </div>
    </div>
    <div id="Head" role="navigation">
        <div class="Row">
            <div class="SiteSearch" role="search"><?php echo smarty_function_searchbox(array(),$_smarty_tpl);?>
</div>
            <ul class="SiteMenu">
                <?php echo smarty_function_dashboard_link(array(),$_smarty_tpl);?>

                <?php echo smarty_function_discussions_link(array(),$_smarty_tpl);?>

                <?php echo smarty_function_activity_link(array(),$_smarty_tpl);?>

                <?php echo smarty_function_inbox_link(array(),$_smarty_tpl);?>

                <?php echo smarty_function_custom_menu(array(),$_smarty_tpl);?>

                <?php echo smarty_function_profile_link(array(),$_smarty_tpl);?>

                <?php echo smarty_function_signinout_link(array(),$_smarty_tpl);?>

            </ul>
        </div>
    </div>
    <div class="BreadcrumbsWrapper">
        <div class="Row">
            <?php echo smarty_function_breadcrumbs(array(),$_smarty_tpl);?>

        </div>
    </div>
    <div id="Body">
        <div class="Row">
            <div role="complementary" class="Column PanelColumn" id="Panel">
                <?php echo smarty_function_module(array('name'=>"MeModule"),$_smarty_tpl);?>

                <?php echo smarty_function_asset(array('name'=>"Panel"),$_smarty_tpl);?>

            </div>
            <div class="Column ContentColumn" id="Content" role="main"><?php echo smarty_function_asset(array('name'=>"Content"),$_smarty_tpl);?>
</div>
        </div>
    </div>
    <div id="Foot" role="contentinfo">
        <div class="Row">
            <a href="<?php echo smarty_function_vanillaurl(array(),$_smarty_tpl);?>
" class="PoweredByVanilla">Powered by Vanilla</a>
            <?php echo smarty_function_asset(array('name'=>"Foot"),$_smarty_tpl);?>

        </div>
    </div>
</div>
<?php echo smarty_function_event(array('name'=>"AfterBody"),$_smarty_tpl);?>

</body>
</html>
<?php }
}
