$(function () {
    $('.main-editor').froalaEditor({
        toolbarButtons: ['paragraphFormat', 'bold', 'italic', 'underline', 'strikeThrough', '|', 'fontFamily', 'fontSize', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'spellChecker', 'help', 'html', 'fullscreen', '|', 'undo', 'redo'],
        height: 500,
        key: 'Cc1mmF5jnnlB15hcA6gk==',
        charCounterCount: true,
		paragraphFormatSelection: true,
		imageUploadMethod:'POST',
		requestHeaders: {
			'X-CSRF-TOKEN': $('input[name="_token"]').val()
		},
		imageUploadURL: '/administrator/editor/upload',
		imageManagerDeleteMethod: 'POST',
		imageManagerDeleteURL: '/administrator/editor/delete',
		imageManagerLoadURL: '/administrator/editor/show'
    }).on('froalaEditor.image.uploaded', function (e, editor, response) {
        console.log('r',e);
	}).on('froalaEditor.image.error', function (e, editor, error, response) {
		console.log('err',error);
		console.log($($('input[name="_token"]').val()));
		// Bad link.
        // if (error.code == 1) { console.log('err',error.); }
 
        // // No link in upload response.
        // else if (error.code == 2) { ... }
 
        // // Error during image upload.
        // else if (error.code == 3) { ... }
 
        // // Parsing response failed.
        // else if (error.code == 4) { ... }
 
        // // Image too text-large.
        // else if (error.code == 5) { ... }
 
        // // Invalid image type.
        // else if (error.code == 6) { ... }
 
        // // Image can be uploaded only to same domain in IE 8 and IE 9.
        // else if (error.code == 7) { ... }
 
        // Response contains the original server response to the request if available.
      });

    $('.light-editor').froalaEditor({
        toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', '|', 'align', 'formatOL', 'formatUL', 'outdent', '|', 'insertLink', 'insertImage', 'insertTable', 'undo', 'redo', 'html'],
        key: 'Cc1mmF5jnnlB15hcA6gk=='
    });
    
    //$(".fr-wrapper div").hide();
    //$(".fr-view").show();
 //    tinymce.init({
	// 	  selector: '.main-editor',
	// 	  height: 500,
	// 	  theme: 'modern',
	// 	  plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor code insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
	// 	  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat code image',
	// 	  image_advtab: true,
	// 	  content_css: [
	// 	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	// 	    '//www.tinymce.com/css/codepen.min.css'
	// 	  ]
	// });

	//  tinymce.init({
	// 	  selector: '.light-editor',
	// 	  height: 300,
	// 	  theme: 'modern',
	// 	  plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor code insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
	// 	  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat code image',
	// 	  image_advtab: true,
	// 	  content_css: [
	// 	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	// 	    '//www.tinymce.com/css/codepen.min.css'
	// 	  ]
	// });


});