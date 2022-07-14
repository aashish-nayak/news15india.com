$(document).ready(function(){ 
//check server error
let login_msg_container = $("#login-msg-container");
let login_msg_container_text = $("#login-msg-text");

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

function nextPrevButton(previd, nextid, data){
  let prevOffset = $(previd).data(data);
  let nextOffset = $(nextid).data(data);
  if(prevOffset == 0){
     $(previd).hide();
  }else if()
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
                 	window.location.href = "reporter-panel/dashboard.php";
                 }    
               }, 3000)
            }

	   	 }
	   	 
	   }

	});
});
//user login script ends here

//News Section 1 Code Start Here
let prevOffset = $("#secOnePrev").data("seconeoffset");
let nextOffset = $("#secOneNext").data("seconeoffset");
//console.log("prev : "+prevOffset+" next : "+nextOffset);
if(prevOffset == 0){
   $("#secOnePrev").hide();	
}else if($nextOffset == 0){
   $("#secOneNext").hide();
}else{
   $("#secOnePrev").show();
   $("#secOneNext").show();	 
}
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

        let prev = $("#secOnePrev").data("seconeoffset");
	    let next = $("#secOneNext").data("seconeoffset");
	    //console.log("prev : "+prev+" next : "+next);
	    if(prev == 0){
		   $("#secOnePrev").hide();	
		}else if(next == 0){
		   $("#secOneNext").hide();
		}else{
		   $("#secOnePrev").show();
		   $("#secOneNext").show();	 
		}	
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
      
      let prev = $("#secOnePrev").data("seconeoffset");
	  let next = $("#secOneNext").data("seconeoffset");
	  //console.log("prev : "+prev+" next : "+next);
      if(prev == 0){
	     $("#secOnePrev").hide();	
	  }else if(next == 0){
	     $("#secOneNext").hide();
	  }else{
	     $("#secOnePrev").show();
	     $("#secOneNext").show();	 
	  }
    } 
  });  
});

//section1 sidebar code start
let secOneSidePrev = $("#secOneSidePrev").data("seconesideoffset");
let secOneSideNext = $("#secOneSideNext").data("seconesideoffset");
//console.log("prev : "+secOneSidePrev+" next : "+secOneSideNext);
if(secOneSidePrev == 0){
   $("#secOneSidePrev").hide();	
}else if(secOneSideNext == 0){
   $("#secOneSideNext").hide();
}else{
   $("#secOneSidePrev").show();
   $("#secOneSideNext").show();	
}

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
         console.log(res);
         $("#secOneSidePrev").data("seconesideoffset", res.prevOffset); 
         $("#secOneSideNext").data("seconesideoffset", res.nextOffset);
         $("#section1_sidebar_display").html(res.output);

        let secOneSidePrev = $("#secOneSidePrev").data("seconesideoffset");
    		let secOneSideNext = $("#secOneSideNext").data("seconesideoffset");
    		//console.log("prev : "+secOneSidePrev+" next : "+secOneSideNext);
    		if(secOneSidePrev == 0){
    		   $("#secOneSidePrev").hide();	
    		}else if(secOneSideNext == 0){
    		   $("#secOneSideNext").hide();
    		}else{
    		   $("#secOneSidePrev").show();
    		   $("#secOneSideNext").show();	
    		} 

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
         // console.log(responce);
         // return false;
         res = JSON.parse(responce);
         //console.log(res);
         $("#secOneSidePrev").data("seconesideoffset", res.prevOffset); 
         $("#secOneSideNext").data("seconesideoffset", res.nextOffset);
         $("#section1_sidebar_display").html(res.output);

        let secOneSidePrev = $("#secOneSidePrev").data("seconesideoffset");
    		let secOneSideNext = $("#secOneSideNext").data("seconesideoffset");
    		//console.log("prev : "+secOneSidePrev+" next : "+secOneSideNext);
    		if(secOneSidePrev == 0){
    		   $("#secOneSidePrev").hide();	
    		}else if(secOneSideNext == 0){
    		   $("#secOneSideNext").hide();
    		}else{
    		   $("#secOneSidePrev").show();
    		   $("#secOneSideNext").show();	
    		} 

       }
  });
});
//News Section 1 Code Ends Here

//News Section 2 Code START Here
let sec2PrevOffset = $("#section2PrevButton").data("sectowoffset");
let sec2NextOffset = $("#section2NextButton").data("sectowoffset");
console.log("prev : "+sec2PrevOffset+" next : "+sec2NextOffset);
if(sec2PrevOffset == 0){
   $("#section2PrevButton").hide(); 
}else if($sec2NextOffset == 0){
   $("#section2NextButton").hide();
}else{
   $("#section2PrevButton").show();
   $("#section2NextButton").show();  
}




//News Section 2 Code ENDS Here
});