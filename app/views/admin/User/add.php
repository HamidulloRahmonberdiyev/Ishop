<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New user
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?= ADMIN ?>/user"> List user</a></li>
        <li class="active">New user</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form method="post" action="/user/signup" role="form" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="login">Login</label>
                            <input class="form-control" name="login" id="login" type="text" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="password">Password</label>
                            <input class="form-control" name="password" id="password" type="password" data-minlength="6" data-error="Password must include at least 6 characters" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" id="email" type="email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Name</label>
                            <input class="form-control" name="name" id="name" type="text" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="address">Address</label>
                            <input class="form-control" name="address" id="address" value="<?= isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option value="user">User</option>
                                <option value="admin">Adminstrator</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->