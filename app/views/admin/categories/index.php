<h2>Section title</h2>
<?php if(count($categories)>0):?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category):?>
            <tr>
                <td><?=$category->id?></td>
                <td><?=$category->name?></td>
                <td><?=$category->status?></td>
                <td>action</td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php endif?>
</div>