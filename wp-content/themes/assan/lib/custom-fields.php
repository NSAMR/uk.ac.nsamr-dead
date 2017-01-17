<?php
global $assan_meta_boxes;
$assan_meta_boxes = array("_assan_page_layout" => array(
        "name" => "_assan_page_layout",
        "title" => "Page Layout",
        "description" => "Select layout of page Left sidebar,Right sidebar and Fullwidth.",
        "type" => "select",
        "options" => array(
            array("value" => "FULL", "text" => "Fullwidth"),
            array("value" => "LEFT", "text" => "Left Sidebar"),
            array("value" => "RIGHT", "text" => "Right Sidebar")
        ),
        "location" => "Page"
    ),
    "_assan_page_sidebar" => array(
        "name" => "_assan_page_sidebar",
        "title" => "Choose a sidebar",
        "description" => "Choose between existing sidebars for left/right sidebar layout.",
        "type" => "sidebar",
        "location" => "Page"
    ),
    "_assan_slider" => array(
        "name" => "_assan_slider",
        "title" => "Theme Slider ",
        "description" => "Choose between existing Slider.",
        "type" => "select",
        "options" => array(
            array("value" => "", "text" => "Select Slider"),
            array("value" => "flex", "text" => "Flex Slider"),
            array("value" => "carousel", "text" => "Carousel Slide"),
            array("value" => "revolution", "text" => "Revolution Slider")
        ),
        "location" => "Page"
    ),
    "_assan_rev_slider" => array(
        "name" => "_assan_rev_slider",
        "title" => "Revolution Slider ",
        "description" => "Select Revolution slider on theme Theme Slider and Choose between existing Revolution Slider.",
        "type" => "rev_slider",
        "location" => "Page"
    ),
    //POST
    "_assan_post_audio_type" => array(
        "name" => "_assan_post_audio_type",
        "format" => "audio",
        "title" => "Select Audio Type",
        "description" => "",
        "type" => "select",
        "options" => array(
            array("value" => "ausoundcloud", "text" => "Sound Cloud"),
            array("value" => "aucustom", "text" => "Custom")
        ),
        "location" => "post"
    ),
    "_assan_post_audio_code" => array(
        "name" => "_assan_post_audio_code",
        "title" => "Audio Embed Code",
        "format" => "audio",
        "description" => "Write Your Audio Embed Code Here",
        "type" => "text",
        "location" => "post"
    ),
    "_assan_post_video_code" => array(
        "name" => "_assan_post_video_code",
        "format" => "video",
        "title" => "Video Embed Code",
        "description" => "Write Your Video Embed Code Here",
        "type" => "text",
        "location" => "post"
    ),
    "_assan_post_video_code_type" => array(
        "name" => "_assan_post_video_code_type",
        "format" => "video",
        "title" => "Select Vedio Type",
        "description" => "",
        "type" => "select",
        "options" => array(
            array("value" => "2", "text" => "Youtube"),
            array("value" => "3", "text" => "Vimeo")
        ),
        "location" => "post"
    ),
    //PORTFOLIO    
    "_assan_project_url" => array(
        "name" => "_assan_project_url",
        "title" => "Project Url",
        "description" => "Enter extrnal porject url",
        "type" => "text",
        "location" => "portfolio"
    ),
    //ONE PAGE SECTION
    "_assan_onepage_title" => array(
        "name" => "_assan_onepage_title",
        "title" => "Section Title",
        "description" => "OnePage Section Title.",
        "type" => "text",
        "location" => "OnePage"
    ),
    "_assan_onepage_subtitle" => array(
        "name" => "_assan_onepage_subtitle",
        "title" => "Subtitle",
        "description" => "OnePage Section Subtitle",
        "type" => "text",
        "location" => "OnePage"
    ),
    "_assan_onepage_layouts" => array(
        "name" => "_assan_onepage_layouts",
        "title" => "One Page section Layout",
        "description" => "Section Layout",
        "type" => "select",
        "options" => array(
            array("value" => "1", "text" => "Default"),
            array("value" => "2", "text" => "Fullwidth")
        ),
        "location" => "OnePage"
    ),
    "_assan_onepage_padding_top" => array(
        "name" => "_assan_onepage_padding_top",
        "title" => "Padding Top",
        "description" => "Section Top Padding in Px(eg. 50)",
        "type" => "text",
        "location" => "OnePage"
    ),
    "_assan_onepage_padding_bottom" => array(
        "name" => "_assan_onepage_padding_bottom",
        "title" => "Padding Bottom",
        "description" => "Section Bottom Padding in Px(eg. 50)",
        "type" => "text",
        "location" => "OnePage"
    ),
    "_assan_onepage_disable_menu" => array(
        "name" => "_assan_onepage_disable_menu",
        "title" => "Disable From Menu",
        "description" => "Disable Item in Menu",
        "type" => "checkbox",
        "location" => "OnePage"
    ),
    "_assan_onepage_bg_color" => array(
        "name" => "_assan_onepage_bg_color",
        "title" => "Section Background",
        "description" => "One Page Section Background.",
        "type" => "color",
        "location" => "OnePage"
    )
);

function crazy_assan_meta_boxes_page() {
    crazy_assan_new_meta_boxes('Page');
}

function crazy_assan_meta_boxes_post() {
    crazy_assan_new_meta_boxes('post');
}

function crazy_assan_meta_boxes_portfolio() {
    crazy_assan_new_meta_boxes('portfolio');
}

function crazy_assan_meta_boxes_onepage() {
    crazy_assan_new_meta_boxes('OnePage');
}

function crazy_assan_new_meta_boxes($type) {
    global $post, $assan_meta_boxes;
// Use nonce for verification
    echo '<input type="hidden" name="assan_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<div class="form-wrap">';
    foreach ($assan_meta_boxes as $meta_box) {
        if ($meta_box['location'] == $type) {
            $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
            $post_format = '';
            if ($meta_box['location'] == 'post'):
                $post_format = 'assan-post-meta-' . $meta_box['format'];
            endif;
            ?>
            <div class="<?php echo $post_format; ?> assan-form-field">
                <?php
                switch ($meta_box['type']) {
                    case 'sidebar':
                        global $post;
                        $post_id = $post;
                        if (is_object($post_id)) {
                            $post_id = $post->ID;
                        }
                        $selected_sidebar = get_post_meta($post_id, '_assan_page_sidebar', true);
                        ?>
                        <label for="<?php echo $meta_box['name'] ?>"><strong><?php echo $meta_box['title'] ?></strong></label>
                        <ul>
                            <?php
                            global $wp_registered_sidebars;
                            ?>
                            <li>
                                <select name="_assan_page_sidebar">
                                    <option value="0">No Sidebar</option>
                                    <?php
                                    $sidebars = $wp_registered_sidebars; // sidebar_generator::get_sidebars();
                                    if (is_array($sidebars) && !empty($sidebars)) {
                                        foreach ($sidebars as $sidebar) {
                                            if ($selected_sidebar == $sidebar['id']) {
                                                echo "<option value='{$sidebar['id']}' selected>{$sidebar['name']}</option>\n";
                                            } else {
                                                echo "<option value='{$sidebar['id']}'>{$sidebar['name']}</option>\n";
                                            }
                                        }
                                        ?>
                                    </select>
                                </li>
                            <?php }
                            ?>
                        </ul>
                        <?php if (isset($meta_box['description'])) echo '<p class="top15">' . $meta_box['description'] . '</p>'; ?>
                        <?php
                        break;
                    case 'select':
                        echo '<label for="' . $meta_box['name'] . '"><strong>' . $meta_box['title'] . '</strong></label>';
                        echo '<select name="' . $meta_box['name'] . '" id ="' . $meta_box['name'] . '">';
                        // Loop through each option in the array
                        foreach ($meta_box['options'] as $option) {
                            if (is_array($option)) {
                                echo '<option ' . ( $meta_box_value == $option['value'] ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
                            } else {
                                echo '<option ' . ( $meta_box_value == $option ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
                            }
                        }

                        echo '</select>';
                        if (isset($meta_box['description']))
                            echo '<p>' . $meta_box['description'] . '</p>';
                        break;
                    case 'text':
                        echo '<label for="' . $meta_box['name'] . '"><strong>' . $meta_box['title'] . '</strong></label>';
                        echo '<div class="assan-input"><input type = "text" name = "' . $meta_box['name'] . '" value = "' . $meta_box_value . '" /></div>';
                        if (isset($meta_box['description']))
                            echo '<p>' . $meta_box['description'] . '</p>';
                        break;
                    case 'checkbox':
                        echo '<label for="' . $meta_box['name'] . '"><strong>' . $meta_box['title'] . '</strong></label>';
                        echo '<div class="assan-input"><input type = "checkbox" name = "' . $meta_box['name'] . '" ' . checked($meta_box_value, 'Y', FALSE) . ' value = "Y" /> Yes</div>';
                        if (isset($meta_box['description']))
                            echo '<p>' . $meta_box['description'] . '</p>';
                        break;
                    case 'color':
                        echo '<label for="' . $meta_box['name'] . '"><strong>' . $meta_box['title'] . '</strong></label>';
                        echo '<div class="assan-input"><input type="text" name="' . $meta_box['name'] . '" value="' . $meta_box_value . '" class="ctassan-color-picker" ></div>';
                        if (isset($meta_box['description']))
                            echo '<p>' . $meta_box['description'] . '</p>';
                        break;
                        break;
                    case 'rev_slider':
                        global $wpdb;
                        echo '<label for="' . $meta_box['name'] . '"><strong>' . $meta_box['title'] . '</strong></label>';
                        echo '<select name="' . $meta_box['name'] . '" id ="' . $meta_box['name'] . '">';
                        echo '<option value="">inherit</option>';
                        if (function_exists('rev_slider_shortcode')) {
                            $getrev_sliders = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'revslider_sliders where `type` != "template" order by id ASC');
                            if ($getrev_sliders) {
                                foreach ($getrev_sliders as $slider) {
                                    echo '<option ' . selected($meta_box_value, $slider->alias, FALSE) . ' value="' . $slider->alias . '">' . $slider->title . '</option>';
                                }
                            }
                        }
                        echo '</select>';
                        if (isset($meta_box['description']))
                            echo '<p>' . $meta_box['description'] . '</p>';
                        break;
                        break;
                    case 'upload':
                        echo '<label for="' . $meta_box['name'] . '"><strong>' . $meta_box['title'] . '</strong></label>';
                        echo '<input id = "assan_preheader_image" type = "text" size = "90" name = "' . $meta_box['name'] . '" value = "' . $meta_box_value . '" />
                        <input class = "button assan_upload_button" input-data = "assan_preheader_image" type = "button" value = "' . esc_attr('Upload Image', 'assan') . '" />';
                        if (isset($meta_box['description']))
                            echo '<p>' . $meta_box['description'] . '</p>';
                        break;
                }
                echo '</div>';
            }
        }
        echo '</div>';
    }

    function crazy_assan_create_meta_box() {
        global $themename;
        if (function_exists('add_meta_box')) {
            add_meta_box('crazy_assan_meta_boxes_page', $themename . ' Theme Page Settings', 'crazy_assan_meta_boxes_page', 'page', 'normal', 'high');
            add_meta_box('crazy_assan_meta_boxes_post', $themename . ' Theme Post Settings', 'crazy_assan_meta_boxes_post', 'post', 'normal', 'high');
            add_meta_box('crazy_assan_meta_boxes_portfolio', $themename . ' Theme Portfolio Settings', 'crazy_assan_meta_boxes_portfolio', 'portfolio', 'normal', 'high');
            add_meta_box('crazy_assan_meta_boxes_onepage', $themename . ' Theme One Page Settings', 'crazy_assan_meta_boxes_onepage', 'onepage', 'normal', 'high');
        }
    }

    function crazy_assan_save_postdata($post_id) {
        if (!wp_verify_nonce(isset($_POST['assan_meta_box_nonce']) ? $_POST['assan_meta_box_nonce'] : '', basename(__FILE__))) {
            return $post_id;
        }
        if (wp_is_post_revision($post_id) or wp_is_post_autosave($post_id))
            return $post_id;
        global $post, $assan_meta_boxes;
        foreach ($assan_meta_boxes as $meta_box) {
            if ($meta_box['type'] != 'title)') {
                if ('page' == $_POST['post_type']) {
                    if (!current_user_can('edit_page', $post_id))
                        return $post_id;
                } else {
                    if (!current_user_can('edit_post', $post_id))
                        return $post_id;
                }
                if (isset($_POST[$meta_box['name']]) && is_array($_POST[$meta_box['name']])) {
                    $cats = '';
                    foreach ($_POST[$meta_box['name']] as $cat) {
                        $cats .= $cat . ",";
                    }
                    $data = substr($cats, 0, -1);
                } else {
                    $data = '';
                    if (isset($_POST[$meta_box['name']]))
                        $data = $_POST[$meta_box['name']];
                }
                if (get_post_meta($post_id, $meta_box['name']) == "")
                    add_post_meta($post_id, $meta_box['name'], $data, true);
                elseif ($data != get_post_meta($post_id, $meta_box['name'], true))
                    update_post_meta($post_id, $meta_box['name'], $data);
                elseif ($data == "")
                    delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
            }
        }
    }

    add_action('admin_menu', 'crazy_assan_create_meta_box');
    add_action('save_post', 'crazy_assan_save_postdata');
    