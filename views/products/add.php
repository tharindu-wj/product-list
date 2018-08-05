<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 7/1/18
 * Time: 5:45 PM
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Share Something</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="price" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="2">One</option>
                </select>
            </div>
            <input class="btn btn-success" type="submit" name="submit" value="Submit">
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
        </form>
    </div>
</div>
