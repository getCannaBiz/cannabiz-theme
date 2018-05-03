<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all google fonts
 */
 class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control
 {
    /**
     * Render the content of the google font dropdown
     *
     * @return HTML
     */
    public function render_content()
    {
            ?>
                <label>
                    <span class="customize-google-font-select-control"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                        <?php
							printf('<option value="%s" %s>%s</option>', 'Oregano', selected( $this->value() ), 'Oregano');
							printf('<option value="%s" %s>%s</option>', 'Merriweather', selected( $this->value() ), 'Merriweather');
							printf('<option value="%s" %s>%s</option>', 'Open Sans', selected( $this->value() ), 'Open Sans');
							printf('<option value="%s" %s>%s</option>', 'Roboto', selected( $this->value() ), 'Roboto');
							printf('<option value="%s" %s>%s</option>', 'Lato', selected( $this->value() ), 'Lato');
							printf('<option value="%s" %s>%s</option>', 'Oswald', selected( $this->value() ), 'Oswald');
							printf('<option value="%s" %s>%s</option>', 'Source Sans', selected( $this->value() ), 'Source Sans');
							printf('<option value="%s" %s>%s</option>', 'Raleway', selected( $this->value() ), 'Raleway');
							printf('<option value="%s" %s>%s</option>', 'Lora', selected( $this->value() ), 'Lora');
							printf('<option value="%s" %s>%s</option>', 'Playfair Display', selected( $this->value() ), 'Playfair Display');
							printf('<option value="%s" %s>%s</option>', 'Ubuntu', selected( $this->value() ), 'Ubuntu');
							printf('<option value="%s" %s>%s</option>', 'Georgia', selected( $this->value() ), 'Georgia');
							printf('<option value="%s" %s>%s</option>', 'Times New Roman', selected( $this->value() ), 'Times New Roman');
							printf('<option value="%s" %s>%s</option>', 'Arial', selected( $this->value() ), 'Arial');
							printf('<option value="%s" %s>%s</option>', 'Helvetica', selected( $this->value() ), 'Helvetica');
                        ?>
                    </select>
                </label>
            <?php
    }

 }
?>