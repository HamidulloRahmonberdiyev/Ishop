<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit group filter <?=h($group->title);?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute-group">Group filter</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/filter/group-edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Name group</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Наименование группы" required value="<?=h($group->title);?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$group->id;?>">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->