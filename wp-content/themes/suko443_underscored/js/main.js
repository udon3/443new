//using the module pattern 
//create namespace: check for variable/namespace existence. If already defined, use that instance, otherwise assign a new object literal to SUKO443
var SUKO443 = SUKO443 || {};


	
//SUKO443 GLOBAL VARIABLES.......................................
SUKO443.Global = function(){
	//any global methods and properties (but still private within SUKO443)
}();

//UTILITY MODULES WITHIN SUKO443.................................
//add modules to the namespace (using a function to encapsulate the module - thus emulating a private method)
SUKO443.Utils = function(){

	//RETURN PUBLIC: return an object containing Utils' public methods and properties
	var utilsPublic = {
		//functionName: functionName
	};
	return utilsPublic; 

}();

//GENERAL MODULES WITHIN SUKO443.................................
SUKO443.Modules = function(){


	

	/*	setLinkTarget
	 	Open external links and chosen file types (e.g. PDFs) in a new window
	 	set target="_blank" on external links & chosen filetypes
	 	add title attribute to inform users if none has been hard coded
	*/
	var setLinkTarget = function(){
		if (!document.getElementsByTagName) return;
		var links = document.getElementsByTagName("a");
		var newWinFileTypes = ['pdf','xls'];
		var hasTitle = true;
		var href, 
			fileName = '';
		//check whether a link href is external or a chosen file type
		var _checkLink = function(hrefStr, fileStr){
			if ((href.indexOf('http') !== -1)&&(href.indexOf(window.location.host) ==-1)){
				return true;
			} else {
				//check if file extention matches newWinFileTypes
				for(j=0; j<newWinFileTypes.length; j++){
					if (href.indexOf(newWinFileTypes[j]) !== -1) {
						//store file ext as uppercase string
						fileName = newWinFileTypes[j].toUpperCase();
						return true;
					} else {
						fileName = '';
					}
				}
			}	
			return;			
		};

		//iterate through all links in the document and run _checkLink
		for (var i=0; i<links.length; i++) {
			var href = links[i].getAttribute('href');
			fileName = '';
			//run the _checkLink function and set target if returning true
			if(_checkLink(href, fileName)){
				links[i].setAttribute('target','_blank');
				links[i].setAttribute('title','Opens ' +fileName+ ' in a new window');
			}
		}		
	};




	
	// RESPONSIVE WEB -------------------

	
	/*	Off canvas toggle:
	.	Show/hide non-primary content (aside content and nav) for small viewports:  
	.	params: 
	.		trigger: selector (e.g. 'li.buttonClass')
	.		content: selector (e.g. 'section#containerId')
	.	e.g. offcanvasToggle('li.buttonClass','section#containerId')
	*/
	var offcanvasToggle = function(trigger, content){
	    //associate any trigger with its content, wherever it is
	    var options = {
	        trigger: trigger,
	        content: content,
	        triggerCollection: '#simple-nav li'
	    };
	    var $triggers = $(options.triggerCollection);
		    
	    $(options.content).addClass('offcanvas');  
	    
	    //function to hide all offcanvas content
	    function _hideAll(){       
	        var $offcanvasContent = $('.offcanvas');        
	        if($offcanvasContent.hasClass('oncanvas')){
	            $offcanvasContent.removeClass('oncanvas');
	        }
	    }
	    
	    $(options.trigger).on('click', function(e){ 
	        _hideAll(); //hide all offcanvas content (but maintain trigger classes to enable the toggle)
	        if(!$(this).hasClass('active')){
	            $(options.content).addClass('oncanvas');
	        	$triggers.removeClass('active'); //clear all active clases
	            $(this).addClass('active');                
	        } else {
	            $(options.content).removeClass('oncanvas').offset({ top: 0});
	            $(this).removeClass('active');
	        }
	    
	        e.preventDefault();
	    });
	};


	/*	functionName:
	.	explanation and instructions for use:  
	.	params: 
	.		paramname: selector/string/number/boolean/etc
	.	e.g. functionName(param)
	*/
	
	/*****************************
	 FORMS
	 ****************************/
	/*	Placeholder (IIFE)
		if form input placeholder is not supported, add value attribute
		(set marker to ensure the form validator can spot an 'unedited field'??)
		and run the _clearFieldOnFocus() function 
	*/
	var placeholderFn = function(){
		(function(){
			//test to see if the current document supports the placeholder property
			jQuery.support.placeholder = false;
			test = document.createElement('input');
			if('placeholder' in test){
				jQuery.support.placeholder = true;
			}
		})();

		//if placeholder not supported, add value attributes
		if(!$.support.placeholder){
			//for any input fields and textareas with placeholders
			var $targetFields = $('input[placeholder], textarea[placeholder]');
			//add placeholder text as value in each field
			$targetFields.each(function(){
				var $this = $(this);
				var placeholderText = $(this).attr('placeholder');				
				
				$this.val(placeholderText)
					 .focus(function() {
						if($(this).val() == placeholderText){
							$(this).val('');
						}
					 }).blur(function() {
						if($(this).val() == ''){
							$(this).val(placeholderText);
						}
					 });
				
			});

		}
	}();//immediate invocation


	
	

	/*	formFieldValidation:
	.	validate each field on blur: 
	.
	*/
	var formFieldValidation = function(){
		var hasError = false;
		$('.requiredField').blur(function(){
			var $this = $(this);
			var labelText = $this.prev('label').text();
			var errorMessage = '<span class="error">Please enter your '+labelText+'.</span>';
			//set up for non-placeholder browsers (using value attributes added by placeholderFn function):
			var hasDefaultValue = false;
			if($this.val() == $this.attr('placeholder')){
				hasDefaultValue = true;
			}
			//if field is blank, - add error message if not already there
			if(jQuery.trim($this.val()) == '' || hasDefaultValue) {
				//set hasError marker to true
				hasError = true;				
				//if error message doesn't already exist, add error message:
				if(!$this.parent().hasClass('invalid')){
					$this.parent().addClass('invalid').append(errorMessage);
				}
				
			} else { //field is filled
				//check for error message and remove if present
				$this.parent().removeClass('invalid').find('span.error').remove();
				// but if the field is email, do additional check:
				//check email is valid
				if($this.hasClass('email')){
					//if email, do email test
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
					if(!emailReg.test(jQuery.trim($this.val()))) {
						//failed - email invalid
						$this.parent().addClass('invalid');
						$this.parent().append('<span class="error">Please enter a valid email address</span>');
						//set hasError marker to true
						hasError = true;
					} else {
						hasError = false;
					}
				}
				
			}

		});

		$('form#contactForm').submit(function() {
			
			$('.requiredField').blur();

			if(!hasError) {
				//on successful send...
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					
					$('form#contactForm').slideUp("fast", function() {       
						$(this).before('<p class="thanks"><strong>Thank you.</strong> <br />Your email was successfully sent.</p>');
					});
	   			});
			}
			return false;
		});

	};

	/*	contactFormSubmit:
	.	Validate, shows error message, submit form and show a message on success: 
	.
	*/
	

	/*	contactFormSubmit:
	.	Validates, shows error messages, submits form and shows a message on success: 
	.
	var contactFormSubmit = function(){

		//set boolean marker to denote errors in form
		var hasError = false;
		//set marker for use with non-placeholder browsers
		var hasDefaultValue = false;

		

		//bind methods to the submit event (every attempt to submit form will run this code)
		$('form#contactForm').submit(function() {
		  	//remove error messages to begin
		  	$('form#contactForm .error').remove();
			
			
			//iterate through required fields
			$('.requiredField').each(function() {
				var $thisField = $(this);
				//set up for non-placeholder browsers (using value attributes added by placeholderFn function):
				if($thisField.val() == $thisField.attr('placeholder')){
					hasDefaultValue = true;
				}
				//errors:
				//show error message if field is empty or has the placeholder text
				if(jQuery.trim($thisField.val()) == '' || hasDefaultValue) {
					var labelText = $thisField.prev('label').text();
					//append error message:
					$thisField.parent().append('<span class="error">Please enter your '+labelText+'.</span>');
					$thisField.addClass('invalid');
					//turn on error marker
					hasError = true;
				} else if($thisField.hasClass('email')) {
					//additional test for email address:
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
					if(!emailReg.test(jQuery.trim($thisField.val()))) {
						var labelText = $thisField.prev('label').text();
						$thisField.parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
						$thisField.addClass('invalid');
						hasError = true;
					}
				} 


			}); //close requiredField .each iteration

			if(!hasError) {
				//on successful send...
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					
					$('form#contactForm').slideUp("fast", function() {       
						$(this).before('<p class="thanks"><strong>Thank you.</strong> <br />Your email was successfully sent.</p>');
					});
	   			});
			}
			return false;
		});
	};


	*/



	//RETURN PUBLIC: public methods and properties
	var modulesPublic = {
		offcanvasToggle: offcanvasToggle,
		//contactFormSubmit: contactFormSubmit,
		setLinkTarget: setLinkTarget,
		formFieldValidation: formFieldValidation
		//functionName: functionName
	};
	return modulesPublic; 

}();


	



	
//JQUERY DOM READY................................

$(document).ready(function(){
	
	SUKO443.Modules.offcanvasToggle('.menu-button', '#mainnav');
	SUKO443.Modules.offcanvasToggle('.aside-button', 'aside');
	SUKO443.Modules.setLinkTarget();

	SUKO443.Modules.formFieldValidation();
	//SUKO443.Modules.contactFormSubmit();
	



	

	








});//close document ready
