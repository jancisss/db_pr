<div id ="contest" class="span11 center_elem  main_elem">
   
    <?php// print_r($product);
    ?>
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
            <td><a href="<?php echo base_url("Product/firm").'/'.$product[0]->raz_firm_ID; ?>"><?php echo $product[0]->firm_name; ?></a></td>
        </tr
        <tr>
            <td>Izpaltītājfirmas</td>
            <td><?php foreach ($firms as $firm) {
   ?><a href="<?php echo base_url("Product/firm/$firm->firmas_ID"); ?>"> <?php echo $firm->nosaukums.'</br>'; ?></a><?php }
?></td>
        </tr


    </table>
</div>