<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Firmu reklamēšanās reizes (skats "firmas_reklam_reizes")</h2>
    <a href="<?php echo base_url('/Products_public/add'); ?>">Pievienot reklamēšanās reizi</a>
    <table border="0">
        <tr>
            <td>Produkta nosaukums</td>
            <td>Reģistrācijas nr.</td>
            <td>Skaits</td>
            <td>Valsts</td>
            <td>Pilsēta</td>
            <td>Adrese</td>
           
        </tr

        <?php
        foreach ($f_publiced as $p) {
            ?><tr>
                <td> <?php echo $p->nosaukums; ?></td>
                <td><?php echo $p->reg_nr; ?></td>
                
                <td><?php echo $p->Skaits; ?></td>
                
                <td><?php echo $p->pilseta; ?></td>
                <td><?php echo $p->valsts; ?></td>
                <td><?php echo $p->adrese; ?></td>
            </tr><?php
    }
        ?>
    </table>
</div>