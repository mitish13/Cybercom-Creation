<div class="page-header" id="banner">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
            <a href="<?php echo $this->getUrl()->getUrl('form'); ?>" class="btn btn-primary" name="update">Add Admin
                +
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card  mb-12">
            <div class="card-body">
                <h4 class="card-title"><?php echo $this->getTitle(); ?></h4>
                <table class="table" style="background-color:gray; color:black">
                    <thead>
                        <tr>
                        <tr>
                            <th>Id</th>
                            <th>Admin Name</th>
                            <th>Admin Username</th>
                            <th>Admin Status</th>
                            <th>Created Date</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $this->getAdmin();
                        if ($data == "") {
                        ?>
                            <tr>
                                <td colspan="6">
                                    <strong>
                                        <?php echo 'No Records Found'; ?>
                                    </strong>
                                </td>
                            </tr>
                            <?php

                        } else {
                            foreach ($data->getData() as $key => $value) {

                            ?>
                                <tr >
                                    <td><?php echo $value->adminId ?></td>
                                    <td><?php echo $value->adminName; ?></td>
                                    <td><?php echo $value->adminUsername; ?></td>
                                    <td><?php
                                        if ($value->status) {
                                            echo 'Enabled';
                                        } else {
                                            echo 'Disabled';
                                        }
                                        ?>
                                    </td>

                                    <td><?php echo $value->createdDate ?></td>
                                    <th>
                                        <a href="<?php echo $this->getUrl()->getUrl('changeStatus', NULL, ['id' => $value->adminId, 'status' => $value->status], true); ?>">
                                            <i class="fa btn <?php echo ($value->status == 1) ? "fa-toggle-on " : "fa-toggle-off"; ?> " style="color: black; font-size:20px"></i>
                                        </a>
                                    </th>
                                    <th><a href="<?php echo $this->getUrl()->getUrl('form', NULL, ['id' => $value->adminId]); ?>"><i  class="fa fa-edit" style="color: black; font-size:20px"></i></a></th>
                                    <th><a href="<?php echo $this->getUrl()->getUrl('delete', NULL, ['id' => $value->adminId]); ?>"><i class="fa fa-trash" style="color: black; font-size:20px"></i></a></th>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>