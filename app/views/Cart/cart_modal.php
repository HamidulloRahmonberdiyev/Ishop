<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </th>
            </thead>
                    <tbody>
                    <?php foreach($_SESSION['cart'] as $id => $item): ?>
                        <tr>
                            <td><a href="product/<?=$item['alias'];?>"><img src="images/<?=$item['img'];?>" alt=""></a></td>
                            <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></td>
                            <td><?=$item['qty'];?></td>
                            <td><?=$item['price'];?></td>
                            <td><span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" 
                            aria-hidden="true"></span></td>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td>Total</td>
                            <td colspan="4" class="text-right cart-qty">
                                <?= $_SESSION['cart.qty'];?></td>
                        </tr>
                        <tr>
                            <td>All Price</td>
                            <td colspan="4" class="text-right cart-sum"><?= $_SESSION['cart.currency']['symbol_left']
                             . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        <?php else: ?>
            <h1>Cart is empty</h1>
        <?php endif; ?>