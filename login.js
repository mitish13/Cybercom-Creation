const email=document.getElementById('email');
const password=document.getElementById('password');
const login=document.getElementById('login');
const form=document.getElementById('form');

form.addEventListener('submit',validateAdmin);



function validateAdmin(e){
    e.preventDefault();
    const adminData=JSON.parse(localStorage.getItem('admin'));
    const emailAdmin=adminData.email;
    const passwordAdmin=adminData.password;

    if(email.value!==emailAdmin || password.value!==passwordAdmin){
        console.log("Incorrect email or password")
    }
    else{
        window.location.href="admin/index.htm";
    }
}
