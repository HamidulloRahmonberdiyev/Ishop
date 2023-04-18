<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>List products</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li class="active">List products</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-resposive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $product): ?>
                                    <tr>
                                    <td><?=$product['id'];?></td>
                                    <td><?=$product['cat'];?></td>                   
                                    <td><?=$product['title'];?></td>
                                    <td><?=$product['price'];?></td>
                                    <td><?=$product['status'] ? 'On' : 'Off';?></td>
                                    <td><a href="<?=ADMIN;?>/product/edit?id=<?=$product['id'];?>"><i class="fa fa-fw fa-eye"></i></a>
                                    <a class="delete" href="<?=ADMIN;?>/product/delete?id=<?=$product['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($products);?> products from <?=$count;?>)</p>
                        <?php if ($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</section>
<!-- /.content -->