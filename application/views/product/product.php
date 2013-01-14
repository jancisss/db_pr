<div id ="contest" class="span11 center_elem  main_elem">

    <?php //print_r($firms);
    ?>
    <a href="<?php echo base_url("Product/edit_p").'/'.$product[0]->produkts_ID; ?>">Labot</a>
    <table border="0">
        <tr>
            <td>Nosaukums</td>
            <td><?php echo $product[0]->nosaukums; ?></td>

        </tr
        <tr>
            <td>Cena</td>
            <td><?php echo $product[0]->cena; ?></td>
        </tr
        <tr>
            <td>Apraksts</td>
            <td><?php echo $product[0]->apraksts; ?></td>
        </tr
        <tr>
            <td>Ražotājfirma</td>
            <td><a href="<?php echo base_url("Product/firm") . '/' . $product[0]->raz_firm_ID; ?>"><?php echo $product[0]->firm_name; ?></a></td>
        </tr
        <tr>
            <td>Izpaltītājfirmas</td>
            <td><?php foreach ($firms as $firm) {
        ?><a href="<?php echo base_url("Product/firm/$firm->firmas_ID"); ?>"> <?php echo $firm->nosaukums . '</br>'; ?></a><?php }
    ?></td>
        </tr
        

    </table>
    <div>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Līdz</td>
            <td>Cena</td>
            <td>Valsts</td>
            <td>Pilsēta</td>
        </tr>
        <?php foreach($publiced as $p){
            ?><tr>
            <td><?php echo $p->no;?></td>
            <td><?php echo $p->lidz;?></td>
            <td><?php echo $p->Cena;?></td>
            <td><?php echo $p->valsts;?></td>
            <td><?php echo $p->pilseta;?></td>
        </tr><?php
        } ?>
        
       
    </table
    </div>
</div>