<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */


?>

<?php $column_style = labb_get_column_class(intval($settings->per_line)); ?>

<?php

$bar_color = $settings->bar_color;
if(preg_match('/^[a-f0-9]{6}$/i', $bar_color))
    $bar_color = '#' . $bar_color;

$track_color = $settings->track_color;
if(preg_match('/^[a-f0-9]{6}$/i', $track_color))
    $track_color = '#' . $track_color;

$bar_color = ' data-bar-color="' . esc_attr($bar_color) . '"';
$track_color = ' data-track-color="' . esc_attr($track_color) . '"';

?>

<div class="labb-piecharts labb-grid-container">

    <?php foreach ($settings->piecharts as $piechart): ?>

        <?php if (!is_object($piechart))
            continue; ?>

        <div class="labb-piechart <?php echo $column_style; ?>">

            <div class="labb-percentage" <?php echo $bar_color; ?> <?php echo $track_color; ?>
                 data-percent="<?php echo round($piechart->percentage); ?>">

                <span><?php echo round($piechart->percentage); ?><sup>%</sup></span>

            </div>

            <div class="labb-label"><?php echo esc_html($piechart->stats_title); ?></div>

        </div>

        <?php

    endforeach;

    ?>

</div>