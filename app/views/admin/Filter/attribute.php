<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Filter
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute-group">Group filter</a></li>
        <li class="active">Filter</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-resposive">
                        <a href="<?=ADMIN;?>/filter/attribute-add" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Add attribute</a>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Group</th>
                                    <th>Actions</th>        
                                </tr>
                            </thead>
                            <tbody>
                        <?php foreach($attrs as $id => $item): ?>
                            <tr>
                                <td><?=$item['value'];?></td>            
                                <td><?=$item['title'];?></td>            
                                <td>
                                    <a href="<?=ADMIN;?>/filter/attribute-edit?id=<?=$id;?>"><i class="fa fa-fw fa-pencil text-success"></i></a>
                                    <a href="<?=ADMIN;?>/filter/attribute-delete?id=<?=$id;?>"><i class="fa fa-fw fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</section>
<!-- /.content -->