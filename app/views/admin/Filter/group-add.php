<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New group filter
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute-group">Group filter</a></li>
        <li class="active">New group</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/filter/group-add" method="post" data-toggle="validator">
                    <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="title">Name group</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Name group" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Add group</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->