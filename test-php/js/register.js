const form=document.getElementById("registerform");
const prefix=document.getElementById('prefix'); //already mr. is checked
const fname=document.getElementById('fname');
const lname=document.getElementById('lname');
const email=document.getElementById('email');
const mobile=document.getElementById('mobile');
const password=document.getElementById('password');
const cpassword=document.getElementById('cpassword');
const information=document.getElementById('information');
const checkbox=document.getElementById('checkbox');
const formField=document.getElementsByClassName('formField');


form.addEventListener('submit',validate);


function validate(e){
    
    fname_validate(e);
    lname_validate(e);
    email_validate(e);
    mobileNum_validate(e);
    password_validate(e);
    cpassword_validate(e);
    information_validate(e);
    checkbox_validate(e);

}

function errMsg(msg,num){

    errDiv=document.createElement('div');
    errDiv.setAttribute("class",num);
    var errMsg=document.createTextNode(msg);
    errDiv.appendChild(errMsg); 
    errDiv.style.color="red";
    errDiv.style.fontWeight="bold"
    formField.item(num).appendChild(errDiv);
}       

function removeErr(id){
    
    var getDiv=document.getElementsByClassName(id);
    for(var i=0;i<getDiv.length;i++){
        getDiv[i].remove();
    }
}

    
function fname_validate(e){
    let isError=false
    if(fname.value==""){
        e.preventDefault();

        isError=true;
        errMsg("First name can't be empty",0);    
    }else{
       removeErr(0);
    }
}
function lname_validate(e){
    let isError=false
    if(fname.value==""){
        e.preventDefault();

        isError=true;
        errMsg("Last name can't be empty",1);    
    }else {
       removeErr(1);
    }
}


function email_validate(e){
    var mailformat =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let isError=false;
    if(!email.value.match(mailformat)){
        e.preventDefault();

        isError=true;
        errMsg("You have entered invalid email",2);
    }
    else{
        removeErr(2);
    }
}

function mobileNum_validate(e){
    var phoneno = /^\d{10}$/;
    let isError=false;
    if(!mobile.value.match(phoneno)){
        e.preventDefault();

        isError=true;
        errMsg("Please enter valid mobile number",3)
    }
    else {
        removeErr(3);
    }

}

function password_validate(e){
    let isError=false
    if(password.value.length<6){
        e.preventDefault();

        isError=true;
        errMsg("Password should have atleast 6 characters",4);    
    }else{
       removeErr(4);
    }
}
function cpassword_validate(e){
    let isError=false
    if(password.value!==cpassword.value){
        e.preventDefault();

        isError=true;
        errMsg("Password is not matching",5);    
    }else {
       removeErr(5);
    }
}

function information_validate(e){
    let isError=false
    if(information.value==""){
        e.preventDefault();

        isError=true;
        errMsg("Information name can't be empty",6);    
    }else{
       removeErr(6);
    }
}
function checkbox_validate(e){
    let isError=false
    if(!checkbox.checked){
        e.preventDefault();
        isError=true;
        errMsg('Please check the box to proceed',7);

    }
    else{

        removeErr(7);
    }
}      