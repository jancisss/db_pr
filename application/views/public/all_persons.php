<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Personas</h2>
    <a href="<?php echo base_url('/Products_public/person_add'); ?>">Pievienot personu</a>
    
    <table border="0">
        <tr>
            <td>Vārds</td>
            <td>Uzvārds</td>
            <td>Personas kods</td>
            <td>Adrese</td>
            <td>Grupa</td>
            <td>Labot</td>
          
        </tr

        <?php
        foreach ($persons as $p) {
            ?><tr>
                <td> <?php echo $p->vards; ?></td>
                <td><?php echo $p->uzvards; ?></td>
                <td><?php echo $p->personas_kods; ?></td>
                <td><?php echo $p->adrese; ?></td>
                 <td><?php echo $p->nosaukums; ?></td>
                <td><a href="<?php echo base_url('/Products_public/person_edit').'/'.$p->personas_ID;?>">Labot</a></td>
               
                
            </tr><?php
    }
        ?>
    </table>
</div>