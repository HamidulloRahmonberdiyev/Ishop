<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit currency <?=$currency->title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/currency">Currency filter</a></li>
        <li class="active">Edit currency</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/currency/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="title">Name currency</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Name currency" required value="<?=h($currency->title);?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="code">Code currency</label>
                        <input type="text" name="code" class="form-control" id="code" placeholder="Code currency" required value="<?=h($currency->code);?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="symbol_left">Symbol left</label>
                        <input type="text" name="symbol_left" class="form-control" id="symbol_left" placeholder="Symbol left" value="<?=h($currency->symbol_left);?>">
                    </div>
                    <div class="form-group">
                        <label for="symbol_right">Symbol right</label>
                        <input type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="Symbol right" value="<?=h($currency->symbol_right);?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="value">Value</label>
                        <input type="text" name="value" class="form-control" id="value" placeholder="Value" required data-error="Digits and decimal point allowed" pattern="^[0-9.]{1,}$" value="<?=h($currency->value);?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="value">
                            <input name="base" type="checkbox"<?php if($currency->base) echo ' checked';?>>
                            Base currency</label>
                    </div>
                </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$currency->id;?>">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->