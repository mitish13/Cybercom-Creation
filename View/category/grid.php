<div class="page-header" id="banner">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
            <a href="<?php echo $this->getUrl()->getUrl('form'); ?>" class="btn btn-primary" name="update">Add Category
                +
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card   mb-12">
            <div class="card-body">
                <h4 class="card-title"><?php echo $this->getTitle(); ?></h4>
                <table class="table"  style="background-color:gray; color:black">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Parent Id</th>
                            <th>Path Id</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $this->getCategories();
                        if ($data == "") :
                        ?>
                            <tr>
                                <td colspan="9">
                                    <strong>
                                        <?php echo 'No Records Found'; ?>
                                    </strong>
                                </td>
                            </tr>
                            <?php
                        else :
                            foreach ($data->getData() as $category) : ?>
                                <tr>
                                    
                                    <td><?php echo $category->categoryId ?></td>
                                    <td><?php echo $this->getName($category); ?></td>
                                    <td><?php echo $category->parentId; ?></td>
                                    <td><?php echo $category->pathId ?></td>
                                    <td><?php
                                        if ($category->status) {
                                            echo 'Enabled';
                                        } else {
                                            echo 'Disabled';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $category->description ?></td>

                                    <th>
                                        <a href="<?php echo $this->getUrl()->getUrl('changeStatus', NULL, ['id' => $category->categoryId, 'status' => $category->status], true); ?>">
                                            <i class="fa btn <?php echo ($category->status == 1) ? "fa-toggle-on" : "fa-toggle-off"; ?>" style="color: black; font-size:20px"></i>
                                        </a>
                                    </th>
                                    <th><a href="<?php echo $this->getUrl()->getUrl('edit', NULL, ['id' => $category->categoryId]); ?>"><i  class="fa fa-edit" style="color: black; font-size:20px"></i></a></th>
                                    <th><a href="<?php echo $this->getUrl()->getUrl('delete', NULL, ['id' => $category->categoryId]); ?>"><i class="fa fa-trash" style="color: black; font-size:20px"></i></a></th>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>