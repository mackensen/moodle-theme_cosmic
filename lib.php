<?php
    function cosmic_process_css($css, $theme) {
        if (!empty($theme->settings->logo)) {
            $logo = $theme->settings->logo;
        } else {
            $logo = null;
        }
        $css = cosmic_set_logo($css, $logo);
        $css = cosmic_set_breadcrumbwidth($css, $theme->settings->breadcrumbwidth);

        if(function_exists('rocket_process_css')) {
            $css = rocket_process_css($css, $theme);
        }
        return $css;
    }

    function cosmic_set_banner($css, $banner) {
        global $OUTPUT;
        $tag = '[[setting:banner]]';
        $replacement = $banner;
        if (is_null($replacement)) {
            $replacement = $OUTPUT->pix_url('banner/default','theme');
        }
        $css = str_replace($tag, $replacement, $css);
        return $css;
    }

    function cosmic_set_breadcrumbwidth($css, $width) {
        global $OUTPUT;
        $tag = '[[setting:breadcrumbwidth]]';
        $css = str_replace($tag, $width, $css);
        return $css;
    }

    function cosmic_set_logo($css, $logo) {
        global $OUTPUT;
        $tag = '[[setting:logo]]';
        $replacement = $logo;
        if (is_null($replacement)) {
            $replacement = $OUTPUT->pix_url('logo/logo','theme');
        }
        $css = str_replace($tag, $replacement, $css);
        return $css;
    }
?>
