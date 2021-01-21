const userName=document.getElementById('userName');
const userEmail=document.getElementById('userEmail');
const userPassword=document.getElementById('userPassword');
const bday=document.getElementById('bday');
const form=document.getElementById('form');
const div=document.getElementById('list');

var data=[];


form.addEventListener('submit',adduser);    

// window.onload=()=>{
//     localStorage.removeItem('users')
// }

function adduser(e){
    e.preventDefault();
    var obj=new NewEntry();

    if(localStorage.getItem('users')!==null){
        //already value in

        data=(JSON.parse(localStorage.getItem('users')));
    }
    
    data.push(obj);
    localStorage.setItem('users',JSON.stringify(data));

    viewUser();
}

function NewEntry(){

    this.userName=userName.value;
    this.userEmail=userEmail.value;
    this.userPassword=userPassword.value;
    this.bday=bday.value;

}

function viewUser(){
    const usersArray=JSON.parse(localStorage.getItem('users'));
    const uname=[];
    const email=[];
    const password=[];
    const userBday=[];

   usersArray.forEach((elem)=>{
       uname.push(elem.userName);
       email.push(elem.userEmail);
       password.push(elem.userPassword);
       userBday.push(elem.bday);
   })

   writeOnPage();

}
function writeOnPage(){
    
}