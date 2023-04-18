<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Group filter
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li class="active">Group filter</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-resposive">
                        <a href="<?=ADMIN;?>/filter/group-add" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Add group</a>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>        
                                </tr>
                            </thead>
                            <tbody>
                        <?php foreach($attrs_group as $item): ?>
                            <tr>
                                <td><?=$item->title;?></td>            
                                <td>
                                    <a href="<?=ADMIN;?>/filter/group-edit?id=<?=$item->id;?>"><i class="fa fa-fw fa-pencil text-success"></i></a>
                                    <a class="delete text-danger" href="<?=ADMIN;?>/filter/group-delete?id=<?=$item->id;?>"><i class="fa fa-fw fa-close text-danger"></i></a>
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