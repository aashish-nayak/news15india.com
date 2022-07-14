$(document).ready(function(){ 
let path = window.location.pathname;
let page = path.split("/").pop();

//check server error
let login_msg_container = $("#login-msg-container");
let login_msg_container_text = $("#login-msg-text");

let signup_msg_container = $("#signup-msg-container");
let signup_msg_container_text = $("#signup-msg-text");

function checkServerErrror(value_1, value_2, msg){
 if(value_1 == value_2){
    login_msg_container.show();
    login_msg_container.attr("class", "alert alert-danger text-center");
    login_msg_container_text.text(msg);
    return false; 
 }else{
    login_msg_container.hide();
    login_msg_container.attr("class", "");
    login_msg_container_text.text(""); 
    return true;
 }
}

function checkServerErrrorSignup(value_1, value_2, msg){
 if(value_1 == value_2){
    signup_msg_container.show();
    signup_msg_container.attr("class", "alert alert-danger text-center");
    signup_msg_container_text.text(msg);
    return false; 
 }else{
    signup_msg_container.hide();
    signup_msg_container.attr("class", "");
    signup_msg_container_text.text(""); 
    return true;
 }
}

function nextPrevButton(previd, nextid, data){
  let prevOffset = $(previd).data(data);
  let nextOffset = $(nextid).data(data);
  //console.log("prev : "+prevOffset+" next : "+nextOffset);
  if(prevOffset == 0){
     $(previd).hide();
  }else if(nextOffset == 0){
     $(nextid).hide(); 
  }else{
     $(previd).show();
     $(nextid).show();
  }
}

//user login script start here
$("#loginForm").on("submit", function(event){
	event.preventDefault();
	let mobile_no = $("#l_mobile").val();
	let l_password = $("#l_password").val();

	if(mobile_no.length !== 10){
	   $("#login-msg-container").show();
	   $("#login-msg-container").attr("class", "alert alert-danger text-center");
	   $("#login-msg-text").text("Only 10 Digits Mobile Number is Required...");
	   return false; 	
	}else{
	   $("#login-msg-container").hide();
	   $("#login-msg-container").attr("class", "");
	   $("#login-msg-text").text("");	
	}

	if(l_password.length <= 5){
	   $("#login-msg-container").show();
	   $("#login-msg-container").attr("class", "alert alert-danger text-center");
	   $("#login-msg-text").text("Password is Greter then 5 Digits...");
	   return false; 	
	}else{
	   $("#login-msg-container").hide();
	   $("#login-msg-container").attr("class", "");
	   $("#login-msg-text").text("");	
	}

	$.ajax({
	   url : "action.php",	
	   type : "POST",
	   data : {request : "user-login", mobile : mobile_no, password : l_password},

	   beforeSend : function(){
	     $("#login-button").attr("disabled", true);
	   },
	   success : function(responce){
	   	 $("#login-button").attr("disabled", false);
	   	 let res = JSON.parse(responce);
       console.log(responce);
       
	   	 if(checkServerErrror(res.error, "missmatched-mobile", res.msg) == false){
	   	 	checkServerErrror(res.error, "missmatched-mobile", res.msg);
	   	 }else if(checkServerErrror(res.error, "missmatched-password", res.msg) == false){
	   	 	checkServerErrror(res.error, "missmatched-password", res.msg);
	   	 }else{
            
            if(res.success == "user-login"){
               login_msg_container.show();
               login_msg_container.attr("class", "alert alert-success text-center");
               login_msg_container_text.text(res.msg);
               setTimeout(function(){
                 login_msg_container.hide();
                 login_msg_container.attr("class", "");
                 login_msg_container_text.text("");  
                 if(res.role == "admin"){
                    window.location.href = "admin-panel/dashboard.php"; 
                 }else{
                    window.location.href = "guest/dashboard.php";
                 }    
               }, 3000)
            }

	   	 }
	   	 
	   }

	});
});
//user login script ends here

//user signup script code start
$("#signup-form").on("submit", function(event){
  event.preventDefault();
  let form_data = new FormData(this);

  

  form_data.append("request", "user-signup");
  $.ajax({
     url: "action.php",
     type: "post",
     data: form_data,
     processData: false,
     contentType: false,
     cache: false,
     beforeSend: function(){},
     success: function(responce){
       
       let res = JSON.parse(responce);
       console.log(res);
       if(checkServerErrrorSignup(res.error, "email-error", res.msg) == false){
          checkServerErrrorSignup(res.error, "email-error", res.msg);
       }else if(checkServerErrrorSignup(res.error, "mobile-error", res.msg) == false){
          checkServerErrrorSignup(res.error, "mobile-error", res.msg);
       }else if(checkServerErrrorSignup(res.error, "pincode-error", res.msg) == false){
          checkServerErrrorSignup(res.error, "pincode-error", res.msg);
       }else if(checkServerErrrorSignup(res.error, "confirm-password-error", res.msg) == false){
          checkServerErrrorSignup(res.error, "confirm-password-error", res.msg);
       }else if(checkServerErrrorSignup(res.error, "email_exist", res.msg) == false){
          checkServerErrrorSignup(res.error, "email_exist", res.msg);
       }else if(checkServerErrrorSignup(res.error, "mobile_exist", res.msg) == false){
          checkServerErrrorSignup(res.error, "mobile_exist", res.msg);
       }else if(checkServerErrrorSignup(res.error, "incorrect_pincode", res.msg) == false){
          checkServerErrrorSignup(res.error, "incorrect_pincode", res.msg);
       }else if(checkServerErrrorSignup(res.error, "technical_error", res.msg) == false){
          checkServerErrrorSignup(res.error, "technical_error", res.msg);
       }else{

            if(res.success == "user_signup"){
               $("#signup-form")[0].reset();
               signup_msg_container.show();
               signup_msg_container.attr("class", "alert alert-success text-center");
               signup_msg_container_text.text(res.msg);
               setTimeout(function(){
                 signup_msg_container.hide();
                 signup_msg_container.attr("class", "");
                 signup_msg_container_text.text("");   
               }, 3000)
            }

       }

     }
  });

}); 
//user signup script code Ends

//----------------Subscription Code Start HERE------------------------
$(document).on("submit", ".subscribe_form", function(event){
  event.preventDefault();
  let email = $(".subscribe_email").val();
  let email_footer = $(".subscribe_email_footer").val();
  if(email == "" && email_footer == ""){
     alert("Please Enter Your Email Address..."); 
  }else{
     let main_email;
     if(email_footer !== ""){
        main_email = email_footer;
     }else{
        main_email = email;
     }
     $.ajax({
         url : "action.php",
         type : "post",
         data : {request:"user_subscribe", email:main_email},
         success : function(responce){
           window.alert(responce);
           $(".subscribe_form")[0].reset();
           $(".subscribe_email_footer").val("");
         }
     });
  }
});
//----------------Subscription Code ends HERE------------------------

//-------------Category page Middle Content code start----------------
function fetch_category_pagination_data(url, page = null){
    let split_url = url.split("=");
    let get_last = split_url[split_url.length - 1];
    console.log(get_last);
    if(get_last !== ""){
       $.ajax({
          url  : "test-pagination.php",
          type : "post",
          data : {request : "fetch-category", url : get_last, page : page},
          success : function(responce){
             let res = JSON.parse(responce);
             // console.log(res.page_number);
             // console.log("\n");
             // console.log(res);
             $("#display-category-pagination-data").html(res.output);
             $("#display-pagination").html(res.pagination);
          }
       });
    }
}

if(page === "category.php"){
    const url = window.location.search;
    fetch_category_pagination_data(url, null);   

    $(document).on("click", "#page_no", function(){
      let page_number = $(this).data("requestpagenumber");
      // alert(page_number);
      fetch_category_pagination_data(url, page_number);
    });
}


//------------Category page Middle Content code Ends-------------

//-----------------------------News Section 1 Code START Here---------------------------
nextPrevButton("#secOnePrev", "#secOneNext", "seconeoffset");
//Previous Button Code
$("#secOnePrev").on("click", function(){
  let prevOffset = $("#secOnePrev").data("seconeoffset");
  //window.alert(prevOffset);
  $.ajax({
      url : "action.php",
      type : "POST",
      data : {request : "sectionOnePrevData", offset : prevOffset},
      success : function(responce){
      	let res = JSON.parse(responce);
        //console.log(res);
        $("#secOnePrev").data("seconeoffset", res.prevOffset); 
        $("#secOneNext").data("seconeoffset", res.nextOffset); 
        $("#section-1-big-box").html(res.bigBox);
        $("#section-1-bottom-box").html(res.bottomBox);
        nextPrevButton("#secOnePrev", "#secOneNext", "seconeoffset");	
      }
  });
});
//Next Button Code
$("#secOneNext").on("click", function(){
  let nextOffset = $("#secOneNext").data("seconeoffset");
  //window.alert(nextOffset);
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "sectionOneNextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res); 
      $("#secOnePrev").data("seconeoffset", res.prevOffset); 
      $("#secOneNext").data("seconeoffset", res.nextOffset);
      $("#section-1-big-box").html(res.bigBox);
      $("#section-1-bottom-box").html(res.bottomBox);
      nextPrevButton("#secOnePrev", "#secOneNext", "seconeoffset");
    } 
  });  
});
//section1 sidebar code start
nextPrevButton("#secOneSidePrev", "#secOneSideNext", "seconesideoffset");
//Sidebar Next Button
$("#secOneSideNext").on("click", function(){
  let nextOffset = $(this).data("seconesideoffset");
  //alert(nextOffset);
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "sect1NextData", offset : nextOffset},
       success : function(responce){ 
         res = JSON.parse(responce);
         //console.log(res);
         $("#secOneSidePrev").data("seconesideoffset", res.prevOffset); 
         $("#secOneSideNext").data("seconesideoffset", res.nextOffset);
         $("#section1_sidebar_display").html(res.output);
         nextPrevButton("#secOneSidePrev", "#secOneSideNext", "seconesideoffset");
       }
  });
});
// sidebar prev Button
$("#secOneSidePrev").on("click", function(){
  let prevOffset = $(this).data("seconesideoffset");
  //alert(prevOffset);
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "sect1PrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         //console.log(res);
         $("#secOneSidePrev").data("seconesideoffset", res.prevOffset); 
         $("#secOneSideNext").data("seconesideoffset", res.nextOffset);
         $("#section1_sidebar_display").html(res.output);

         nextPrevButton("#secOneSidePrev", "#secOneSideNext", "seconesideoffset");
       }
  });
});
//-----------------------------News Section 1 Code Ends Here---------------------------



//-----------------------------News Section 2 Code Start Here---------------------------
nextPrevButton("#section2PrevButton", "#section2NextButton", "sectowoffset");
//section 2 Next Button
$("#section2NextButton").on("click", function(){
  let nextOffset = $("#section2NextButton").data("sectowoffset");
  //alert(nextOffset);
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section2NextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res);
      $("#section2PrevButton").data("sectowoffset", res.prevOffset); 
      $("#section2NextButton").data("sectowoffset", res.nextOffset);
      $("#sec2FirstBlock").html(res.firstBlock);
      $("#sec2SecondBlock").html(res.secondBlock);
      $("#sec2ThirdBlock").html(res.thirdBlock);
      nextPrevButton("#section2PrevButton", "#section2NextButton", "sectowoffset");
    } 
  });  
});
//section2 Previous Button
$("#section2PrevButton").on("click", function(){
  let prevOffset = $("#section2PrevButton").data("sectowoffset");
  $.ajax({
      url : "action.php",
      type : "POST",
      data : {request : "section2PrevData", offset : prevOffset},
      success : function(responce){
        let res = JSON.parse(responce);
        //console.log(res);
        $("#section2PrevButton").data("sectowoffset", res.prevOffset); 
        $("#section2NextButton").data("sectowoffset", res.nextOffset);
        $("#sec2FirstBlock").html(res.firstBlock);
        $("#sec2SecondBlock").html(res.secondBlock);
        $("#sec2ThirdBlock").html(res.thirdBlock);
        nextPrevButton("#section2PrevButton", "#section2NextButton", "sectowoffset"); 
      }
  });
});

//Section2 Sidebar
nextPrevButton("#sec2SidebarPrev", "#sec2SidebarNext", "sectowsidebaroffset");
$("#sec2SidebarNext").on("click", function(){
  let nextOffset = $(this).data("sectowsidebaroffset");
  // alert(nextOffset);
  // return false;
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section2SidebarNextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      $("#sec2SidebarPrev").data("sectowsidebaroffset", res.prevOffset); 
      $("#sec2SidebarNext").data("sectowsidebaroffset", res.nextOffset);
      $("#section2SidebarDisplay").html(res.output);
      nextPrevButton("#sec2SidebarPrev", "#sec2SidebarNext", "sectowsidebaroffset");
    } 
  });  
});
$("#sec2SidebarPrev").on("click", function(){
  let prevOffset = $(this).data("sectowsidebaroffset");
  // alert(prevOffset);
  // return false;
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section2SidebarPrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         //console.log(res);
         $("#sec2SidebarPrev").data("sectowsidebaroffset", res.prevOffset); 
         $("#sec2SidebarNext").data("sectowsidebaroffset", res.nextOffset);
         $("#section2SidebarDisplay").html(res.output);
         nextPrevButton("#sec2SidebarPrev", "#sec2SidebarNext", "sectowsidebaroffset");
       }
  });
});

//-----------------------------News Section 2 Code Ends Here---------------------------

//-----------------------------News Section 3 Code start Here---------------------------
nextPrevButton("#section3PrevButton", "#section3NextButton", "secthreeoffset");
//section3 Next Button
$("#section3NextButton").on("click", function(){
  let nextOffset = $("#section3NextButton").data("secthreeoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section3NextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res);
      $("#section3PrevButton").data("secthreeoffset", res.prevOffset); 
      $("#section3NextButton").data("secthreeoffset", res.nextOffset);
      $("#section3firstblock").html(res.firstBlock);
      $("#section3secondblock").html(res.secondBlock);
      nextPrevButton("#section3PrevButton", "#section3NextButton", "secthreeoffset");
    } 
  });  
});

$("#section3PrevButton").on("click", function(){
  let prevOffset = $(this).data("secthreeoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section3PrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         $("#section3PrevButton").data("secthreeoffset", res.prevOffset); 
         $("#section3NextButton").data("secthreeoffset", res.nextOffset);
         $("#section3firstblock").html(res.firstBlock);
         $("#section3secondblock").html(res.secondBlock);
         nextPrevButton("#section3PrevButton", "#section3NextButton", "secthreeoffset");
       }
  });
});
//-----------------------------News Section 3 Code ends Here---------------------------

//-----------------------------News Section 5 Code Start Here---------------------------
// Section5 Right Sidebar data
nextPrevButton("#section5RightPrevButton", "#section5RightNextButton", "secfiverightoffset");
$("#section5RightNextButton").on("click", function(){
  let nextOffset = $(this).data("secfiverightoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section5RightNextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res);
      $("#section5RightPrevButton").data("secfiverightoffset", res.prevOffset); 
      $("#section5RightNextButton").data("secfiverightoffset", res.nextOffset);
      $("#section5_right_firstblock").html(res.firstBlock);
      $("#section5_right_secondblock").html(res.secondBlock);
      $("#section5_right_thirdblock").html(res.thirdBlock);
      $("#section5_right_fourthblock").html(res.fourthBlock);
      nextPrevButton("#section5RightPrevButton", "#section5RightNextButton", "secfiverightoffset");
    } 
  });  
});
$("#section5RightPrevButton").on("click", function(){
  let prevOffset = $(this).data("secfiverightoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section5RightPrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         console.log(responce);
         $("#section5RightPrevButton").data("secfiverightoffset", res.prevOffset); 
         $("#section5RightNextButton").data("secfiverightoffset", res.nextOffset);
         $("#section5_right_firstblock").html(res.firstBlock);
         $("#section5_right_secondblock").html(res.secondBlock);
         $("#section5_right_thirdblock").html(res.thirdBlock);
         $("#section5_right_fourthblock").html(res.fourthBlock);
         nextPrevButton("#section5RightPrevButton", "#section5RightNextButton", "secfiverightoffset");
       }
  });
});

// Section5 Left Sidebar data
nextPrevButton("#section5LeftPrevButton", "#section5LeftNextButton", "secfiveleftoffset");
$("#section5LeftNextButton").on("click", function(){
  let nextOffset = $(this).data("secfiveleftoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section5LeftNextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res);
      $("#section5LeftPrevButton").data("secfiveleftoffset", res.prevOffset); 
      $("#section5LeftNextButton").data("secfiveleftoffset", res.nextOffset);
      $("#section5leftsidebardatadisplay").html(res.output);
      nextPrevButton("#section5LeftPrevButton", "#section5LeftNextButton", "secfiveleftoffset");
    } 
  });  
});
$("#section5LeftPrevButton").on("click", function(){
  let prevOffset = $(this).data("secfiveleftoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section5LeftPrevData", offset : prevOffset},

       success : function(responce){
         res = JSON.parse(responce);
         console.log(responce);
         $("#section5LeftPrevButton").data("secfiveleftoffset", res.prevOffset); 
         $("#section5LeftNextButton").data("secfiveleftoffset", res.nextOffset);
         $("#section5leftsidebardatadisplay").html(res.output);
         nextPrevButton("#section5LeftPrevButton", "#section5LeftNextButton", "secfiveleftoffset");
       }
  });
});
//-----------------------------News Section 5 Code Ends Here---------------------------

//-----------------------------News Section 6 Code Start Here---------------------------
nextPrevButton("#section6PrevButton", "#section6NextButton", "secsixoffset");
$("#section6NextButton").on("click", function(){
  let nextOffset = $(this).data("secsixoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section6NextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      $("#section6PrevButton").data("secsixoffset", res.prevOffset); 
      $("#section6NextButton").data("secsixoffset", res.nextOffset);
      $("#section6_first_block_display_data").html(res.firstBlock);
      $("#section6_second_block_display_data").html(res.secondBlock);
      $("#section6_third_block_display_data").html(res.thirdBlock);
      $("#section6_fourth_block_display_data").html(res.fourthBlock);
      $("#section6_five_block_display_data").html(res.fifthBlock);
      nextPrevButton("#section6PrevButton", "#section6NextButton", "secsixoffset");
    } 
  });  
});
//-----------------------------News Section 6 Code Start Here---------------------------

//-----------------------------News Section 7 Code Start Here---------------------------
nextPrevButton("#section7PrevButton", "#section7NextButton", "secsevenoffset");
$("#section7NextButton").on("click", function(){
  let nextOffset = $(this).data("secsevenoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section7NextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res);
      $("#section7PrevButton").data("secsevenoffset", res.prevOffset); 
      $("#section7NextButton").data("secsevenoffset", res.nextOffset);
      $("#section7_first_block_display_data").html(res.firstBlock);
      $("#section7_second_block_display_data").html(res.secondBlock);
      $("#section7_third_block_display_data").html(res.thirdBlock);
      $("#section7_fourth_block_display_data").html(res.fourthBlock);
      nextPrevButton("#section7PrevButton", "#section7NextButton", "secsevenoffset");
    } 
  });  
});
$("#section7PrevButton").on("click", function(){
  let prevOffset = $(this).data("secsevenoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section7PrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         //console.log(res);
         $("#section7PrevButton").data("secsevenoffset", res.prevOffset); 
         $("#section7NextButton").data("secsevenoffset", res.nextOffset);
         $("#section7_first_block_display_data").html(res.firstBlock);
         $("#section7_second_block_display_data").html(res.secondBlock);
         $("#section7_third_block_display_data").html(res.thirdBlock);
         $("#section7_fourth_block_display_data").html(res.fourthBlock);
         nextPrevButton("#section7PrevButton", "#section7NextButton", "secsevenoffset");
       }
  });
});
//-----------------------------News Section 7 Code Start Here---------------------------

//-----------------------------News Section 8 Code Start Here---------------------------
nextPrevButton("#section8PrevButton", "#section8NextButton", "seceightoffset");
$("#section8NextButton").on("click", function(){
  let nextOffset = $(this).data("seceightoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section8NextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      console.log(res);
      $("#section8PrevButton").data("seceightoffset", res.prevOffset); 
      $("#section8NextButton").data("seceightoffset", res.nextOffset);
      $("#section8_data_display").html(res.output);
      nextPrevButton("#section8PrevButton", "#section8NextButton", "seceightoffset");
    } 
  });  
});
$("#section8PrevButton").on("click", function(){
  let prevOffset = $(this).data("seceightoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section8PrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         console.log(res);
         $("#section8PrevButton").data("seceightoffset", res.prevOffset); 
         $("#section8NextButton").data("seceightoffset", res.nextOffset);
         $("#section8_data_display").html(res.output);
         nextPrevButton("#section8PrevButton", "#section8NextButton", "seceightoffset");
       }
  });
});

//First Block
nextPrevButton("#section8FirstBlockPrevButton", "#section8FirstBlockNextButton", "seceightfirstblockoffset");
$("#section8FirstBlockNextButton").on("click", function(){
  let nextOffset = $(this).data("seceightfirstblockoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section8FirstBlockNextData", offset : nextOffset},
    success : function(responce){
      //console.log(responce);
      let res = JSON.parse(responce);
      $("#section8FirstBlockPrevButton").data("seceightfirstblockoffset", res.prevOffset); 
      $("#section8FirstBlockNextButton").data("seceightfirstblockoffset", res.nextOffset);
      $("#section8_firstblock_data").html(res.output);
      nextPrevButton("#section8FirstBlockPrevButton", "#section8FirstBlockNextButton", "seceightfirstblockoffset");
    } 
  });  
});
$("#section8FirstBlockPrevButton").on("click", function(){
  let prevOffset = $(this).data("seceightfirstblockoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section8FirstBlockPrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         $("#section8FirstBlockPrevButton").data("seceightfirstblockoffset", res.prevOffset); 
         $("#section8FirstBlockNextButton").data("seceightfirstblockoffset", res.nextOffset);
         $("#section8_firstblock_data").html(res.output);
         nextPrevButton("#section8FirstBlockPrevButton", "#section8FirstBlockNextButton", "seceightfirstblockoffset");
       }
  });
});

//Second Block
nextPrevButton("#section8SecondBlockPrevButton", "#section8SecondBlockNextButton", "seceightsecondblockoffset");
$("#section8SecondBlockNextButton").on("click", function(){
  let nextOffset = $(this).data("seceightsecondblockoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section8SecondBlockNextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res);
      $("#section8SecondBlockPrevButton").data("seceightsecondblockoffset", res.prevOffset); 
      $("#section8SecondBlockNextButton").data("seceightsecondblockoffset", res.nextOffset);
      $("#section8_secondblock_data").html(res.output);
      nextPrevButton("#section8SecondBlockPrevButton", "#section8SecondBlockNextButton", "seceightsecondblockoffset");
    } 
  });  
});
$("#section8SecondBlockPrevButton").on("click", function(){
  let prevOffset = $(this).data("seceightsecondblockoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section8SecondBlockPrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         $("#section8SecondBlockPrevButton").data("seceightsecondblockoffset", res.prevOffset); 
         $("#section8SecondBlockNextButton").data("seceightsecondblockoffset", res.nextOffset);
         $("#section8_secondblock_data").html(res.output);
         nextPrevButton("#section8SecondBlockPrevButton", "#section8SecondBlockNextButton", "seceightsecondblockoffset");
       }
  });
});

//Second Block
nextPrevButton("#section8thirdBlockPrevButton", "#section8thirdBlockNextButton", "seceightthirdblockoffset");
$("#section8thirdBlockNextButton").on("click", function(){
  let nextOffset = $(this).data("seceightthirdblockoffset");
  $.ajax({
    url : "action.php",
    type : "POST",
    data : {request : "section8ThirdBlockNextData", offset : nextOffset},
    success : function(responce){
      let res = JSON.parse(responce);
      //console.log(res);
      $("#section8thirdBlockPrevButton").data("seceightthirdblockoffset", res.prevOffset); 
      $("#section8thirdBlockNextButton").data("seceightthirdblockoffset", res.nextOffset);
      $("#section8_thirdblock_data").html(res.output);
      nextPrevButton("#section8thirdBlockPrevButton", "#section8thirdBlockNextButton", "seceightthirdblockoffset");
    } 
  });  
});
$("#section8thirdBlockPrevButton").on("click", function(){
  let prevOffset = $(this).data("seceightthirdblockoffset");
  $.ajax({
       url : "action.php",
       type : "POST",
       data : {request : "section8ThirdBlockPrevData", offset : prevOffset},
       success : function(responce){
         res = JSON.parse(responce);
         $("#section8thirdBlockPrevButton").data("seceightthirdblockoffset", res.prevOffset); 
         $("#section8thirdBlockNextButton").data("seceightthirdblockoffset", res.nextOffset);
         $("#section8_thirdblock_data").html(res.output);
         nextPrevButton("#section8thirdBlockPrevButton", "#section8thirdBlockNextButton", "seceightthirdblockoffset");
       }
  });
});

//-----------------------------News Section 8 Code Start Here---------------------------


});//end document