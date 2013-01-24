<div id ="contest" class="span11 center_elem  main_elem">
   <a href="<?php echo base_url('/Product/edit_firm').'/'.$firm[0]->firmas_ID; ?>">Labot firmas informāciju</a>
    <?php // print_r($firm);
    ?>
    <table border="0">
        <tr>
            <td>Nosaukums</td>
            <td><?php echo $firm[0]->nosaukums; ?></td>

        </tr
        <tr>
            <td>Reģ. nr.</td>
            <td><?php echo $firm[0]->reg_nr; ?></td>
        </tr
        <tr>
            <td>Adrese</td>
            <td><?php echo $firm[0]->adrese; ?></td>
        </tr
        <tr>
            <td>Tel. nr.</td>
            <td><?php echo $firm[0]->tel_nr; ?></td>
        </tr
      


    </table>
</div>