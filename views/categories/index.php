<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 7/1/18
 * Time: 5:45 PM
 */
?>
<section>
    <?php //var_dump($viewmodel); ?>
    <div class="bs-example" data-example-id="hoverable-table">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($viewmodel as $category) : ?>
            <tr>
                <th scope="row"><?php echo $category['category_id']; ?></th>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $category['description']; ?></td>
                <td><a href="#">View Products</a> </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

