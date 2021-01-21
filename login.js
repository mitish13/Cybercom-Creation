const email=document.getElementById('email');
const password=document.getElementById('password');
const login=document.getElementById('login');
const form=document.getElementById('form');

form.addEventListener('submit',validateAdmin);
var isAdmin=false
var isUser=false;


function validateAdmin(e){
    e.preventDefault();
    const adminData=JSON.parse(localStorage.getItem('admin'));
    const userData=JSON.parse(localStorage.getItem('users'));
    
    // admin validation
    const emailAdmin=adminData.email;
    const passwordAdmin=adminData.password;

    //users
    const uEmail=[];
    const uPass=[];

   userData.forEach((elem)=>{
       uEmail.push(elem.userEmail);
       uPass.push(elem.userPassword);
   })
   
    ifAdmin(emailAdmin,passwordAdmin);

    ifUser(uEmail,uPass);

   if(!isAdmin && !isUser){
    var p=document.createElement('p');
    p.innerHTML="Wrong input";
    form.appendChild(p);    
   
   }
  

}
function ifAdmin(emailAdmin,passwordAdmin){
    if(email.value===emailAdmin && password.value===passwordAdmin){
        isAdmin=true;
        window.location.href="admin/index.htm";

    }
    else {
        isAdmin=false;
    }
    
    
}

function ifUser(uEmail,uPass){
    for(var i=0;i<uEmail.length;i++){
        
        if(email.value===uEmail[i]){
            console.log("mail match");
            if(password.value==uPass[i]){
                console.log(uPass[i]);
                isUser=true;
                window.location.href="subUser.htm";
            }
        }

       
       

    }
}

