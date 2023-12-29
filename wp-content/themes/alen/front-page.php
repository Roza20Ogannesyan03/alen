<?php
get_header(); ?>

<main>
    <div class="container">
        <div class="slider">
            <div class="swiper" id="slider">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?
                    $slides = get_field('slider');

                    foreach ($slides as $slide) {
                    ?>

                        <!-- Slides -->
                        <div class="swiper-slide slider__slide">
                            <img class="slide__img" src="<?= $slide['img']; ?>" alt="<?= $slide['title']; ?>">
                            <div class="slide__content">
                                <div class="slide__title">
                                    <?= $slide['title']; ?>
                                </div>
                                <div class="slide__subtitle">
                                    <?= $slide['subtitle']; ?>
                                </div>
                                <div class="button button-blue">
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
                                </div>
                            </div>
                        </div>

                    <?php

                    }
                    ?>

                </div>


                <!-- If we need navigation buttons -->
                <div class="slider__swiper-button-prev">
                    <img class="arrow-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/right.svg" alt="" />
                </div>
                <div class="slider__swiper-button-next">
                    <img class="arrow-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/left.svg" alt="" />
                </div>
            </div>
        </div>

        <div class="activity">
            <div class="title-container">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini-logo.png" class="mini-logo" alt="" />
                <h2 class="title">Направление деятельности</h2>
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
    </div>

    <div class="centre">
        <div class="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad01543cb7354e0d9fd5f4e96b2eb907bf395522868fbc334e97b6a6de29c030e&amp;width=800&amp;height=590&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <div class="support">
            <p class="support__title">При поддержке</p>
            <p class="support__text">фонда президентских грантов</p>
        </div>
        <div class="content">
            <h2 class="title"><? the_field('center'); ?></h2>
            <? the_field('center_desc'); ?>
            <a href="/о-нас/" class="more">
                <p class="button__text">узнать Подробнее</p>
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
    </div>

    <div class="container">
        <form action="" class="form">
            <div class="form__title title">Форма обратной связи</div>
            <div class="form__subtitle">
                Мы ответим на все интересующие вопросы!
            </div>
            <div class="inputs">
                <div class="name_email">
                    <input type="text" name="name" class="input" placeholder="Ваше имя" />
                    <input type="email" name="email" id="email" class="input" placeholder="Ваш телефон" />
                </div>
                <textarea name="message" id="message" class="message" placeholder="Сообщение"></textarea>
            </div>
            <div class="politika">
                <p class="agreement">
                    Нажимая на кнопку, вы даёте согласие на обработку персональных
                    данных.
                </p>
                <div class="button button-blue">
                    <p class="button__text">Отправить заявку</p>
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
                </div>
            </div>
            <img class="ptichka" src="<?php echo get_template_directory_uri(); ?>/assets/images/ptichka.png" alt="" />
        </form>

        <div class="answers-wrapper">
            <div class="title-container">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini-logo.png" class="mini-logo" alt="" />
                <h2 class="title">Вопрос-ответ</h2>
            </div>

            <div class="answers">


                <?
                $answers = get_field('ans');

                foreach ($answers as $answer) {
                ?>


                    <div class="answers__item">
                        <div class="answers__item_number"><?= $answer['num']; ?></div>
                        <div class="answers__item_content">
                            <div class="answers__item_title">
                                <?= $answer['answer']; ?>
                            </div>
                            <p class="answers__item_description">
                                <?= $answer['quest']; ?>
                            </p>
                        </div>
                        <div class="answers__item_plus">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.7" d="M16 8.71198H8.88802V16H7.11198V8.71198H0V7.28802H7.11198V0H8.88802V7.28802H16V8.71198Z" fill="#282938" />
                            </svg>
                        </div>
                    </div>
                <?php

                }
                ?>


            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>