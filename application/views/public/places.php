<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Reklamēšanās vietās </h2>
    <a href="<?php echo base_url('/Products_public/add'); ?>">Pievienot reklamēšanās reizi</a>
    <a href="<?php echo base_url('/Products_public/i_add'); ?>">Pievienot reklamēšanās vietu</a>
    <table border="0">
        <tr>

            <td>Cena</td>
            <td>Adrese</td>
            <td>No</td>
            <td>Līdz</td>
            <td>Pilsēta</td>
            <td>Valsts</td>
            <td>Labot</td>
        </tr

        <?php
        foreach ($places as $p) {
            ?><tr>
                <td> <?php echo $p->cena_diena; ?></td>

                <td><?php echo $p->adrese; ?></td>
                <td><?php echo $p->no; ?></td>
                <td><?php echo $p->lidz; ?></td>
                <td><?php echo $p->pilseta; ?></td>
                <td><?php echo $p->valsts; ?></td>
                <td><a href="<?php echo base_url('/Products_public/i_edit'). '/'. $p->iesp_rekl_vietas_ID; ?>">Labot</a></td>
            </tr><?php
    }
        ?>
    </table>
</div>