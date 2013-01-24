<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Visi produkti</h2>
    <a href="<?php echo base_url('/Product/add_firm'); ?>">Pievienot firmu</a>
    <table border="0">
        <tr>
            <td>reg_nr</td>
            <td>nosaukums</td>
            <td>adrese</td>
            <td>tel_nr</td>
            <td>Dzēst</td>
        </tr>

        <?php
       // print_r($firms);
        foreach ($firms as $p) {
            ?><tr>
                <td><a href="<?php echo base_url('Product/firm').'/'.$p->firmas_ID; ?>"><?php echo $p->reg_nr; ?></a></td>
                <td><?php echo $p->nosaukums; ?></td>
                <td><?php echo $p->adrese; ?></td>
                <td><?php echo $p->tel_nr; ?></td>
                <td><a href="<?php echo base_url('Product/delete_firm').'/'.$p->firmas_ID; ?>">Dzēst</a></td>
            </tr><?php
    }
        ?>
    </table>
</div>