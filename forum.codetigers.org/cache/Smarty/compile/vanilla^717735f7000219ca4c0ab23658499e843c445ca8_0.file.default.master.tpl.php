<?php
/* Smarty version 3.1.33, created on 2020-05-03 19:20:40
  from '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/applications/dashboard/views/default.master.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5eaf19882c4315_19931678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '717735f7000219ca4c0ab23658499e843c445ca8' => 
    array (
      0 => '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/applications/dashboard/views/default.master.tpl',
      1 => 1572313750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaf19882c4315_19931678 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.asset.php','function'=>'smarty_function_asset',),1=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.link.php','function'=>'smarty_function_link',),2=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.logo.php','function'=>'smarty_function_logo',),3=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.searchbox.php','function'=>'smarty_function_searchbox',),4=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.discussions_link.php','function'=>'smarty_function_discussions_link',),5=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.activity_link.php','function'=>'smarty_function_activity_link',),6=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.custom_menu.php','function'=>'smarty_function_custom_menu',),7=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.breadcrumbs.php','function'=>'smarty_function_breadcrumbs',),8=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.module.php','function'=>'smarty_function_module',),9=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.vanillaurl.php','function'=>'smarty_function_vanillaurl',),10=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.event.php','function'=>'smarty_function_event',),));
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
        <div class="Head" id="Head" role="banner">
            <div class="Row">
                <strong class="SiteTitle"><a href="<?php echo smarty_function_link(array('path'=>"/"),$_smarty_tpl);?>
"><?php echo smarty_function_logo(array(),$_smarty_tpl);?>
</a></strong>
                <div class="SiteSearch" role="search"><?php echo smarty_function_searchbox(array(),$_smarty_tpl);?>
</div>
                <ul class="SiteMenu">
                    <?php echo smarty_function_discussions_link(array(),$_smarty_tpl);?>

                    <?php echo smarty_function_activity_link(array(),$_smarty_tpl);?>

                    <?php echo smarty_function_custom_menu(array(),$_smarty_tpl);?>

                </ul>
            </div>
        </div>
        <div id="Body">
            <div class="Row">
                <div class="BreadcrumbsWrapper"><?php echo smarty_function_breadcrumbs(array(),$_smarty_tpl);?>
</div>
                <div class="Column PanelColumn" id="Panel" role="complementary">
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
" class="PoweredByVanilla" title="Community Software by Vanilla Forums">Forum Software
                    Powered by Vanilla</a>
                <?php echo smarty_function_asset(array('name'=>"Foot"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <?php echo smarty_function_event(array('name'=>"AfterBody"),$_smarty_tpl);?>

</body>
</html>
<?php }
}
