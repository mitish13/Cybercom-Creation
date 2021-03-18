In process...
<!-- <?php if (!$this->validCustomer()) : ?>
    <h2>Register First</h2>
<?php else : ?>
    <div class="container">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <form action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">

                    <fieldset>
                        <legend>
                            <?php if ($this->getRequest()->getGet('id')) { ?>
                                <p class="h2 text-center">Update Customer Address Details</p><br>
                            <?php } else { ?>
                                <p class="h2 text-center">Add Customer Address Details</p><br>
                            <?php } ?>
                        </legend>

                        <?php //$customer = $this->getCustomer(); 
                        ?>


                        <div class="row">
                            <div class="card border-secondary mb-3 col-mb-6">
                                <div class="card-header">Shipping Address</div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="firstName">NAME</label>
                                            <input id="firstName" name="shipping[name]" value="" type="text" placeholder="ADDRESS" class="validate form-control" require>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="mobile"></label>
                                            <input id="mobile" name="shipping[mobile]" value="" type="text" placeholder="MOBILE NUMBER" class="validate form-control" require>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="password">PASSWORD</label>
                                            <input id="password" name="shipping[password]" value="" type="text" placeholder="PASSWORD" class="validate form-control" require>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="card border-secondary mb-3 col-mb-6">
                                <div class="card-header">Billing Address</div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="firstName">FIRST NAME</label>
                                            <input id="firstName" name="billing[firstName]" value="" type="text" placeholder="ADDRESS" class="validate form-control" require>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="lastName">LAST NAME</label>
                                            <input id="lastName" name="billing[lastName]" value="" type="text" placeholder="CITY" class="validate form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="price">EMAIL</label>
                                            <input id="price" name="billing[email]" value="" type="text" placeholder="EMAIL" class="validate form-control" require>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="mobile">MOBILE NUMBER</label>
                                            <input id="mobile" name="billing[mobile]" value="" type="text" placeholder="MOBILE NUMBER" class="validate form-control" require>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="password">PASSWORD</label>
                                            <input id="password" name="billing[password]" value="" type="text" placeholder="PASSWORD" class="validate form-control" require>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (!$this->getRequest()->getGet('id')) : ?>
                            <button class="btn btn-primary" type="submit" name="add">Add Customer Address
                                <i class="fa fa-plus"></i>
                            </button>
                        <?php else : ?>
                            <button class="btn btn-primary" type="submit" name="edit">Update Customer Address
                                <i class="fa fa-edit"></i>
                            </button>
                        <?php endif; ?>

                        <!-- <button type="reset" class="btn btn-warning">Reset <i class="fa fa-undo"></i></button> -->

                        <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('grid'); ?>">Cancle <i class="fa fa-times"></i></a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- 
<?php if ($this->validCustomer()) : ?>
    <form action="<?php echo $this->getUrl()->getUrl('save', 'customer'); ?>" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title">
                                <p class="h2 text-center">Billing Address</p><br>
                            </h4>
                            <p class="card-text">

                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="address" name="billing[address]" type="text" class="validate">
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="fname" name="billing[city]" type="text" class="validate">
                                            <label for="fname">City</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <select class="browser-default" name="billing[state]">
                                                <option value="" disabled selected>Please Choose State</option>
                                                <option value="India">Gujarat</option>
                                                <option value="Australia">Maharashtra</option>
                                                <option value="Brazil">Punjab</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="zip" name="billing[zipcode]" class="validate">
                                            <label for="zip">Zipcode</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <select class="browser-default" name="billing[country]">
                                                <option value="" disabled selected>Please Choose Country</option>
                                                <option value="India">India</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Brazil">Brazil</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">

                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title">
                                <p class="h2 text-center">Shipping Address</p><br>
                            </h4>
                            <p class="card-text">

                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="contact" name="shipping[address]" type="text" class="validate">
                                    <label for="contact">Address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="fname" name="shipping[city]" type="text" class="validate">
                                            <label for="fname">City</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <select class="browser-default" name="shipping[state]">
                                                <option value="" disabled selected>Please Choose State</option>
                                                <option value="India">Gujarat</option>
                                                <option value="Australia">Maharashtra</option>
                                                <option value="Brazil">Punjab</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="zipcode" name="shipping[zipcode]" class="validate">
                                            <label for="zipcode">Zipcode</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <select class="browser-default" name="shipping[country]">
                                                <option value="" disabled selected>Please Choose Country</option>
                                                <option value="India">India</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Brazil">Brazil</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
            <div class="text-center">
                <button class="btn waves-effect waves-light" type="submit" name="add">Save
                    <i class="material-icons right">add</i>
                </button>
                <button class="btn waves-effect waves-light" type="reset" name="cancel">Cancel
                    <i class="material-icons right">close</i>
                </button>
            </div>

        </div>
        </div>
        </div>

    </form>
<?php else : ?>
    <h2>Register First</h2> -->
<?php endif; ?> -->