<?php

$post_type = $args['post_type'] ?? 'post';
$posts_per_page = $args['posts_per_page'] ?? 9999;

$posts = get_posts(array(
    'post_type' => $post_type,
    'posts_per_page' => $posts_per_page,
));

?>

<?php if ($posts) : ?>
    <?php foreach ($posts as $post) : setup_postdata($post); ?>
        <?php
        $coordinates = get_field('coordinate');
        $main_image = get_field('bild');
        ?>
        <div class="easyrealestate-app-list-item"
            data-id="<?php the_ID(); ?>"
            data-title="<?php the_field('name') ?>"
            data-description="<?php the_field('description'); ?>"
            data-img="<?php echo esc_url($main_image['sizes']['medium_large']); ?>"
            data-available="<?php echo get_field('is_available') ? '1' : '0' ?>"
            data-lat="<?php echo $coordinates['lat'] ?>"
            data-lng="<?php echo $coordinates['lng'] ?>">
            <div class="easyrealestate-app-list-item-image">
                <a href="<?php echo get_permalink(); ?>">
                    <img src="<?php echo esc_url($main_image['sizes']['medium_large']); ?>" alt="<?php the_field('name'); ?>" />
                </a>
                <?php if (get_field('is_available')) : ?>
                    <div class="easyrealestate-app-list-item-details-available">
                        <div class="easyrealestate-badge easyrealestate-badge-success">
                            <span> Verfügbar</span>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="easyrealestate-app-list-item-details-available">
                        <div class="easyrealestate-badge easyrealestate-badge-error">
                            <span> Nicht verfügbar</span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="easyrealestate-app-list-item-details">
                <h3><?php the_field('name') ?></h3>
                <p><?php the_field('description') ?></p>
                <div class="easyrealestate-app-list-item-details-features">
                    <?php
                    $features = get_field('features');
                    ?>
                    <?php foreach ($features as $feature): ?>
                        <div class="easyrealestate-app-list-item-details-feature-item">
                            <img width="20" height="20" src="<?php echo esc_url($feature['icon']); ?>" alt="">
                            <span><?php echo esc_html($feature['label']); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <p>Keine Beiträge gefunden.</p>
<?php endif; ?>