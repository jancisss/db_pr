<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Produkti reklamēšanās vietās (skats "produkti_reklāmas_vietās")</h2>
    <a href="<?php echo base_url('/Products_public/add'); ?>">Pievienot reklamēšanās reizi</a>
    <table border="0">
        <tr>
            <td>Produkta nosaukums</td>
            <td>Cena</td>
            <td>Adrese</td>
            <td>No</td>
            <td>Līdz</td>
            <td>Pilsēta</td>
            <td>Valsts</td>
        </tr

        <?php
        foreach ($publiced as $p) {
            ?><tr>
                <td> <?php echo $p->nosaukums; ?></td>
                <td><?php echo $p->Cena; ?></td>
                <td><?php echo $p->adrese; ?></td>
                <td><?php echo $p->no; ?></td>
                <td><?php echo $p->lidz; ?></td>
                <td><?php echo $p->pilseta; ?></td>
                <td><?php echo $p->valsts; ?></td>
            </tr><?php
    }
        ?>
    </table>
</div>