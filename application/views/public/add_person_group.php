<div id ="contest" class="span11 center_elem  main_elem">
    <h2>Pievienot grupu </h2>
    <div class ='form_settings'>
        <?php echo form_open('Products_public/take_add_person_group'); ?>

        <p>
            <?php
            echo '<span>' . form_label('Nosaukums', 'name') . '</span>';

            $data = array(
                'name' => 'name',
                'id' => 'name',
                'maxlength' => '45',
                'value' => $group->nosaukums
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
