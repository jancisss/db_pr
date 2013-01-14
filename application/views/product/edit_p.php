<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Labot produktu  </h2>
    <div class ='form_settings'>
        <?php echo form_open("Product/takeedit"); 
        //print_r($product);?>

        <p>
            <?php
            echo form_error('nosaukums');
            echo '<span>' . form_label('Nosaukums', 'nosaukums') . '</span>';

            $data = array(
                'name' => 'nosaukums',
                'id' => 'nosaukums',
                'maxlength' => '45',
                'value' => $product->nosaukums
            );

            echo form_input($data);
            ?>
        </p>
        <p>
            <?php
            echo '<span>' . form_label('Cena', 'cena') . '</span>';

            $data = array(
                'name' => 'cena',
                'id' => 'cena',
                'maxlength' => '8',
                'value' => $product->cena
            );

            echo form_input($data);
            ?>
        </p>

        <p>
            <?php
            echo '<span>' . form_label('Apraksts', 'aparksts') . '</span>';


            $data = array(
                'name' => 'apraksts',
                'id' => 'apraksts',
                'maxlength' => '1000',
                'value' => $product->apraksts
            );

            echo form_textarea($data);
            ?>
        </p>
        <?php
        foreach ($firms as $firm) {

            echo '<p><span>' . form_label($firm->nosaukums, $firm->firmas_ID) . '</span>';

            $data = array(
                'name' => 'firm_' . $firm->firmas_ID,
                'id' => $firm->firmas_ID,
                'class' => 'checkbox',
                'value' => $firm->firmas_ID,
                'checked' => $firm->firmas_ID
            );
            echo form_checkbox($data) . '</p>';
        }

          ?><p>
            <?php
            
            echo '<span>' . form_label('Ražotājfirma', 'raz_firma') . '</span>';
            if ($defult_firm == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
                echo form_dropdown('r_firm', $firm_drop, 0);
            else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
                echo form_dropdown('r_firm', $firm_drop, $defult_firm);
            ?>

        </p>
     


        <?php
        
        $data = array(
                'name' => 'product_ID',
                'type' =>'hidden',
                'value' => $product->product_ID
            );

            echo form_input($data);
        
        $data = array(
            'name' => 'save',
            'class' => 'submit',
            'value' => 'pievienot',
            'id' => 'submit_img'
        );


        echo form_submit($data);
        echo form_close();
        ?>


        </form>




    </div>
</div>
