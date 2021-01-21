const userName=document.getElementById('userName');
const userEmail=document.getElementById('userEmail');
const userPassword=document.getElementById('userPassword');
const bday=document.getElementById('bday');
const form=document.getElementById('form');
const table=document.getElementById('table');

var data=[];


form.addEventListener('submit',adduser);    

window.onload=()=>{
    if(localStorage.getItem('users')!==null){
        const usersArray=JSON.parse(localStorage.getItem('users'));

        writeOnPage(usersArray);
    }
    
    
}

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
    var dob=new Date(bday.value);

     //calculate month difference from current date in time  
     var month_diff = Date.now() - dob.getTime();  
      
     //convert the calculated difference in date format  
     var age_dt = new Date(month_diff);   
       
     //extract year from date      
     var year = age_dt.getUTCFullYear();  
       
     //now calculate the age of the user  
     var age = Math.abs(year - 1970);  

     var id=Math.random();
  
     //Action prop
    var action1="Edit";
    var action2="delete";

    this.id=id;
    this.userName=userName.value;
    this.userEmail=userEmail.value;
    this.userPassword=userPassword.value;
    this.bday=bday.value;
    this.age=age;
    this.edit=action1;
    this.del=action2;


}

function viewUser(){
    const usersArray=JSON.parse(localStorage.getItem('users'));
    const uname=[];
    const email=[];
    const password=[];
    const userBday=[];
    const userAge=[]

   usersArray.forEach((elem)=>{
       uname.push(elem.userName);
       email.push(elem.userEmail);
       password.push(elem.userPassword);
       userBday.push(elem.bday);
        userAge.push(elem.age);
   })



}
function writeOnPage(usersArray){
    data=usersArray;    

    for(var i=0;i<data.length;i++){
        
        //row 
        var tr=document.createElement('tr');
        for(const prop in data[i]){
            //skip id
            if(prop!=="id"){
            var td=document.createElement('td');
            td.innerText=data[i][prop];

            tr.appendChild(td);
            }
        }   

       
        table.appendChild(tr);
    
    }

    

}