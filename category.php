<?php get_header(); ?>
<div class="container mx-auto">

    <?php get_template_part('template-parts/navbar'); ?>


    <h1 class="flex my-12">
        <div class="text-[120px] rounded-full px-40 py-12 font-[bebas-neue-semirounded] border-[12px] border-blue-900 text-blue-900">
            <?php echo single_cat_title(); ?>
        </div>
    </h1>

    <div class="grid grid-cols-3">

        <?php
        while (have_posts()) {
            the_post();
            echo printCardBlogHTML('',
                get_the_ID(),
                get_the_permalink(),
                get_the_title(),
                get_the_excerpt(),
                get_the_author(),
                get_the_date()
            );
            ?>

            <?php
        }
        ?>
    </div>
    <?php  get_template_part('template-parts/backbutton');?>
</div>

<?php get_footer(); ?>
