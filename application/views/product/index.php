<div id ="contest" class="span11 center_elem  main_elem">
    <table border="0">
        <tr>
            <td>Produkts</td>
            <td>Reklamēšanās reizes</td>
        </tr

        <?php
        foreach ($products as $product) {
            ?><tr>
                <td><a href="<?php echo base_url('/Product/product').'/'.$product->produkts_ID; ?>"><?php echo $product->nosaukums; ?></a></td>
                <td><?php echo $product->publiced; ?></td>
            </tr><?php
    }
        ?>
    </table>
</div>