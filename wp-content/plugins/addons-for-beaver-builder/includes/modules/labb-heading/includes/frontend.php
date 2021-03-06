<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */

?>

<div class="labb-heading labb-<?php echo $settings->style; ?> labb-align<?php echo $settings->align; ?>">

    <?php if ($settings->style == 'style2' && !empty($settings->subtitle)): ?>

        <div class="labb-subtitle"><?php echo esc_html($settings->subtitle); ?></div>

    <?php endif; ?>

    <<?php echo esc_html($settings->title_tag); ?> class="labb-title"><?php echo wp_kses_post($settings->heading); ?></<?php echo esc_html($settings->title_tag); ?>>

    <?php if ($settings->style != 'style3' && !empty($settings->short_text)): ?>

        <p class="labb-text"><?php echo $settings->short_text; ?></p>

    <?php endif; ?>

</div>