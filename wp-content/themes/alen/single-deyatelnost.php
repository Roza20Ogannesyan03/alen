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


    <form action="" class="form">
        <div class="form__title">Форма обратной связи</div>
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
</div>







<?php get_footer(); ?>