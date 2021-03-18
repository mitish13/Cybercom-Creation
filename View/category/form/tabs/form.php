<?php $categoryOptions = $this->getCategoryOptions(); ;?>

<?php $category = $this->getCategory();?>

<div class="container">
	<div class="card text-left">
		<div class="card-body">
			<h4 class="card-title"></h4>
			<form action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
				<fieldset>
					<legend>
						<?php if ($this->getRequest()->getGet('id')) { ?>
							<p class="h2 text-center">Update Category Details</p><br>
						<?php } else { ?>
							<p class="h2 text-center">Add Category Details</p><br>
						<?php } ?>
					</legend>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="parentId">PARENT ID</label>
							<select class="form-control" id="parentId" name="category[parentId]">
								<?php if ($categoryOptions) : ?>
									
									<?php foreach ($categoryOptions as $categoryId => $name) : ?>
										<option value="<?php echo $categoryId ?>" <?php echo ($categoryId == $category->parentId) ? 'selected' : ""; ?>><?php echo $name; ?></option>
									<?php endforeach; ?>
								
							
								
								<?php endif; ?>

							</select>
						</div>

						<div class="form-group col-md-12">
							<label for="name">NAME</label>
							<input id="name" name="category[categoryName]" value="<?php echo $category->categoryName ?>" type="text" placeholder="CATEGORY NAME" class="validate form-control" require>
						</div>

						<div class="form-group col-md-12">
							<label for="description">DESCRIPTION</label>
							<textarea name="category[description]" class="form-control" id="description" rows="3" placeholder="CATEGORY DESCRIPTION"><?php echo $category->description ?></textarea>
						</div>
					</div>
					<div class="form-group">

						<div class="custom-control custom-checkbox">
							<?php if ($category->status) {
								$label = 'checked';
								$value = '1';
							} else {
								$label = '';
								$value = '0';
							}
							?>
							<input type="checkbox" class="custom-control-input" id="status" name='category[status]' value="<?php echo $value; ?>" <?php echo $label; ?>>
							<label class="custom-control-label" for="status">Status</label>
						</div>
					</div>

					<?php if (!$this->getRequest()->getGet('id')) { ?>
						<button class="btn btn-primary" type="submit" name="add">Add Category
							<i class="fa fa-plus"></i>
						</button>
					<?php } else { ?>
						<button class="btn btn-primary" type="submit" name="edit">Update Category
							<i class="fa fa-edit"></i>
						</button>
					<?php } ?>

					<button type="reset" class="btn btn-warning">Reset <i class="fa fa-undo"></i></button>
					<a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('grid'); ?>">Cancel</a>
				</fieldset>
			</form>

		</div>
	</div>
</div>