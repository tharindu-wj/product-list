<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 7/1/18
 * Time: 5:46 PM
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>
