<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Menu</a></li>
                <li>Registration</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>Login Form</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="user/login" id="login" role="form">
                                <div class="form-group">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" required>
                                </div>
                                <div class="form-group">
                                    <label for="pasword">Password</label>
                                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->