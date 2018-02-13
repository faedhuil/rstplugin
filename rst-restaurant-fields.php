<?php

function rst_add_custom_metabox() {

    add_meta_box(
        'rst_meta',
        'RestaunrantListing',
        'rst_meta_callback',
        'restaurant',
        'normal',
        'core'
    );

}

add_action( 'add_meta_boxes', 'rst_add_custom_metabox' );

function rst_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'rst_restaurants_nonce' );
    $rst_stored_meta = get_post_meta( $post->ID );
    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="restaurant-id" class="rst-row-title">Restaurant ID</label>
            </div>
            <div class="meta-td">
                <input type="text" name="restaurant-id" id="restaurant-id" value="<?php if ( ! empty ( $rst_stored_meta['restaurant_id'] ) ) echo esc_attr( $rst_stored_meta['restaurant_id'][0] ); ?>" />
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <span>Allgemeines</span>
            </div>
        </div>
        <div class="meta-editor"></div>
        <?php
        $content = get_post_meta( $post->ID, 'allgemeines', true );
        $editor = 'principle_duties';
        $settings = array(
            'textarea_rows' => 8,
            'media_buttons' => true,
        );

        wp_editor( $content, $editor, $settings );
        ?>

    </div>
    <?php
}

function rst_meta_save() {
    // Check save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'rst_restaurants_nonce' ] ) && wp_verify_nonce( $_POST[ 'rst_restaurants_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST['restaurant_id'] ) ) {
        update_post_meta( $post_id, 'restaurant_id', sanatize_text_field($_POST[ 'restaurant_id' ] ) );
    }

}
add_action( 'save_post', 'rst_meta_save');
