<?php
    $groupPrice = $this->getProduct();
    $customerGroup = $this->getCustomerGroup();

    
?>



    <div class="container">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title">
                    <p class="h2 text-center">Group Price</p><br>
                </h4>
                <form method="post" action="<?php echo $this->getUrl()->getUrl('save','groupPrice'); ?>">
                    <div class="text-left">
                        <button class="btn waves-effect waves-dark yellow" type="submit" name="update">Update
                        </button>
                    </div>
                    <p class="card-text">
                    <div class="row">

                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th>Group ID</th>
                                    <th>Group Name</th>
                                    <th>Price</th>
                                    <th>Group Price</th>
                                   
                                </tr>
                            </thead>
                            <?php 
                                foreach ($customerGroup->getData() as $key => $value):
                                   
                                $rowStatusData = $value->entityId ?'Exist':'New';
                            ?>
                            <tbody>
                                    <tr>
                                        <td><?php echo $value->group_id; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td> 
                                        <?php echo $value->price; ?>
                                        </td>
                                        <td>
                                        <input type="text" name="groupPrice[<?php echo $rowStatusData; ?>][<?php echo $value->group_id ?>]" value="<?php echo $value->groupPrice;  ?>"> 
                                        </td>
                                    </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>

                        </p>
                    </div>

                </form>
        </div>
        <br>
        <br>
