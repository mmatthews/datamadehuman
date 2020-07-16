<form class="register" id="register-form" method="post" enctype="multipart/form-data" id="gform_1" novalidate="novalidate">
  <div class="form-wrapper">
    <div class="loading"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/rolling.svg" /></div>
    <div id="errors" role="alert" aria-atomic="true"></div>

    <div class="gform_body">

      <div class="form-wrap">


      <?php
        $form = GFAPI::get_form( 1 );
        //echo '<script> console.log(' . json_encode($form["fields"]) . ') </script>';

        $form_output = '';
        foreach($form['fields'] as $field){

          $field_output = '';          
          
          $id = $field['id'];
          $type = $field['type'];
          $label = $field['label'];
        
          $required = $field['isRequired'];

          switch ($type) {
            case 'text':
              
              $field_output .= '
                <div class="input-box" id="input_' . $id . '">
                  <input name="input_' . $id . '" type="text" value="" ' . ( $required ? 'required aria-required="true"' : '' ) . ' />
                  <label class="gfield_label" for="input_' . $id . '">' . $label . ( $required ? ' <span class="gfield_required">*</span>' : '' ) . '</label>
                </div>';
              break;

            case 'textarea':
            
              $field_output .= '
                <div class="input-box textarea full" id="input_' . $id . '">
                  <textarea name="input_' . $id . '" type="text" value="" ' . ( $required ? 'required aria-required="true"' : '' ) . ' ></textarea>
                  <label class="gfield_label" for="input_' . $id . '">' . $label . ( $required ? ' <span class="gfield_required">*</span>' : '' ) . '</label>
                </div>';
              break;              

            case 'phone':
              
              $field_output .= '
                <div class="input-box" id="input_' . $id . '">
                  <input name="input_' . $id . '" type="text" value="" ' . ( $required ? 'required aria-required="true"' : '' ) . ' />
                  <label class="gfield_label" for="input_' . $id . '">' . $label . ( $required ? ' <span class="gfield_required">*</span>' : '' ) . '</label>
                </div>';
              break;

            case 'email':
              
              $field_output .= '
                <div class="input-box" id="input_' . $id . '">
                  <input name="input_' . $id . '" type="text" value="" ' . ( $required ? 'required aria-required="true"' : '' ) . ' />
                  <label class="gfield_label" for="input_' . $id . '">' . $label . ( $required ? ' <span class="gfield_required">*</span>' : '' ) . '</label>
                </div>';
              break;

            case 'select':

              $choices = $field['choices'];
              
              $field_output .= '<div class="input-box" id="input_' . $id . '">';
                $field_output .= '<select name="input_' . $id . '" ' . ( $required ? 'required aria-required="true"' : '' ) . '>';
                $field_output .= '<option></option>';
                  foreach($choices as $choice){
                    $field_output .= '<option value="' . $choice['value'] . '">' . $choice['text'] . '</option>';
                  }
                $field_output .= '</select>';
                $field_output .= '<label class="gfield_label" for="input_' . $id . '">' . $label . ( $required ? ' <span class="gfield_required">*</span>' : '' ) . '</label>';
              $field_output .= '</div>';

              break;   

            case 'checkbox':

              $field_output .= '
                <div class="input-box full check">
                  <label class="gfield_consent_label" for="input_' . $id . '">
                    <input name="input_' . $id . '" class="checkbox visuallyhidden" id="input_' . $id . '" type="checkbox" value="Yes">' . $field['description'] . '
                  </label>
                </div>';
              break;
          }
          
          $form_output .= $field_output;

        }

        echo $form_output;


      ?>


        <input class="visuallyhidden" tabindex="-1" type="text" name="petname" id="petname" value="" />
        <input class="visuallyhidden" tabindex="-1" type="hidden" name="form_id" value="1" />

        <div class="input-box full center">
          <input type="submit" class="button" value="<?= $contact_form['submit_button_text']; ?>">
        </div>

      </div> <!-- end form-wrap -->
    </div> <!-- end gform_body -->

  </div>
</form>