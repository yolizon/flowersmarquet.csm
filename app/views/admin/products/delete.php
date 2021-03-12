<?php
  includeWithVars(VIEWS."/layouts/partials/admin/toolbar.php", [
    'url' => '/admin/products',
    'label' => "All Products",
    'title' => "Delete Product"
  ]);

?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="">
        
            <div class="row g-3">
               <h2>Product <?=$product->name?> will be deleted!</h2>
               <h2>Are You Sure?</h2>
            </div>
            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete Product</button>
            <button name="reset" class="btn btn-info btn-sn">Reset</button>
        </form>
    </div>

</div>