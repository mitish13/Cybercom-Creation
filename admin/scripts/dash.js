const body=document.getElementById("body");

window.onload=()=>{
    getBday();
}

function getBday(){
    const usersArray=JSON.parse(localStorage.getItem('users'));
    usersArray.forEach((elem)=>{

            //bday check
            var dob=new Date(elem.bday);
            var today=new Date();
            if(dob.getDay()==today.getDay() && dob.getMonth()==today.getMonth()){
                var bday=document.createElement('h1');
                bday.innerHTML="Happy birthday " +elem.userName;
                body.appendChild(bday);
            }

    
    })
}