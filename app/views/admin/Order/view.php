<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Order №<?=$order['id'];?>
    <?php if(!$order['status']): ?>
        <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn btn-success btn-xs">Edit</a>
        <?php else: ?>
        <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0" class="btn btn-info btn-xs">Return job</a>
    <?php endif; ?>
        <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn btn-danger btn-xs delete">Delete</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="<?=ADMIN;?>/order">List products</a></li>
        <li class="active">Order №<?=$order['id'];?></li>
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
                            <tbody>
                                <tr>
                                    <td>Number order</td>
                                    <td><?=$order['id'];?></td>
                                </tr>
                                <tr>
                                    <td>Data order</td>
                                    <td><?=$order['date'];?></td>
                                </tr>
                                <tr>
                                    <td>Data update</td>
                                    <td><?=$order['update_at'];?></td>
                                </tr>
                                <tr>
                                    <td>Number of items in the order</td>
                                    <td><?=count($order_products);?></td>
                                </tr>
                                <tr>
                                    <td>Order price</td>
                                    <td><?=$order['sum'];?><?=$order['currency'];?></td>
                                </tr>
                                <tr>
                                    <td>Name order</td>
                                    <td><?=$order['name'];?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?=$order['status'] ? 'Complated' : 'New';?></td>
                                </tr>
                                <tr>
                                    <td>Comentary</td>
                                    <td><?=$order['note'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <h3>Detail order</h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-resposive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $qty = 0; foreach($order_products as $product): ?>
                                    <tr>
                                        <th><?=$product->id;?></th>
                                        <th><?=$product->title;?></th>
                                        <th><?=$product->qty; $qty += $product->qty?></th>
                                        <th><?=$product->price;?></th>
                                    </tr>
                                <?php endforeach; ?> 
                                <tr class="active">
                                    <td colspan="2">
                                        <b>Total:</b>
                                    </td>
                                    <td><b><?=$qty;?></b></td>
                                    <td><b><?=$order['sum'];?><?=$order['currency'];?></b></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
   
 
</section>
<!-- /.content -->