<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Labot firmu  </h2>
    <div class ='form_settings'>
        <?php echo form_open('Product/take_edit_firm'); ?>

        <p>
            <?php
          
            echo '<span>' . form_label('reg_nr', 'reg_nr') . '</span>';

            $data = array(
                'name' => 'reg_nr',
                'id' => 'reg_nr',
                'maxlength' => '45',
                'value' => $firm->reg_nr
            );

            echo form_input($data);
            
            
            
            $data = array(
                'name' => 'ID',
                'id' => 'ID',
                'type' => 'hidden',
                'maxlength' => '45',
                'value' => $firm->ID
            );

            echo form_input($data);
            ?>
        </p>
        <p>
            <?php
            echo '<span>' . form_label('nosaukums', 'nosaukums') . '</span>';

            $data = array(
                'name' => 'nosaukums',
                'id' => 'nosaukums',
                'maxlength' => '45',
                'value' => $firm->nosaukums
            );

            echo form_input($data);
            ?>
        </p>
          <p>
            <?php
            echo '<span>' . form_label('adrese', 'adrese') . '</span>';

            $data = array(
                'name' => 'adrese',
                'id' => 'adrese',
                'maxlength' => '45',
                'value' => $firm->adrese
            );

            echo form_input($data);
            ?>
        </p>
         <p>
            <?php
            echo '<span>' . form_label('tel_nr', 'tel_nr') . '</span>';

            $data = array(
                'name' => 'tel_nr',
                'id' => 'tel_nr',
                'maxlength' => '45',
                'value' => $firm->tel_nr
            );

            echo form_input($data);
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
