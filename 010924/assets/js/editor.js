CKEDITOR.plugins.add('videoembed', {
    icons: 'https://localhost/bni_life/admin_my/assets/plugins/ckeditor/icons/videoembed.png',
    version: 1.1,
    init: function (editor) {
        // Command
        editor.addCommand('videoembed', new CKEDITOR.dialogCommand('videoembedDialog'));
        // Toolbar button
        editor.ui.addButton('VideoEmbed', {
            label: 'Video Embedded',
            command: 'videoembed',
            toolbar: 'insert'
        });
        // Dialog window
        CKEDITOR.dialog.add('videoembedDialog', './assets/plugins/ckeditor/dialogs/videoembedDialog.js');
    }
});
CKEDITOR.replace('editor1', {
  uiColor: '#CCEAEE',
  extraPlugins: 'videoembed',
	toolbarGroups : [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	],	
	removeButtons: 'Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,SpecialChar,PageBreak,Iframe,Smiley,About,ExportPdf,Print,Templates,PasteText,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting',
});

CKEDITOR.replace('editor2', {
  uiColor: '#CCEAEE',
	toolbarGroups : [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	],	
	removeButtons: 'Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,SpecialChar,PageBreak,Iframe,Smiley,About,ExportPdf,Print,Templates,PasteText,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting',
});