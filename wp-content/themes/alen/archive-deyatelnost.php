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
        <h1 class="title">Деятельность</h1>
    </div>



    <?php
    $args = [
        'post_type' => 'deyatelnost',
        'posts_per_page' => -1,
        'paged' => $paged,
    ];
    $post_query = new WP_Query($args);
    if ($post_query->have_posts()) {
    ?>
        <div class="services">



            <?php
            $i = 1;
            while ($post_query->have_posts()) {
                $post_query->the_post();
                $post_query->post;

            ?>


                <div class="services__item">
                    <div class="num_title">
                        <div class="number"><?php the_field('number_deyat'); ?></div>
                        <div class="services__text">
                            <?php the_title(); ?>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="button  <? if ($i % 2 == 0) { ?> button-blue <? } else { ?>button-white<? } ?>">
                        <p class="button__text"><?php the_field('more', 'option'); ?></p>
                        <svg width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#a)" fill="#fff">
                                <path d="M9 18c-4.963 0-9-4.037-9-9s4.037-9 9-9 9 4.037 9 9-4.037 9-9 9ZM9 1.125C4.658 1.125 1.125 4.658 1.125 9c0 4.342 3.533 7.875 7.875 7.875 4.342 0 7.875-3.533 7.875-7.875 0-4.342-3.533-7.875-7.875-7.875Z" />
                                <path d="M12.938 9.563H5.061a.563.563 0 0 1 0-1.126h7.875a.563.563 0 0 1 0 1.126Z" />
                                <path d="M9 13.5a.563.563 0 0 1-.563-.563V5.064a.563.563 0 0 1 1.126 0v7.875c0 .31-.253.562-.563.562Z" />
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="#fff" d="M0 0h18v18H0z" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>



            <?php
                $i++;
            } ?>
            <?php wp_reset_postdata(); ?>

        </div>
    <?php } ?>

</div>

<?php get_footer(); ?>