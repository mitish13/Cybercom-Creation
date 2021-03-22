<div class="container">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <form action="<?php echo $this->getUrl()->getUrl('save', 'Attribute_Option'); ?>" method="post">
                            <p class="h2 text-center">Add/Update Options Details</p><br>
                    <div class="row">
                        <div class="form-group col-md-9">
                        </div>
                        <div class="form-group col-md-3">
                        <button class="btn waves-effect waves-light" type="button" name="add" onclick="addOption();">Add&nbsp;Option
                                                   </button>
                        </div>
                    </div>

                    <?php $option = $this->getOption(); ?>

                    <div class="row" id="existingOption">
                        <?php if ($option) : ?>
                            <?php foreach ($option->getData() as $key => $value) : ?>
                                <div class="row col-md-10">
                                    <div class="form-group col-md-5">
                                        <label for="name<?php echo $value->optionId; ?>">Option Name</label>
                                        <input id="name<?php echo $value->optionId; ?>" name="existing[<?php echo $value->optionId; ?>][name]" value="<?php echo $value->name ?>" type="text" class="validate" require>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="sortOrder<?php echo $value->optionId; ?>">Option Sort Order</label>
                                        <input id="sortOrder<?php echo $value->optionId; ?>" name="existing[<?php echo $value->optionId; ?>][sortOrder]" value="<?php echo $value->sortOrder ?>" type="text" class="validate" require>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="remove">&nbsp;</label>
                                        <a href="<?php echo $this->getUrl()->getUrl('delete', 'Attribute_Option', null, false) . "&optionId={$value->optionId}"; ?>" class="btn waves-effect waves-light red" >Delete
                                            
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <button class="btn waves-effect waves-light text-dark yellow" type="submit" name="add">Update Option
                                            </button>
            </form>

        </div>
    </div>
</div>

<div style="display: none;" id="newOption"> 
    <div class="row col-md-12">
        <div class="form-group col-md-5">
            <label for="name">Option Name</label>
            <input id="name" name="new[name][]" type="text" class="validate form-control" require>
        </div>

        <div class="form-group col-md-4">
            <label for="sortOrder">Option Sort Order</label>
            <input id="sortOrder" name="new[sortOrder][]" type="text"  class="validate form-control" require>
        </div>

        <div class="form-group col-md-3">
            <label for="remove">&nbsp;</label>
            <button class="btn waves-effect waves-light red" type="button" onclick="removeOption(this);" name="add">Delete
                    
            </button>
        </div>
    </div>
</div>

<script>
    function removeOption(removeButton) {
        var option = removeButton.parentElement.parentElement.remove();
    }

    function addOption() {
        var existingOption = document.getElementById('existingOption');
        var newOption = document.getElementById('newOption').children[0];
        existingOption.prepend(newOption.cloneNode(true));
    }
</script>

