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
                <label>Category Name</label>
                <input type="text" name="name" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <input class="btn btn-success" type="submit" name="submit" value="Submit">
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>categories">Cancel</a>
        </form>
    </div>
</div>
