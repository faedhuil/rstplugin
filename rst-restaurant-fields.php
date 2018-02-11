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

function rst_meta_callback() {

    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="restaurant-id" class="rst-row-title">Restaurant ID</label>
            </div>
            <div class="meta-td">
                <input type="text" name="restaurant-id" id="restaurant-id" value="">
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <span>Allgemeines</span>
            </div>
        </div>
    </div>
    
    <?php

}