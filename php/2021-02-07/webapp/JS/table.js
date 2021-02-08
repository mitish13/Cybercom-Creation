const btnEdit=document.getElementsByClassName('btnEdit');
const btnDel=document.getElementsByClassName('btnDel');


for(var i=0;i<btnEdit.length;i++){
    btnEdit[i].addEventListener('click',function doEdit(e){
        e.preventDefault();
        console.log(e.target.id);
        location.href=`http://localhost/practice/webapp/form.php?id=${e.target.id}&action=update`;
    })
}


$(document).ready(function(){
$('.btnDel').click(function(e){
    e.preventDefault();
    
    var rowID=$(this).attr('id'); //format : 1delete
    var row=$(this).parent().parent().parent();
    // var $row=rowID.parent().parent().parent();
    var deleteTerm=rowID.indexOf('d');

    var id=rowID.substr(0,deleteTerm);
    console.log(id);
    $.ajax({
        type:'POST',
        url:'../webapp/Database/delete.php',
        data:{'id':id},
        success:function(){
            $("#msg").text("Record Successfully deleted");
            row.fadeOut().remove();
        }
    })
})     
})