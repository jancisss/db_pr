<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Pievienot personu </h2>
    <div class ='form_settings'>
        <?php echo form_open('Products_public/take_person_add'); ?>

        <p>
            <?php
            echo '<span>' . form_label('Vārds', 'vards') . '</span>';

            $data = array(
                'name' => 'vards',
                'id' => 'vards',
                'maxlength' => '45',
                'value' => $person->vards
            );

            echo form_input($data);
            ?>
        </p>
         <p>
            <?php
            echo '<span>' . form_label('Uzvārds', 'uzvards') . '</span>';

            $data = array(
                'name' => 'uzvards',
                'id' => 'uzvards',
                'maxlength' => '45',
                'value' => $person->uzvards
            );

            echo form_input($data);
            ?>
        </p>
        
        <p>
            <?php
            echo '<span>' . form_label('Personas kods', 'per_kods') . '</span>';

            $data = array(
                'name' => 'per_kods',
                'id' => 'per_kods',
                'maxlength' => '45',
                'value' => $person->personas_kods
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
                'value' => $person->adrese
            );

            echo form_input($data);
            ?>
        </p>
        <p>
            <?php
            echo '<span>' . form_label('Klientu grupa', 'group') . '</span>';
            if ($defult_group == 0) //Ja nav norÄ�dÄ«ta kura kategorija 0 -defultÄ�
                echo form_dropdown('group', $group_drop, 0);
            else //NorÄ�dita kura kategorija bija norÄ�dÄ«ta
                echo form_dropdown('group', $group_drop, $defult_group);
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
