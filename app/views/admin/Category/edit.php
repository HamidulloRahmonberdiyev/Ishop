<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit category <?=$category->title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/category">List category</a></li>
        <li class="active"><?=$category->title;?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/category/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="title">Name  category</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Name category" value="<?=h($category->title);?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent category</label>
                        <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/select.php',
                            'container' => 'select',
                            'cache' => 0,
                            'cacheKey' => 'admin_select',
                            'class' => 'form-control',
                            'attrs' => [
                                'name' => 'parent_id',
                                'id' => 'parent_id',
                            ],
                            'prepend' => '<option value="0">Independent category</option>',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keyword</label>
                        <input type="text" name="keywords" class="form-control" id="keywords" 
                        placeholder="Keyword" value="<?=h($category->keywords);?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" 
                        placeholder="Description" value="<?=h($category->description);?>">
                    </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$category->id;?>">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
</section>
<!-- /.content -->