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
                <td><?php echo $category['cat_name']; ?></td>
                <td><?php echo $category['cat_description']; ?></td>
                <td><a href="#">
                        View Products
                    </a>
                </td>
                <td>
                    <a href="<?php echo ROOT_URL;?>categories/update?id=<?php echo $category['category_id']; ?>">
                        Update</a>
                    <a href="<?php echo ROOT_URL;?>categories/delete?id=<?php echo $category['category_id']; ?>">
                        Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

