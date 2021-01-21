const uname=document.getElementById('uname');
const email=document.getElementById('email');
const password=document.getElementById('password');
const rePassword=document.getElementById('repass');
const state=document.getElementById('state');
const city=document.getElementById('city');
const btn=document.getElementById('btn');


const form=document.getElementById('form');

form.addEventListener('submit',validate);

window.onload=(()=>{

    if(localStorage.getItem('admin')){
        btn.disabled=true;
    }

    // localStorage.removeItem('admin')

})

function validate(e){
    e.preventDefault();

    if(password.value!==rePassword.value){

        const p=document.createElement('p');
        const pText=document.createTextNode('Password not matched');
        p.appendChild(pText);
        form.appendChild(p);
    }
    else{
        
        const adminData=new CreateObj();
        storeData(adminData);
    }
}
function CreateObj(){
    this.uname=uname.value;
    this.email=email.value;
    this.password=password.value;
    this.state=state.value;
    this.city=city.value;
}

function storeData(adminData){
    localStorage.setItem('admin',JSON.stringify(adminData));
    window.location.href='login.htm';
}