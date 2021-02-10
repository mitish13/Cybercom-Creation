var all_category = document.getElementsByName('category');
var arr_category=[];
var form=document.getElementById('addPostForm');

console.log("called");
form.addEventListener('submit',validate) 

function validate(e){
    // e.preventDefault();
    // for(var i=0;i<all_category.length;i++){
    //     if(all_category[i].checked){
    //         arr_category.push(all_category[i].value);
    //     }
    // }
    // console.log(arr_category);
}
