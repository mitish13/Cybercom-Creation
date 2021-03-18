<div class="container">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <form action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">

                <fieldset>
                    <legend>
                        <?php if ($this->getRequest()->getGet('id')) { ?>
                            <p class="h2 text-center">Update Admin Details</p><br>
                        <?php } else { ?>
                            <p class="h2 text-center">Add Admin Details</p><br>
                        <?php } ?>
                    </legend>


                    <?php $admin = $this->getAdmin(); ?>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="name">NAME</label>
                            <input id="name" name="admin[adminName]" value="<?php echo $admin->adminName ?>" type="text" placeholder="NAME" class="validate form-control" require>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="username">USERNAME</label>
                            <input id="username" name="admin[adminUsername]" value="<?php echo $admin->adminUsername ?>" type="text" placeholder="USERNAME" class="validate form-control">
                        </div>


                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <?php if ($admin->status) {
                                $label = 'checked';
                                $value = '1';
                            } else {
                                $label = '';
                                $value = '0';
                            }
                            ?>
                            <input type="checkbox" class="custom-control-input" id="status" <?php echo $label; ?> name='admin[status]'>
                            <label class="custom-control-label" for="status">Status</label>
                        </div>
                    </div>


                    <?php if (!$this->getRequest()->getGet('id')) { ?>

                        <button class="btn btn-primary" type="submit" name="add">Add Admin
                            <i class="fa fa-plus"></i>
                        </button>
                    <?php } else { ?>
                        <button class="btn btn-primary" type="submit" name="edit">Update Admin
                            <i class="fa fa-edit"></i>
                        </button>
                    <?php } ?>
                    <button type="reset" class="btn btn-warning">Reset <i class="fa fa-undo"></i></button>
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('grid', null, null, true); ?>">Cancel <i class="fa fa-times"></i></a>
                </fieldset>
            </form>

        </div>
    </div>
</div>