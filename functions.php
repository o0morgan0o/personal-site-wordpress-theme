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
        <div id="first-article" class="px-8 py-8">
            <div class="article-card__number"><?php echo str_pad($position, 2, '0', STR_PAD_LEFT); ?></div>
            <a href="<?php echo $permalink; ?>" target="_blank">
                <div class="article-card__title"><?php echo $title ?></div>
            </a>
            <div class="article-card__tag-container">
                <?php foreach ($categories as $category) { ?>
                    <a href="<?php echo get_category_link($category);?>">
                        <div class="article-card__tag-link tag-link category-<?php echo $category->slug;?>"><?php echo $category->name; ?></div>
                    </a>
                <?php } ?>
            </div>
            <a href="<?php echo $permalink; ?>" target="_blank">
                <div class="flex flex-col">

                    <div class="article-card__card-description">
                        <?php echo $description; ?>
                        <a href="<?php echo $permalink; ?>">
                            <div class="btn-continue-reading border-black border-2 float-right mt-10 ml-4 bg-black text-white px-4 py-2 font-[bebas-neue-semirounded] text-3xl">
                                Continue Reading >
                            </div>
                        </a>
                    </div>
                </div>
            </a>
            <div class="article-card__footer">
                Written by <?php echo ucfirst($author); ?>.
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}


add_action('wp_enqueue_scripts', 'add_theme_scripts');


add_filter( 'excerpt_allowed_blocks', 'custom_remove_headings_blocks_excerpts', 100, 1 );
// Remove heading blocks from excerpts.
function custom_remove_headings_blocks_excerpts( $allowed_blocks ) {
    $key = array_search( 'core/heading', $allowed_blocks );
    if ( $key !== false ) {
        unset( $allowed_blocks[ $key ] );
    }
    return $allowed_blocks;
}
