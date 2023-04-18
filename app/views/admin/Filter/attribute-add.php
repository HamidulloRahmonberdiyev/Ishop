<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New filter
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute">List filter</a></li>
        <li class="active">New filter</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/filter/attribute-add" method="post" data-toggle="validator" id="add">
                    <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="value">Name</label>
                        <input type="text" name="value" class="form-control" id="value" placeholder="Name" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Group</label>
                        <select name="attr_group_id" id="category_id" class="form-control">
                            <option>Choose group</option>
                            <?php foreach($group as $item): ?>
                                <option value="<?=$item->id;?>"><?=$item->title;?></option>
                            <?php endforeach; ?>
                        </select>
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