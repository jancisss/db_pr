<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Visi produkti</h2>
    <a href="<?php echo base_url('/Product/add_product'); ?>">Pievienot produktu</a>
    <table border="0">
        <tr>
            <td>Produkts</td>
           <!--- <td>Reklamēšanās reizes</td> -->
            <td>Dzēst</td>
        </tr

        <?php
       // print_r($products);
        foreach ($products as $product) {
            ?><tr>
                <td><a href="<?php echo base_url('/Product/product') . '/' . $product->produkts_ID; ?>"><?php echo $product->nosaukums; ?></a></td>
               <!-- <td><?php //echo $product->publiced; ?></td> -->
                <td><a href="<?php echo base_url("Product/delete_product").'/'.$product->produkts_ID; ?>">Dzēst</a></td>
            </tr><?php
    }
        ?>
    </table>
</div>