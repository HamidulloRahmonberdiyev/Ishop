<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>New product</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/product">List product</a></li>
        <li class="active">New product</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/product/add" method="post" data-toggle="validator" id="add">
                    <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="title">Name product</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Name product" 
                        value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null; ?>" required>
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
                                'name' => 'category_id',
                                'id' => 'category_id',
                            ],
                            'prepend' => '<option>Create category</option>',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keyword</label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Keyword" 
                            value="<?php isset($_SESSION['form_data']['keywords']) ? h($_SESSION['form_data']['keywords']) : null; ?>">
                        </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Description" 
                            value="<?php isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : null; ?>">
                        </div>

                    <div class="form-group has-feedback">
                        <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Price" pattern="^[0-9.]{1,}$" 
                            value="<?php isset($_SESSION['form_data']['price']) ? h($_SESSION['form_data']['price']) : null; ?>" required data-error="Digits and decimal point allowed">
                         <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="old_price">OLd price</label>
                            <input type="text" name="old_price" class="form-control" id="price" placeholder="Old price" pattern="^[0-9.]{1,}$" 
                            value="<?php isset($_SESSION['form_data']['old_price']) ? h($_SESSION['form_data']['old_price']) : null; ?>" data-error="Digits and decimal point allowed">
                         <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="editor1" cols="80" rows="10"><?php isset($_SESSION['form_data']['old_price']) ? $_SESSION['form_data']['old_price'] : null; ?></textarea>
                    </div>
                        
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="status" checked>Status
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="hit" checked>Hit
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="related">Contact product</label>
                        <select name="related[]" class="form-control select2" id="related" multiple></select>
                    </div>
    
                    <?php new \app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php');?>
                    <!--https://dcrazed.com/html5-jquery-file-upload-scripts/-->
                            <div class="form-group">
                                <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Loading state</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Choose file</div>
                                        <p><small>Recommended sizes: 125х200</small></p>
                                        <div class="single"></div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-8">
                                <div class="box box-primary box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Image gallery</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">Choose file</div>
                                        <p><small>Recommended sizes: 700х1000</small></p>
                                        <div class="multi"></div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Add category</button>
                </div>
            </form>
        <?php if(isset($_SESSION['form_data'])); ?>
    </div>
</div>
</div>
 
</section>
<!-- /.content -->