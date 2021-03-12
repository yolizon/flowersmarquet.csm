<?php
includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url'=>'/admin/brands',
    'label'=>"All Brands",
    'title'=>"Create New Brand",

]);
?>


<div class="row.g-3">
    <div class="col-12">
        <form class='' method="POST" action="/admin/brands/store">
        <div class="row.g-3">
            <label class="form-label">Brand Name:</label>
            <input class="w-100" type="form-control" name="name">
        </div>
        <div class="row.g-3">
            <div class="form-check">
            <input name="status" type ="checkbox">
            <label class="form-check-label">Brand Status(Check if active)</label>
            </div>
            <button type="submit" class="w-100 btn btn-primary btn-lg">Add new Brand</button>
            
        </div>
    
    
        </form>

    </div>
</div>