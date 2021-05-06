<?php
/* Smarty version 3.1.33, created on 2020-05-03 11:28:15
  from '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/themes/theme-boilerplate/views/default.master.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5eaeaacf593e42_76014989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d3e4a7a1b9cac95ab8be30b6d5ff0e005d444c6' => 
    array (
      0 => '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/themes/theme-boilerplate/views/default.master.tpl',
      1 => 1572313752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_5eaeaacf593e42_76014989 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.asset.php','function'=>'smarty_function_asset',),1=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.breadcrumbs.php','function'=>'smarty_function_breadcrumbs',),2=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.module.php','function'=>'smarty_function_module',),3=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.searchbox.php','function'=>'smarty_function_searchbox',),4=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.event.php','function'=>'smarty_function_event',),));
?>
<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['CurrentLocale']->value['Key'];?>
">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo smarty_function_asset(array('name'=>"Head"),$_smarty_tpl);?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
</head>

<?php $_smarty_tpl->_assignInScope('SectionGroups', (isset($_smarty_tpl->tpl_vars['Groups']->value) || isset($_smarty_tpl->tpl_vars['Group']->value)));
ob_start();
if ($_smarty_tpl->tpl_vars['User']->value['SignedIn']) {
echo "
        UserLoggedIn
    ";
} else {
echo "
        UserLoggedOut
    ";
}
$_prefixVariable1=ob_get_clean();
ob_start();
if (inSection('Discussion') && $_smarty_tpl->tpl_vars['Page']->value > 1) {
echo "
        isNotFirstPage
    ";
}
$_prefixVariable2=ob_get_clean();
ob_start();
if (inSection('Group') && !isset($_smarty_tpl->tpl_vars['Group']->value['Icon'])) {
echo "
        noGroupIcon
    ";
}
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('TemplateCss', "
    ".$_prefixVariable1."

    ".$_prefixVariable2."

    ".$_prefixVariable3."

    locale-".((string)$_smarty_tpl->tpl_vars['CurrentLocale']->value['Lang'])."
");?>
<body id="<?php echo $_smarty_tpl->tpl_vars['BodyID']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['BodyClass']->value;
echo preg_replace('!\s+!u', " ",$_smarty_tpl->tpl_vars['TemplateCss']->value);?>
">

    <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="Frame" id="page">
        <div class="Frame-top">
            <div class="Frame-header">
                <?php $_smarty_tpl->_subTemplateRender("file:partials/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            <div class="Frame-body">
                <div class="Frame-content">
                    <div class="Container">
                        <div class="Frame-contentWrap">
                            <div class="Frame-details">
                                <?php if (!$_smarty_tpl->tpl_vars['isHomepage']->value) {?>
                                    <div class="Frame-row">
                                        <nav class="BreadcrumbsBox">
                                            <?php echo smarty_function_breadcrumbs(array(),$_smarty_tpl);?>

                                        </nav>
                                    </div>
                                <?php }?>
                                <div class="Frame-row SearchBoxMobile">
                                    <?php if (!$_smarty_tpl->tpl_vars['SectionGroups']->value && !inSection(array("SearchResults"))) {?>
                                        <div class="SearchBox js-sphinxAutoComplete" role="search">
                                            <?php if ($_smarty_tpl->tpl_vars['hasAdvancedSearch']->value === true) {?>
                                                <?php echo smarty_function_module(array('name'=>"AdvancedSearchModule"),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smarty_function_searchbox(array(),$_smarty_tpl);?>

                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="Frame-row">
                                    <main class="Content MainContent">
                                        <?php if (inSection("Profile")) {?>
                                            <div class="Profile-header">
                                                <div class="Profile-photo">
                                                    <div class="PhotoLarge">
                                                        <?php echo smarty_function_module(array('name'=>"UserPhotoModule"),$_smarty_tpl);?>

                                                    </div>
                                                </div>
                                                <div class="Profile-name">
                                                    <h1 class="Profile-username">
                                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['Profile']->value['Name'], ENT_QUOTES, 'UTF-8', true);?>

                                                    </h1>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['Rank']->value)) {?>
                                                        <span class="Profile-rank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['Rank']->value['Label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <?php echo smarty_function_asset(array('name'=>"Content"),$_smarty_tpl);?>

                                    </main>
                                    <aside class="Panel Panel-main">
                                        <?php if (!$_smarty_tpl->tpl_vars['SectionGroups']->value) {?>
                                            <div class="SearchBox js-sphinxAutoComplete" role="search">
                                                <?php echo smarty_function_searchbox(array(),$_smarty_tpl);?>

                                            </div>
                                        <?php }?>
                                        <?php echo smarty_function_asset(array('name'=>"Panel"),$_smarty_tpl);?>

                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Frame-footer">
            <?php $_smarty_tpl->_subTemplateRender("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <div id="modals"></div>
    <?php echo smarty_function_event(array('name'=>"AfterBody"),$_smarty_tpl);?>

</body>

</html>
<?php }
}
