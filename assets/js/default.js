    $(document).ready(function(){
	$.web_url = "https://www.jumboking.co.in/";
	$.staff_url = 'https://www.jumboking.co.in/staff/';
	$.fnction = 'includes/functions/';
	$.core = 'includes/core/';
	$.imgurl = 'assets/svg/';
	$.extn = '.php';

	 //function to validate email id 
	 function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	$(document).on('click', '#signin', function()
	{
		//alert("test now");
		var inform = $(this).attr("inform");
		var emailid = $('#emailid').val();
		var pass = $('#password').val();
		if($.trim(emailid).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>User ID</b> field should not be empty!').fadeOut(4000);
		 $('#emailid').focus();
	    }else if($.trim(pass).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Password</b> field should not be empty!').fadeOut(4000);
		 $('#password').focus();
	    }
		var postData=JSON.stringify({"username": emailid, "password": pass, "action": inform});
		$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Redirceting login');
                        $("#lightbox_content").html(data.output);
						var dash = $.web_url +""+data.url;
						window.setTimeout(function(){
							$(location).attr('href', dash).fadeTo(200, 0.5);
							},500);
						$('input[type="text"],input[type="password"],textarea').val('');
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input,textarea').val('');
				        }else{}
			}
		});
	});
	$(document).on('click', '#add-top-submenu', function()
	{
		var inform = $(this).attr("inform");
		var mainmenuid = $('#mainmenuid option:selected').attr('value');
		var submenuname = $('input:text[name="submenu-name"]').val();
		var submenuneed = $('input:checkbox[name="submenu-needed-sub"]:checked').val();
		if(submenuneed == undefined){
			submenune = '0';
		}else{
			submenune = '1';
		}
		if(mainmenuid == ''){
			mainmenuidn = '0';
		}else{
			mainmenuidn = '1';
		}
		//alert(mainmenuidn+'--');
		if(mainmenuidn==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: Choose <b>Top Menu</b> from drop down box!');
		 $('#mainmenuid option:selected').focus();
	    }else if($.trim(submenuname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Sub Menu</b> field should not be empty!');
		 $('input:text[name="submenu-name"]').focus();
	    }else{
	    	var postData=JSON.stringify({"mainmenuid": mainmenuid, "submenuname": submenuname, "submenune": submenune, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Redirceting Top menu List');
                        $("#lightbox_content").html(data.output);
						var dash = $.web_url +""+data.url;
						window.setTimeout(function(){
							$(location).attr('href', dash).fadeTo(200, 0.5);
							},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
			}
			});
	    }
	});
	$(document).on('click', '#add-top-menu', function()
	{
		var inform = $(this).attr("inform");
		var menuname = $('#menu-name').val();
		var submenu = $('input:checkbox[name="submenu-needed"]:checked').val();
		if(submenu == undefined){
			submenun = '0';
		}else{
			submenun = '1';
		}
		if($.trim(menuname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Menu name</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else{
	    	var postData=JSON.stringify({"menuname": menuname, "submenun": submenun, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Redirceting Top menu List');
                        $("#lightbox_content").html(data.output);
						var dash = $.web_url +""+data.url;
						window.setTimeout(function(){
							$(location).attr('href', dash).fadeTo(200, 0.5);
							},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
			}
		});
	    }
	});
	$(document).on('click', '#add-product-category', function()
	{
		var inform = $(this).attr("inform");
		var pcatname = $('input:text[name="product-category-name"]').val();
		var pcaticon = $('input:text[name="product-category-icon"]').val();
		if($.trim(pcatname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Product Category Name</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(pcaticon).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Product Category Icon</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else{
	    	var postData=JSON.stringify({"pcatname": pcatname, "pcaticon": pcaticon, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Redirceting Top menu List');
                        $("#lightbox_content").html(data.output);
						var dash = $.web_url +""+data.url;
						window.setTimeout(function(){
							$(location).attr('href', dash).fadeTo(200, 0.5);
							},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
			}
		});
	    }
	});
	$(document).on('click', '#add-coverage', function()
	{
		var maincoveragetypeid = $('#maincoveragetypeid option:selected').attr('value');
	    var coveragename = $('#coverage-name').val();
		var coveragedescription = $('#coverage-description').val();
		var coverageurl = $('#coverage-url').val();
		var pimg = $('#imgpreview').attr("imgname");
		var inform = $(this).attr("inform");
		if(maincoveragetypeid == ''){
			mainmenuidn = '0';
		}else{
			mainmenuidn = '1';
		}
		if($.trim(mainmenuidn).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Coverage Type</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(coveragename).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Coverage name</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(coveragedescription).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Coverage description</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(coverageurl).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Coverage url</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(pimg).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Coverage Image</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else{
	    	var postData=JSON.stringify({"maincoveragetypeid": mainmenuidn, "coveragename": coveragename, "coveragedescription": coveragedescription, "coverageurl": coverageurl, "pimg": pimg, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Redirceting Top menu List');
                        $("#lightbox_content").html(data.output);
						var dash = $.web_url +""+data.url;
						window.setTimeout(function(){
							$(location).attr('href', dash).fadeTo(200, 0.5);
							},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
			}
		});
	    }
	});
	$(document).on('click', '#submit-contact-message', function()
	{
		var inform = $(this).attr('inform');
		var firstname = $('#first-name').val();
		var lastname = $('#last-name').val();
		var subject = $('#subject').val();
		var emailid = $('#emailid').val();
		var phonenumber = $('#phonenumber').val();
		var yourmessage = $('#your-message').val();
		if($.trim(firstname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>First Name</b> field should not be empty!');
		 $('#first-name').focus();
	    }else if($.trim(lastname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Last Name</b> field should not be empty!');
		 $('#last-name').focus();
	    }else if($.trim(subject).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Subject</b> field should not be empty!');
		 $('#subject').focus();
	    }else if($.trim(yourmessage).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Message</b> field should not be empty!');
		 $('#your-message').focus();
	    }else if($.trim(emailid).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Email id</b> field should not be empty!');
		 $('#your-message').focus();
	    }else if($.trim(phonenumber).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Phone number</b> field should not be empty!');
		 $('#your-message').focus();
	    }else{
	    	var postData=JSON.stringify({"firstname": firstname, "lastname": lastname, "emailid": emailid, "phonenumber": phonenumber, "subject": subject, "message": yourmessage, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Submission Successfull');
                        $("#lightbox_content").html(data.output);
                        $('input,textarea,select').val('');
						// var dash = $.web_url +""+data.url;
						// window.setTimeout(function(){
						// 	$(location).attr('href', dash).fadeTo(200, 0.5);
						// 	},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
				}
			});
	    }
	});
	$('#select-your-state').on('change', function(){
        var stateID = $(this).val();
        var inform = $(this).attr('inform');
        if(stateID){
            //var postData=JSON.stringify({"stateID": stateID, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"action/get-cities",
			data:'stateid='+ stateID,
			cache: false,  
			success: function(html)
				{
					$('#cities-check').css({"display": ""}).css({"display": "block"});
                    $('#select-your-cities').html(html);
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    $('#select-your-cities').on('change', function(){
        var cityID = $(this).val();
        var inform = $(this).attr('inform');
        if(cityID){
            //var postData=JSON.stringify({"stateID": stateID, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"action/get-sub-city",
			data:'cityid='+ cityID,
			cache: false,  
			success: function(html)
				{
					$('#where_do_stay').css({"display": ""}).css({"display": "none"});
					$('#where_do_stayn').css({"display": ""}).css({"display": "block"});
					if(html == '0'){
						$('#where_do_stay').css({"display": ""}).css({"display": "block"});
						$('#where_do_stayn').css({"display": ""}).css({"display": "none"});
					}else{
						$('#select-your-city-stay').html(html);
					}
                    
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
	$(document).on('click', '#send-feedback', function()
	{
		var inform = $(this).attr('inform');
		var firstname = $('#first-name').val();
		var lastname = $('#last-name').val();
		var choosetorate = $('#choosetorate option:selected').attr('value');
		var emailid = $('#emailid').val();
		var phonenumber = $('#phonenumber').val();
		var needtogetrating10 = $('#need-to-get-rating-10').val();
		if($.trim(firstname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>First Name</b> field should not be empty!');
		 $('#first-name').focus();
	    }else if($.trim(lastname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Last Name</b> field should not be empty!');
		 $('#last-name').focus();
	    }else if($.trim(choosetorate).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Choose to rate</b> field should not be empty!');
		 $('#subject').focus();
	    }else if($.trim(needtogetrating10).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>How can we get rating 10</b> field should not be empty!');
		 $('#your-message').focus();
	    }else if($.trim(emailid).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Email id</b> field should not be empty!');
		 $('#your-message').focus();
	    }else if($.trim(phonenumber).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Phone number</b> field should not be empty!');
		 $('#your-message').focus();
	    }else{
	    	var postData=JSON.stringify({"firstname": firstname, "lastname": lastname, "emailid": emailid, "phonenumber": phonenumber, "choosetorate": choosetorate, "needtogetrating10": needtogetrating10, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Submission Successfull');
                        $("#lightbox_content").html(data.output);
                        $('input,textarea,select').val('');
						// var dash = $.web_url +""+data.url;
						// window.setTimeout(function(){
						// 	$(location).attr('href', dash).fadeTo(200, 0.5);
						// 	},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
				}
			});
	    }
	});
	$(document).on('click', '#add-application', function()
	{
		var inform = $(this).attr('inform');
		var selectyourstate = $('#applyingposition option:selected').attr('value');
		var firstname = $('#first-name').val();
		var lastname = $('#last-name').val();
		var emailid = $('#emailid').val();
		var phonenumber = $('#phone-number').val();
		var message = $('#applicant-message').val();
		var cvupload = $('#imgpreview').attr("imgname");
		if(selectyourstate == ''){
			selectyourstaten = '0';
		}else{
			selectyourstaten = '1';
		}
		if($.trim(firstname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>First Name</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(lastname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Last Name</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(emailid).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Email ID</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(phonenumber).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Phone Number</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(message).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Message</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(cvupload).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Resume</b> not attached!');
		 $('#add-top-menu').focus();
	    }else{
	    	var postData=JSON.stringify({"applyingposition": selectyourstate,  "firstname": firstname,  "lastname": lastname,   "emailid": emailid,   "phonenumber": phonenumber,   "message": message, "cvupload": cvupload, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Submission Successfull');
                        $("#lightbox_content").html(data.output);
                        $('input,textarea,select').val('');
						// var dash = $.web_url +""+data.url;
						// window.setTimeout(function(){
						// 	$(location).attr('href', dash).fadeTo(200, 0.5);
						// 	},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
				}
			});
	    }
	});	
	$(document).on('click', '#submitfranchise', function()
	{
		//alert('reacgung here');
		var mobileverified = $(this).attr('mobileverified');
		var inform = $(this).attr('inform');
		var selectyourstate = $('#select-your-state option:selected').attr('value');
		var selectyourcities = $('#select-your-cities option:selected').attr('value');
		var applyname = $('input:text[name="name"]').val();
		var applyemailid = $('input:text[name="email"]').val();
		var wheredoyoustay = $('input:text[name="where-do-you-stay"]').val();
		var selectyourcitystay = $('#select-your-city-stay option:selected').attr('value');
		var howyouknowjumboking = $('#how-you-know-jumboking option:selected').attr('value');
		var preffereddcallbackdate = $('input:text[name="prefferedd-call-back-date"]').val();
		var preffereddcallbacktime = $('#prefferedd-call-back-time option:selected').attr('value');
		var applymobile = $('input:text[name="mobile"]').val();
		if(selectyourstate == ''){
			selectyourstaten = '0';
		}else{
			selectyourstaten = '1';
		}
		if(selectyourcities == ''){
			selectyourcitiesn = '0';
		}else{
			selectyourcitiesn = '1';
		}
		if(howyouknowjumboking == ''){
			howyouknowjumbokingn = '0';
		}else{
			howyouknowjumbokingn = '1';
		}
		if(preffereddcallbacktime == ''){
			preffereddcallbacktimen = '0';
		}else{
			preffereddcallbacktimen = '1';
		}
		if(wheredoyoustay == ''){
			var wheredoyoustayn = selectyourcitystay;
		}else{
			var wheredoyoustayn = wheredoyoustay;
		}
		//alert('reacgung here 3');
		if(mobileverified == 0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Mobile Verification Error');
		 $('#lightbox_content').html('Error: <b>Mobile number</b> is not verified yet!');
		 $('#add-top-menu').focus();
	    }else if(selectyourstaten == 0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Select your state</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if(selectyourcitiesn == 0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Select your city</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(applyname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Your Name</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(applyemailid).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Your Email id</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if(howyouknowjumbokingn == 0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>How you know jumboking ?</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(preffereddcallbackdate).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Select your Call Back date</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if(preffereddcallbacktimen == 0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Select your  Call Back time</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(applymobile).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Mobile Number</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else{
	    	//alert('reacgung here 2');
	    	var postData=JSON.stringify({"selectyourstate": selectyourstate,  "selectyourcities": selectyourcities, "howyouknowjumboking": howyouknowjumboking,  "preffereddcallbackdate": preffereddcallbackdate,   "preffereddcallbacktime": preffereddcallbacktime,   "applymobile": applymobile,   "applyname": applyname, "applyemailid": applyemailid, "wheredoyoustay": wheredoyoustayn, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Submission Successfull');
                        $("#lightbox_content").html(data.output);
                        $('input,textarea,select').val('');
						// var dash = $.web_url +""+data.url;
						// window.setTimeout(function(){
						// 	$(location).attr('href', dash).fadeTo(200, 0.5);
						// 	},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
				}
			});
	    }
		//alert(productname);

	});
	$(document).on('click', '#sendotp', function()
	{
		var inform = $(this).attr("inform");
		var mobile = $('#reg_mobile').val();
		if($.trim(mobile).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Mobile number</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else{
	    	var postData=JSON.stringify({"mobile": mobile, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"send-otp",
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$('#verify_mobile_box').css({"display": ""}).css({"display": "block"});
						$('.resendotp').css({"display": ""}).css({"display": "block"});
						$('#reg_mobile').attr('disabled', 'disabled');
						$('.sendotp').css({"display": ""}).css({"display": "block"}).attr('inform', 'verifyotp').attr('verid', data.verify_id).attr('id', 'verifyotp').html('Verify OTP');
					}else if(data.success == false){
						alert('not success');
				}else{}
			}
		});
	    }
	});
	$(document).on('click', '#verifyotp', function()
	{
		var inform = $(this).attr("inform");
		var otp = $('#reg_mobile_verify').val();
		var verid = $(this).attr("verid");
		if($.trim(otp).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>OTP</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else{
	    	var postData=JSON.stringify({"otp": otp, "verid": verid, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"verify-otp",
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$('#verify_mobile_box').css({"display": ""}).css({"display": "none"});
						$('#verifyotp').css({"display": ""}).css({"display": "none"});
						$('#reg_mobile').attr('disabled', 'disabled');
						$("#lightbox").show();
                        $("#lightbox_heading").html('Verified Successfully');
                        $("#lightbox_content").html(data.message);
                        $('#reg_mobile_verify').val('');
                        $('.resendotp').css({"display": ""}).css({"display": "none"});
                        $('#submitfranchise').attr('mobileverified', '').attr('mobileverified', '1');
					}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Not Verified');
                        $("#lightbox_content").html(data.message);
                        $('#reg_mobile_verify').val('');
                        $('.resendotp').css({"display": ""}).css({"display": "block"});
                        $('#verify_mobile_box').css({"display": ""}).css({"display": "block"});
                        $('.sendotp').css({"display": ""}).css({"display": "none"});
                        $('#verify_mobile_box').css({"display": ""}).css({"display": "none"})
				}else{}
			}
		});
	    }
	});
	$(document).on('click', '#add-product', function()
	{
		var mainproducttypeid = $('#mainproducttypeid option:selected').attr('value');
	    var productname = $('#product-name').val();
		var productdescription = $('#product-description').val();
		var pimg = $('#imgpreview').attr("imgname");
		var inform = $(this).attr("inform");
		if(mainproducttypeid == ''){
			mainmenuidn = '0';
		}else{
			mainmenuidn = '1';
		}
		if($.trim(mainmenuidn).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Product Type</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(productname).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Product name</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(productdescription).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Product description</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else if($.trim(pimg).length==0){
		 $('#lightbox').show().fadeIn(2000);
		 $('#lightbox_heading').html('Some Error');
		 $('#lightbox_content').html('Error: <b>Coverage Image</b> field should not be empty!');
		 $('#add-top-menu').focus();
	    }else{
	    	var postData=JSON.stringify({"mainproducttypeid": mainmenuidn, "productname": productname, "productdescription": productdescription, "pimg": pimg, "action": inform});
	    	$.ajax({  
			type: "POST",  
			url: $.web_url+"includes/core/core"+$.extn,
			dataType: 'JSON', //this is what we expect our returned data as  
			data: {data:postData},
			cache: false,  
			success: function(data)
				{
					if(data.success == true){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Redirceting Top menu List');
                        $("#lightbox_content").html(data.output);
						var dash = $.web_url +""+data.url;
						window.setTimeout(function(){
							$(location).attr('href', dash).fadeTo(200, 0.5);
							},500);
						}else if(data.success == false){
						$("#lightbox").show();
                        $("#lightbox_heading").html('Error');
                        $("#lightbox_content").html(data.output);
						$('input').val('');
				        }else{}
			}
		});
	    }
	});
	$('body').on('change','#photoimg', function()
	{
		$("#preview").html('');
		$("#preview").html('<img src="'+$.web_url +'assets/images/loader.gif" alt="Uploading...."/>');
		$("#cropimage").ajaxForm({target: '#preview',
		beforeSubmit:function(){},
		success:function(){
		$("#browsebt").hide();
		},
		error:function(){

		} }).submit();
	});
});// JavaScript Document