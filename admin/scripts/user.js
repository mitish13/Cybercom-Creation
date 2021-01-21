const userName=document.getElementById('userName');
const userEmail=document.getElementById('userEmail');
const userPassword=document.getElementById('userPassword');
const bday=document.getElementById('bday');
const form=document.getElementById('form');
const div=document.getElementById('list');

const data=[];


form.addEventListener('submit',adduser);    

function adduser(e){
    e.preventDefault();
    const obj=new NewEntry();

    if(localStorage.getItem('users')!==null){
        data.push(JSON.parse(localStorage.getItem('users')));
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
    const usersArray=localStorage.getItem('users');
    console.log(usersArray);

}