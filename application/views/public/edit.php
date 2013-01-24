<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Pievienot reklamēšanās reizi  </h2>
    <div class ='form_settings'>
        <?php echo form_open('Products_public/take_edit'); ?>

        <p>
            <?php
            echo '<span>' . form_label('Cena', 'cena') . '</span>';

            $data = array(
                'name' => 'cena',
                'id' => 'cena',
                'maxlength' => '45',
                'value' => $public->cena
            );

            echo form_input($data);
            ?>
        </p>
        <p>
            <?php
            echo '<span>' . form_label('Pasūtītājs firma', 'firm') . '</span>';
            if ($defult_firm == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
                echo form_dropdown('firm', $firm_drop, 0);
            else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
                echo form_dropdown('firm', $firm_drop, $defult_firm);
            ?>

        </p>


        <p>
            <?php
            echo '<span>' . form_label('Pasūtītājs persona', 'person') . '</span>';
            if ($defult_person == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
                echo form_dropdown('person', $person_drop, 0);
            else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
                echo form_dropdown('person', $person_drop, $defult_person);
            ?>

        </p>
        <p>
            <?php
            echo '<span>' . form_label('Reklāmas vieta', 'place') . '</span>';
            if ($defult_place == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
                echo form_dropdown('place', $place_drop, 0);
            else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
                echo form_dropdown('place', $place_drop, $defult_place);
            ?>

        </p>
        
         <p>
            <?php
            echo '<span>' . form_label('Produkts', 'product') . '</span>';
            if ($defult_product == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
                echo form_dropdown('produkts_ID', $product_drop, 0);
            else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
                echo form_dropdown('produkts_ID', $product_drop, $defult_product);
            ?>

        </p>
     







        <?php
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
