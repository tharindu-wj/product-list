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
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($viewmodel as $product) : ?>
                <tr>
                    <th scope="row"><?php echo $product['product_id']; ?></th>
                    <td><?php echo $product['prod_name']; ?></td>
                    <td><?php echo $product['prod_description']; ?></td>
                    <td><?php echo $product['prod_price']; ?></td>
                    <td><img src="uploads/<?php echo $product['prod_image']; ?>" height="60" width="60"></td>
                    <td><?php echo $product['cat_name']; ?></td>
                    <td>
                        <a href="#">Update</a>
                        <a href="<?php echo ROOT_URL;?>products/delete?id=<?php echo $product['product_id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>


