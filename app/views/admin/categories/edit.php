<?php
includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url'=>'/admin/categories',
    'label'=>"All Categories",
    'title'=>"Create New Category",

]);
?>


<div class="row.g-3">
    <div class="col-12">
        <form class='' method="POST" action="/admin/categories/update">
        <input  type="hidden" name="id" value="<?=$category->id?>">
        <div class="row.g-3">
            <label class="form-label">Edit Name:</label>
            <input class="w-100" type="form-control" name="name" value="<?=$category->name?>">
        </div>
        <div class="row.g-3">
            <div class="form-check">
            <input name="status" type ="checkbox" <?php if($category->status==1) {echo 'checked';}?>>
            <label class="form-check-label">Category Status(Check if active)</label>
            </div>
            <button type="submit" class="w-100 btn btn-primary btn-lg">Update Category</button>
            
        </div>
    
    
        </form>

    </div>
</div>