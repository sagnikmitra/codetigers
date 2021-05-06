<?php
/* Smarty version 3.1.33, created on 2020-05-03 11:28:15
  from '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/themes/theme-boilerplate/views/partials/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5eaeaacf67f3d4_84513936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55aa7b97ebfa788506bc7c06adcbaaa794d7d931' => 
    array (
      0 => '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/themes/theme-boilerplate/views/partials/header.tpl',
      1 => 1572313752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/hamburger.html' => 1,
  ),
),false)) {
function content_5eaeaacf67f3d4_84513936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.home_link.php','function'=>'smarty_function_home_link',),1=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.logo.php','function'=>'smarty_function_logo',),2=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.mobile_logo.php','function'=>'smarty_function_mobile_logo',),3=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.categories_link.php','function'=>'smarty_function_categories_link',),4=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.discussions_link.php','function'=>'smarty_function_discussions_link',),5=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.custom_menu.php','function'=>'smarty_function_custom_menu',),6=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.community_chooser.php','function'=>'smarty_function_community_chooser',),7=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.module.php','function'=>'smarty_function_module',),8=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.t.php','function'=>'smarty_function_t',),9=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.activity_link.php','function'=>'smarty_function_activity_link',),));
$_smarty_tpl->_assignInScope('linkFormat', "<div class='Navigation-linkContainer'>
        <a href='%url' class='Navigation-link %class'>
            %text
        </a>
    </div>");?>

<header id="MainHeader" class="Header">
    <div class="Container">
        <div class="row">
            <div class="Hamburger">
                <?php $_smarty_tpl->_subTemplateRender("file:partials/hamburger.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            <a href="<?php echo smarty_function_home_link(array('format'=>"%url"),$_smarty_tpl);?>
" class="Header-logo">
                <?php echo smarty_function_logo(array(),$_smarty_tpl);?>

            </a>
            <a href="<?php echo smarty_function_home_link(array('format'=>"%url"),$_smarty_tpl);?>
" class="Header-logo mobile">
                <?php echo smarty_function_mobile_logo(array(),$_smarty_tpl);?>

            </a>
            <nav class="Header-desktopNav">
                <?php echo smarty_function_categories_link(array('format'=>$_smarty_tpl->tpl_vars['linkFormat']->value),$_smarty_tpl);?>

                <?php echo smarty_function_discussions_link(array('format'=>$_smarty_tpl->tpl_vars['linkFormat']->value),$_smarty_tpl);?>

                <?php echo smarty_function_custom_menu(array('format'=>$_smarty_tpl->tpl_vars['linkFormat']->value),$_smarty_tpl);?>

            </nav>
            <div class="Header-flexSpacer"></div>
            <div class="Header-right">
                <?php echo smarty_function_community_chooser(array('buttonType'=>'titleBarLink','buttonClass'=>'Header-desktopCommunityChooser'),$_smarty_tpl);?>

                <div class="MeBox-header">
                    <?php echo smarty_function_module(array('name'=>"MeModule",'CssClass'=>"FlyoutRight"),$_smarty_tpl);?>

                </div>
                <?php if ($_smarty_tpl->tpl_vars['User']->value['SignedIn']) {?>
                    <button class="mobileMeBox-button">
                        <span class="Photo PhotoWrap">
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['User']->value['Photo'], ENT_QUOTES, 'UTF-8', true);?>
" class="ProfilePhotoSmall" alt="<?php echo smarty_function_t(array('c'=>'Avatar'),$_smarty_tpl);?>
">
                        </span>
                    </button>
                <?php }?>
            </div>
        </div>
    </div>
    <nav class="Navigation needsInitialization js-nav">
        <div class="Container">
            <?php if ($_smarty_tpl->tpl_vars['User']->value['SignedIn']) {?>
                <div class="Navigation-row NewDiscussion">
                    <div class="NewDiscussion mobile">
                        <?php echo smarty_function_module(array('name'=>"NewDiscussionModule"),$_smarty_tpl);?>

                    </div>
                </div>
            <?php } else { ?>
                <div class="Navigation-row">
                    <div class="SignIn mobile">
                        <?php echo smarty_function_module(array('name'=>"MeModule"),$_smarty_tpl);?>

                    </div>
                </div>
            <?php }?>
            <?php echo smarty_function_categories_link(array('format'=>$_smarty_tpl->tpl_vars['linkFormat']->value),$_smarty_tpl);?>

            <?php echo smarty_function_discussions_link(array('format'=>$_smarty_tpl->tpl_vars['linkFormat']->value),$_smarty_tpl);?>

            <?php echo smarty_function_activity_link(array('format'=>$_smarty_tpl->tpl_vars['linkFormat']->value),$_smarty_tpl);?>

            <?php echo smarty_function_custom_menu(array('format'=>$_smarty_tpl->tpl_vars['linkFormat']->value),$_smarty_tpl);?>

            <div class='Navigation-linkContainer'>
                <?php echo smarty_function_community_chooser(array('buttonType'=>'reset','fullWidth'=>true,'buttonClass'=>'Navigation-link'),$_smarty_tpl);?>

            </div>
        </div>
    </nav>
    <nav class="mobileMebox js-mobileMebox needsInitialization">
        <div class="Container">
            <?php echo smarty_function_module(array('name'=>"MeModule"),$_smarty_tpl);?>

            <button class="mobileMebox-buttonClose Close">
                <span>×</span>
            </button>
        </div>
    </nav>
</header>
<?php }
}
