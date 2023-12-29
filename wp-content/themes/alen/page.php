<?php
get_header(); ?>

<div class="container">
    <ul class="breadcrumb">

        <?php if (function_exists('bcn_display')) {
            bcn_display();
        } ?>
    </ul>
    <div class="title-container">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini-logo.png" class="mini-logo" alt="" />
        <h1 class="title"><?php the_title(); ?></h1>
    </div>

    <?php the_content(); ?>
</div>

<?php get_footer(); ?>