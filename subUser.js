const body=document.getElementById('body');

window.onload=()=>{
    var id=sessionStorage.getItem('currentUser');
    
    console.log(id);

    getName(id);
    
}

function getName(id){
    const usersArray=JSON.parse(localStorage.getItem('users'));
    usersArray.forEach((elem)=>{
        if(elem.id==id){
            var h2=document.createElement("h2");
            h2.innerHTML="Hii "+elem.userName;
            body.appendChild(h2);

            //bday check
            var dob=new Date(elem.bday);
            var today=new Date();
            if(dob.getDay()==dob.getDay() && dob.getMonth()==dob.getMonth()){
                var bday=document.createElement('h1');
                bday.innerHTML="Happy birthday";
                body.appendChild(bday);
            }


        }

    })
}



