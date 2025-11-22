<?php
/*
Template Name: Contest Winners Template
*/
get_header();

$log_file = __DIR__ . '/gallery-debug.log';
function log_gallery_debug($message) {
    global $log_file;
    error_log(date('[Y-m-d H:i:s] ') . $message . "\n", 3, $log_file);
}
?>
<!-- Inline styling (adjust as needed) -->
<style>
/* Mobile Styles */
@media screen and (max-width: 768px) {
    .d-captionbyline {
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        text-align: left !important;
        width: 100% !important;
    }
    .d-byline-title {
        text-align: left !important;
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
        height: auto !important;
        min-height: 1px !important;
        position: relative !important;
        z-index: 10 !important;
        margin-top: 5px !important;
    }
    .nameandorg {
        display: inline-block !important;
        width: auto !important;
        white-space: nowrap !important;
        visibility: visible !important;
    }
}
</style>

<?php
/**
 * Display a contest group.
 *
 * @param string $group_name The ACF group name (e.g., 'first_place_group').
 * @param string $suffix     Suffix to append to field names (e.g., '1', '2p', '3p', 'hm4', etc.).
 */
function display_contest_group($group_name, $suffix) {
    if (have_rows($group_name)) :
        while (have_rows($group_name)) : the_row();
            // Get all the fields with proper names
            $one_single_image = get_sub_field('one_single_image');
            $main_project_link = get_sub_field('main_project_link');
            $firstname = get_sub_field('firstname_' . $suffix);
            $lastname = get_sub_field('lastname_' . $suffix);
            $team_members = get_sub_field('team_members_' . $suffix);
            $publication = get_sub_field('publication_' . $suffix);
            $entry_title = get_sub_field('entry_title_' . $suffix);
            $entry_description = get_sub_field('entry_description');
            $gallery_images = get_sub_field('gallery');
            ?>
            <div class="contest-group contest-group-<?php echo esc_attr($suffix); ?>">
                <div class="c-ovpi-gallery w-container">
                    <div class="d-place-top">
                        <div class="place"><?php the_sub_field('place_' . $suffix); ?></div>
                    </div>
                    
                    <!-- Main Image with Optional Link -->
                    <div class="d-image" style="position: relative;">
                        <?php if ($one_single_image) : ?>
                            <?php if (!empty($main_project_link) && isset($main_project_link['url'])) : ?>
                                <a href="<?php echo esc_url($main_project_link['url']); ?>" target="<?php echo esc_attr($main_project_link['target']); ?>">
                            <?php endif; ?>
                            <img src="<?php echo esc_url($one_single_image['url']); ?>" alt="<?php echo esc_attr($one_single_image['alt']); ?>" />
                            <?php if (!empty($main_project_link) && isset($main_project_link['url'])) : ?>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Caption & Byline -->
                    <div class="d-captionbyline" style="display: flex; flex-direction: column; width: 100%; margin-top: 5px;">
                        <div class="d-byline-title" style="text-align: right; font-weight: bold; display: block; margin-top: 5px;">
                            <div class="nameandorg">
                                <?php
                                if (!empty($firstname)) { echo esc_html($firstname) . ' '; }
                                if (!empty($lastname) && !empty($publication)) { echo esc_html($lastname) . '/'; }
                                elseif (!empty($lastname)) { echo esc_html($lastname); }
                                if (!empty($publication)) { echo esc_html($publication); }
                                ?>
                            </div>
                        </div>
                        <div class="d-stillcaption" style="text-align: left; margin-top: 5px;">
                            <?php echo esc_html($entry_description); ?>
                        </div>
                    </div>
                    
                    <!-- Team Members -->
                    <div class="d-teamentry" style="margin-top: 5px;">
                        <?php echo esc_html($team_members); ?>
                    </div>
                    
                    <br><br><br>
                    
                    <!-- Story Links with Thumbnails -->
                    <div class="storylinks-thumbnails" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; align-items: stretch;">
                        <?php 
                        // Dynamic story links based on suffix
                        for ($i = 1; $i <= 7; $i++) {
                            $link_field = $suffix . '_storylink' . $i;
                            $image_field = 'storylink' . $i . '_image';
                            
                            $link = get_sub_field($link_field);
                            $image = get_sub_field($image_field);
                            
                            if ($image) :
                        ?>
                            <div style="flex: 1 1 auto; max-width: 300px;">
                                <?php if ($link && isset($link['url'])) : ?>
                                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
                                <?php endif; ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php if ($link && isset($link['url'])) : ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php 
                            endif;
                        }
                        ?>
                    </div>
                    
                    <br><br><br>
                    
                    <!-- Gallery Using Soliloquy -->
                    <?php if (!empty($gallery_images)) : ?>
                        <div class="d-image">
                            <?php
                            $image_ids = array();
                            foreach ($gallery_images as $gallery_image) {
                                if (isset($gallery_image['ID'])) {
                                    $image_ids[] = $gallery_image['ID'];
                                }
                            }
                            $image_ids_string = implode(',', $image_ids);
                            if (!empty($image_ids)) {
                                echo '<div class="project-images-slider">';
                                soliloquy_dynamic(array(
                                    'id' => 'custom-project-images' . $suffix,
                                    'images' => $image_ids_string
                                ));
                                echo '</div>';
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Bottom Byline / Caption -->
                    <div class="d-byline-caption">
                        <div class="d-byline-item">
                            <div class="d-byline-photog">
                                <?php echo esc_html($firstname . ' ' . $lastname); ?>
                            </div>
                            <div class="d-byline-title">
                                <span class="entrytitle"><?php echo esc_html($entry_title); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    endif;
}
?>

<div class="container">
    <h1>Picture Editing Contest Winners</h1>
    <?php display_contest_group('first_place_group', '1'); ?>
    <?php display_contest_group('second_place_group', '2p'); ?>
    <?php display_contest_group('third_place_group', '3p'); ?>
    <?php display_contest_group('hm4_place_group', 'hm4'); ?>
    <?php display_contest_group('hm5_place_group', 'hm5'); ?>
    <?php display_contest_group('hm6_place_group', 'hm6'); ?>
</div>

<?php get_footer(); ?>