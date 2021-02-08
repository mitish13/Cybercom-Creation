<?php 
include "header.php";
require "./Database/connection.php";

session_start();
unset($_SESSION['action']);
unset($_SESSION['id']);

?>
<!-- 
    id, name , email , phone , Title, created , actions
 -->
<?php
if(isset($_POST['btnAdd'])){

    header("location:form.php?action=create");
}


?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>contacts page</title>
     <link rel="stylesheet" href="./CSS/contact_style.css">
 </head>
 <body>
     <div id="contact">
    <h3 id="msg">
     <?php
     if(isset($_GET['msg'])){
         ?><?php echo $_SESSION['msg'];?>  <?php
    
        }   ?>
    </h3>
        <h1>Read Contacts</h1>
        <form method="post">
        <button id="btnAdd" name="btnAdd">Add Contact</button>
        </form>
        <table id="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Title</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            <!-- <tr>
                <td>1</td>
                <td>Mitish</td>
                <td>mitish1308@gmail.com</td>
                <td>8980937040</td>
                <td>Engineer</td>
                <td>today</td>
                <td>
                    <form method="post">
                        <button name="btnEdit"> Edit</button>
                        <button name="btnDel">Delete</button>
                    </form>
                </td>
            </tr> -->
            <?php
            $fetchQue="Select * from user";
            $result=mysqli_query($link,$fetchQue);
            $numOfRecord=mysqli_num_rows($result);
            $_SESSION['numOfRec']=$numOfRecord;
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr id="<?php echo $row['id']."row" ?>">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Phone'] ?></td>
                        <td><?php echo $row['Title'] ?></td>
                        <td><?php echo $row['Created'] ?></td>
                        <td>
                            <form method="post">
                                <button name="btnEdit" class="btnEdit" id="<?php echo $row['id']?>">Edit</button>
                                <button name="btnDel" class="btnDel" id="<?php echo $row['id']."delete"?>">Delete</button>
                            </form>
                        </td>

                    </tr>
                    <?php
                }
            }else{
                ?>
                <tr>
                <td colspan="7">No Records Found!!</td>
                </tr>
                <?php
                $setIdQue="ALTER TABLE `user` AUTO_INCREMENT = 0;";
                $exeAboveQue=mysqli_query($link,$setIdQue);


            }   
            
            ?>
        </table>

     </div>
     <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

     <script src="./JS/table.js"></script>
 </body>
 </html>