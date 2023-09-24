$(document).ready(function() {
	
	/*****************************
		Variables
	*****************************/
	var imgWidth = 180,
		imgHeight = 180,
		zindex = 0;
		dropzone = $('#droparea'),
		uploadBtn = $('#uploadbtn'),
		defaultUploadBtn = $('#upload');
		

	/*****************************
		Events Handler
	*****************************/
	dropzone.on('dragover', function() {
		//add hover class when drag over
		dropzone.addClass('hover');
		return false;
	});
	dropzone.on('dragleave', function() {
		//remove hover class when drag out
		dropzone.removeClass('hover');
		return false;
	});
	dropzone.on('drop', function(e) {
		//prevent browser from open the file when drop off
		e.stopPropagation();
		e.preventDefault();
		dropzone.removeClass('hover');
		
		//retrieve uploaded files data
		var files = e.originalEvent.dataTransfer.files;
		processFiles(files);

		return false;
	});
		
	uploadBtn.on('click', function(e) {
		e.stopPropagation();
		e.preventDefault();
		//trigger default file upload button
		defaultUploadBtn.click();
	});
	defaultUploadBtn.on('change', function() {
		//retrieve selected uploaded files data
		var files = $(this)[0].files;
		processFiles(files);
		
		return false;
	});
	
	
	/***************************** 
		internal functions
	*****************************/	
	//Bytes to KiloBytes conversion
	function convertToKBytes(number) {
		return (number / 1024).toFixed(1);
	}
	
	function compareWidthHeight(width, height) {
		var diff = [];
		if(width > height) {
			diff[0] = width - height;
			diff[1] = 0;
		} else {
			diff[0] = 0;
			diff[1] = height - width;
		}
		return diff;
	}
	
	
	
	
	
	
	/***************************** 
		Process FileList 
	*****************************/	
	var processFiles = function(files) {
		if(files && typeof FileReader !== "undefined") {
			//process each files only if browser is supported
			for(var i=0; i<files.length; i++) {
				readFile(files[i]);
			}
		} else {
			
		}
	}
	
	
	/***************************** 
		Read the File Object
	*****************************/	
	var readFile = function(file) {
		if( (/image/i).test(file.type) ) {
			//define FileReader object
			var reader = new FileReader();
			
			//init reader onload event handlers
			reader.onload = function(e) {	
				var image = $('<img/>')
				.load(function() {
					//when image fully loaded
					var newimageurl = getCanvasImage(this);
					createPreview(file, newimageurl);
					uploadToServer(file, dataURItoBlob(newimageurl));
				})
				.attr('src', e.target.result);	
			};
			
			//begin reader read operation
			reader.readAsDataURL(file);
			
			$('#err').text('');
		} else {
			//some message for wrong file format
			$('#err').text('*Selected file format not supported!');
		}
	}
	
	
	
	/****************************
		Upload Image to Server
	****************************/
	var uploadToServer = function(oldFile, newFile) {
		// prepare FormData
		var formData = new FormData();  
		//we still have to use back old file
		//since new file doesn't contains original file data
		formData.append('filename', oldFile.name);
		formData.append('filetype', oldFile.type);
		formData.append('file', newFile); 
					
		//submit formData using $.ajax			
		$.ajax({
			url: 'upload.php',
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function(data) {
				console.log(data);
			}
		});	
	}
	
	
	//file upload via original byte sequence
	var processFileInIE = function(file) {

		var imageObj = {};
		var extension = ['jpg', 'jpeg', 'gif', 'png'];
		var filepath = file.value;
		if (filepath) {
			//get file name
			var startIndex = (filepath.indexOf('\\') >= 0 ? filepath.lastIndexOf('\\') : filepath.lastIndexOf('/'));
			var filedetail = filepath.substring(startIndex);
			if (filedetail.indexOf('\\') === 0 || filedetail.indexOf('/') === 0) {
				filedetail = filedetail.substring(1);
			}
			var filename = filedetail.substr(0, filedetail.lastIndexOf('.'));
			var fileext = filedetail.slice(filedetail.lastIndexOf(".")+1).toLowerCase();

			//check file extension
			if($.inArray(fileext, extension) > -1) {
				//append using template
				$('#err').text('');
				imageObj.filepath = filepath;
				imageObj.filename = filename;
				var randvalue = Math.floor(Math.random()*31)-15;
				$("#imageTemplate").tmpl(imageObj).prependTo( "#result" )
				.hide()
				.css({
					'Transform': 'scale(1) rotate('+randvalue+'deg)',
					'msTransform': 'scale(1) rotate('+randvalue+'deg)',
					'MozTransform': 'scale(1) rotate('+randvalue+'deg)',
					'webkitTransform': 'scale(1) rotate('+randvalue+'deg)',
					'oTransform': 'scale(1) rotate('+randvalue+'deg)',
					'z-index': zindex++
				})
				.show();
				$('#result').find('figcaption span').hide();
			} else {
				$('#err').text('*Selected file format not supported!');
			}
		}
	}
	
	/****************************
		Browser compatible text
	****************************/
	if (typeof FileReader === "undefined") {
		//$('.extra').hide();
		$('#err').html('Hey! Your browser does not support <strong>HTML5 File API</strong> <br/>Try using Chrome or Firefox to have it works!');
	} else if (!Modernizr.draganddrop) {
		$('#err').html('Ops! Look like your browser does not support <strong>Drag and Drop API</strong>! <br/>Still, you are able to use \'<em>Select Files</em>\' button to upload file =)');
	} else {
		$('#err').text('');
	}
});