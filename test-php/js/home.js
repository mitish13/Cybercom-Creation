const btnEdit=document.getElementsByClassName('btnEdit');
editButton();



function editButton(){
    for(var i=0;i<btnEdit.length;i++){
        btnEdit[i].addEventListener('click',function(e){
            e.preventDefault();
            console.log(e.target.id);
            
            location.href=`http://localhost/test/Cybercom-Creation/test-php/addPost.php?id=${e.target.id}&action=update`;
        })
    }
    }