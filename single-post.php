<?php get_header(); ?>

<?php
the_post();
$categories = get_the_category();
?>

<div class="container mx-auto">
    <div class="max-w-[1000px] mx-auto">
        <div class="flex justify-between">
            <div class="mx-6 my-3 row-start-1 my-auto">
                <a href="<?php echo get_site_url(); ?>">
                    <div class="font-[bebas-neue-semirounded] text-4xl">
                        Morgan Thibert @ 2022
                    </div>
                </a>
            </div>
            <div class="hidden mx-6 my-auto
            md:block
">
                <div class="flex flex-row justify-center">
                    <a href="<?php echo getLinkFacebook(); ?>"><i class="fa-brands fa-instagram text-2xl mx-4"></i></a>
                    <a href="<?php echo getLinkFacebook(); ?>"><i class="fa-brands fa-facebook text-2xl mx-4"></i></a>
                    <a href="<?php echo getLinkGithub(); ?>"><i class="fa-brands fa-github text-2xl mx-4"></i></a>
                </div>
            </div>
        </div>


        <div class="bg-gray-2003 px-6 my-2 bg-gray-200
        xl:mb-4">
            <div class="w-full flex flex-col">
                <div class="w-full ">
                    <div class="font-[bebas-neue-semirounded] text-4xl py-8 mt-6 border-b-4 border-t-4 border-black">
                        <?php the_title(); ?>
                    </div>
                </div>
                <div id="tag-container" class="flex my-4 border-b border-black
                md:border-none
">
                    <?php foreach ($categories as $category) { ?>
                        <a href="<?php echo get_category_link($category); ?>">
                            <div class="article-card__tag-link tag-link category-<?php echo $category->slug;?>"><?php echo $category->name; ?></div>
                        </a>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="px-8 py-14
        md:border-t border-black
">
            <div class="article__content">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="bg-gray-200">
            <div class="mx-6 mt-8 pl-4 pt-2 pb-4 italic border-t-2 border-black capitalize">Written by <?php echo ucfirst(get_the_author()); ?>.</div>
        </div>
        <?php get_template_part('template-parts/backbutton'); ?>
    </div>
</div>


<?php get_footer(); ?>
