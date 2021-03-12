<?php
includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url'=>'/admin/products',
    'label'=>"All Products",
    'title'=>"Create New Product",

]);
?>


<div class="row.g-3">
    <div class="col-12">
        <form class='' method="POST" action="/admin/products/update">
        <input  type="hidden" name="id" value="<?=$product->id?>">
        <div class="row.g-3">
            <label class="form-label">Edit Name:</label>
            <input class="w-100" type="form-control" name="name" value="<?=$product->name?>">
        </div>
        <div class="row.g-3">
            <div class="form-check">
            <input name="status" type ="checkbox" <?php if($product->status==1) {echo 'checked';}?>>
            <label class="form-check-label">Product Status(Check if active)</label>
            </div>
            <button type="submit" class="w-100 btn btn-primary btn-lg">Update Product</button>
            
        </div>
    
    
        </form>

    </div>
</div>