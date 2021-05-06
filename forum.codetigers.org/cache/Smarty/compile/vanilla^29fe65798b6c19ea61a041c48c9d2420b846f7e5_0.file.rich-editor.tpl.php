<?php
/* Smarty version 3.1.33, created on 2020-05-03 11:19:32
  from '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/plugins/rich-editor/views/rich-editor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5eaea8c48bec71_73022495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29fe65798b6c19ea61a041c48c9d2420b846f7e5' => 
    array (
      0 => '/home/jdmf9z4zrge5/public_html/forum.codetigers.org/plugins/rich-editor/views/rich-editor.tpl',
      1 => 1572313750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaea8c48bec71_73022495 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/SmartyPlugins/function.t.php','function'=>'smarty_function_t',),));
?>
<div class="richEditor isDisabled" aria-label="<?php echo smarty_function_t(array('c'=>"Type your message"),$_smarty_tpl);?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['editorData']->value['editorID'];?>
" aria-describedby="<?php echo $_smarty_tpl->tpl_vars['editorData']->value['editorDescriptionID'];?>
" role="textbox" aria-multiline="true">
    <p id="<?php echo $_smarty_tpl->tpl_vars['editorData']->value['editorDescriptionID'];?>
" class="sr-only">
        <?php echo smarty_function_t(array('c'=>"richEditor.description.title"),$_smarty_tpl);?>

        <?php echo smarty_function_t(array('c'=>"richEditor.description.paragraphMenu"),$_smarty_tpl);?>

        <?php echo smarty_function_t(array('c'=>"richEditor.description.inlineMenu"),$_smarty_tpl);?>

        <?php echo smarty_function_t(array('c'=>"richEditor.description.embed"),$_smarty_tpl);?>

    </p>
    <div class="richEditor-frame InputBox">
        <div class="richEditor-textWrap">
            <div class="ql-editor richEditor-text userContent isDisabled" data-gramm="false" contenteditable="false" disabled="disabled" data-placeholder="Create a new post..." tabindex="0"></div>
        </div>
    </div>
</div>
<?php }
}
