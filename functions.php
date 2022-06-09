<?php

function add_theme_scripts()
{
    wp_enqueue_style('custom_style', get_theme_file_uri('/dist/style.css'));
    wp_enqueue_style('fonts', 'https://use.typekit.net/myn3ozr.css');
    wp_enqueue_style('icons', get_theme_file_uri('/node_modules/@fortawesome/fontawesome-free/css/all.css'));
}

function getLinkInstagram()
{
    return 'https://instagram.com';
}

function getLinkFacebook()
{
    return 'https://facebook.com';
}

function getLinkGithub()
{
    return 'https://github.com/o0moragan0o';
}

function printCardBlogHTML($position, $id, $permalink, $title, $description, $author, $date)
{
    $categories = get_the_category();
    ob_start(); ?>
    <div class="article-card">
        <div id="first-article" class="px-6 py-8">
            <div class="article-card__number"><?php echo str_pad($position, 2, '0', STR_PAD_LEFT); ?></div>
            <a href="<?php echo $permalink; ?>" target="_blank">
                <div class="article-card__title"><?php echo $title ?></div>
            </a>
            <div class="article-card__tag-container">
                <?php foreach ($categories as $category) { ?>
                    <a href="<?php echo get_category_link($category);?>">
                        <div class="article-card__tag-link"><?php echo $category->name; ?></div>
                    </a>
                <?php } ?>
            </div>
            <a href="<?php echo $permalink; ?>" target="_blank">
                <div class="flex flex-col">

                    <div class="article-card__card-description">
                        <?php echo $description; ?>
                        <a href="<?php echo $permalink; ?>">
                            <div class="button float-right mt-10 ml-4 bg-black text-white px-4 py-2 font-[bebas-neue-semirounded] text-3xl">
                                Continue Reading >
                            </div>
                        </a>
                    </div>
                </div>
            </a>
            <div class="article-card__footer">
                Written by <?php echo $author; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');
