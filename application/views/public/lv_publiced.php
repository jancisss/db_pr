<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Latvijā reklamētie produkti(skats "produkti_lv")</h2>
    <div> Šeit var aplīkot visus produktus kas ir rklamējušies Latvijā un cik reizes </div>
    <a href="<?php echo base_url('/Products_public/add'); ?>">Pievienot reklamēšanās reizi</a>
    
   
    <table border="0">
        <tr>
            <td>Produkta nosaukums</td>
            <td>Skaits</td>
            
        </tr

        <?php
        foreach ($lv_publiced as $p) {
            ?><tr>
                <td> <?php echo $p->nosaukums; ?></td>
                <td><?php echo $p->Skaits; ?></td>
                
            </tr><?php
    }
        ?>
    </table>
</div>