<?php
function custom_lang_attributes($output)
{

    global $post;
    $default_lang_code = 'en-US';

    if (is_singular() && isset($post->ID)) {

        $language_field = get_field('language', $post->ID);

        $language_codes = array(
            'Dansk' => 'da-DK',
            'English' => 'en-GB',
            'Svenska' => 'sv-SE',
            'Norsk' => 'no-NO'
        );

        $lang_code = isset($language_codes[$language_field]) ? $language_codes[$language_field] : $default_lang_code;

        $output = preg_replace('/lang="[^"]*"/', 'lang="' . esc_attr($lang_code) . '"', $output);
    } else {
        $output = preg_replace('/lang="[^"]*"/', 'lang="' . esc_attr($default_lang_code) . '"', $output);
    }

    return $output;
}

add_filter('language_attributes', 'custom_lang_attributes');
