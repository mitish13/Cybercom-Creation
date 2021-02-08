const form=document.getElementById("form");
const uname=document.getElementById('nameUser');
const email=document.getElementById('emailUser');
const phone=document.getElementById('phoneUser');
const title=document.getElementById('titleUser');
const formField=document.getElementsByClassName('formField');

var errDiv=document.createElement('div');

form.addEventListener('submit',validate);

//function to get error msg
function errMsg(msg,num){

    errDiv=document.createElement('div');
    errDiv.setAttribute("id",num);
    var errMsg=document.createTextNode(msg);
    errDiv.appendChild(errMsg); 
    errDiv.style.color="red";
    errDiv.style.fontWeight="bold"
    formField.item(num).appendChild(errDiv);
}       


function validate(e){
    name_validate(e);
    email_validate(e);
    phone_validate(e);
    title_validate(e);

}
function removeErr(id){
    
    var getDiv=document.getElementById(id);
    getDiv.style.display="none";

}

function name_validate(e){
    let isError=false
    if(uname.value==""){
        e.preventDefault();

        isError=true;
        errMsg("Name can't be empty",0);    
    }else if(isError){
       removeErr(0);
    }
}
function email_validate(e){
    var mailformat =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let isError=false;
    if(!email.value.match(mailformat)){
        e.preventDefault();

        isError=true;
        errMsg("You have entered invalid email",1);
    }
    else if(isError){
        removeErr(1);
    }
}

function phone_validate(e){
    var phoneno = /^\d{10}$/;
    let isError=false;
    if(!phone.value.match(phoneno)){
        e.preventDefault();

        isError=true;
        errMsg("Please enter valid mobile number",2)
    }
    else if(isError){
        removeErr(2);
    }
}

function title_validate(e){
    let isError=false;
    if(title.value==""){
        e.preventDefault();

        isError=true;
        errMsg("Title can't be empty",3);
    }
    else if(isError){
        removeErr(3);
    }
}