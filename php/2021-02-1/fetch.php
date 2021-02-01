<?php 
require 'connection.php'; //we have $result varible
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch and print data using table</title>
</head>
<body>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Moblie number</th>
            <th>Email-id</th>
        </tr>
    
            <?php
                $sql="Select f_name,l_name,mobile_num,email from CE";
                $result=$conn->query($sql);


                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
            ?>     
                <tr> 
                        <td><?php echo $row['f_name'] ?></td> 
                        <td><?php echo $row['l_name'] ?></td>           
                        <td><?php echo $row['mobile_num'] ?></td>           
                        <td><?php echo $row['email'] ?></td>  
                </tr>         
          <?php
                    }
                }
            
            ?>
    </table>
</body>
</html>

