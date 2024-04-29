function validateform(){  
    // var fname=document.regForm.fname.value; 
    // var lname=document.regForm.lname.value;  

    // var password=document.regForm.password.value;  
      
    // if (fname==null || fname=="" || lname==null || lname==""){  
    //   alert("Name can't be blank");  
    //   return false;  
    // }else if(password.length<6){  
    //   alert("Password must be at least 6 characters long.");  
    //   return false;  
    //   }  
    // }  


var uname = document.getElementById("uname").value;
var upwd = document.getElementById("upwd").value;
var uemail = document.getElementById("uemail").value;

(uname = "" || uname == null) ? alert("Name can't be blank") : false;

}