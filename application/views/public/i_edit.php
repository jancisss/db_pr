<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Labot reklamēšanās vietu  </h2>
    <div class ='form_settings'>
        <?php echo form_open('Products_public/takei_edit'); ?>

        <p>
            <?php
            echo '<span>' . form_label('Cena dienā', 'cena') . '</span>';

            $data = array(
                'name' => 'cena',
                'id' => 'cena',
                'maxlength' => '45',
                'value' => $place->cena_diena
            );

            echo form_input($data);
            ?>
        </p>
        <p>
            <?php
            echo '<span>' . form_label('Adrese', 'adrese') . '</span>';

            $data = array(
                'name' => 'adrese',
                'id' => 'adrese',
                'maxlength' => '45',
                'value' => $place->adrese
            );

            echo form_input($data);
            
            

            $data = array(
                'name' => 'ID',
                'id' => 'ID',
                'type' => 'hidden',
                'value' => $place->Reklam_reizes_ID
            );

            echo form_input($data);
            ?>
        </p>
        <p>
            <?php
            echo '<span>' . form_label('No(gggg-mm-dd hh:mm:ss)', 'no') . '</span>';

            $data = array(
                'name' => 'no',
                'id' => 'no',
                'maxlength' => '45',
                'value' => $place->no
            );

            echo form_input($data);
            ?>
        </p>
        <p>
            <?php
            echo '<span>' . form_label('Līdz(gggg-mm-dd hh:mm:ss)', 'lidz') . '</span>';

            $data = array(
                'name' => 'lidz',
                'id' => 'lidz',
                'maxlength' => '45',
                'value' => $place->lidz
            );

            echo form_input($data);
            ?>
        </p>


      <p>
        <?php
        echo '<span>' . form_label('Valsts', 'country') . '</span>';
        if ($defult_country == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
            echo form_dropdown('country', $country_drop, 0);
        else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
            echo form_dropdown('country', $country_drop, $defult_country);
        ?>

        </p>

        
         <p>
        <?php
      
        echo '<span>' . form_label('Pilsēta', 'city') . '</span>';
        if ($defult_city == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
            echo form_dropdown('city', $city_drop, 0);
        else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
            echo form_dropdown('city', $city_drop, $defult_city);
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
