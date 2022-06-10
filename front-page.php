<?php get_header(); ?>

<?php
$all_posts = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'post',
    'orderby' => array(
        'date' => 'DESC'
    )
));
if ($all_posts->have_posts()) {
    $first_post = $all_posts->posts[0];
}
?>

<div class="container mx-auto">

    <div class="grid grid-cols-1
    xl:grid-cols-[1fr,2fr]
    2xl:grid-cols-[auto,1fr,auto]
">
        <div class="mx-6 my-4 row-start-1 my-auto flex flex-col justify-center">
            <a class="" href="<?php echo get_site_url(); ?>">

                <div class="morgan-thibert font-[bebas-neue-semirounded] text-4xl
            2xl:text-5xl
            ">
                    Morgan Thibert @ 2022
                </div>
            </a>
        </div>
        <div class="mt-4 row-start-2 my-3
                xl:row-start-1 xl:col-start-2">
            Lorem ipsum dolor sit amet. In quisquam nisi et quibusdam saepe sit fugiat doloribus At nisi distinctio!
            Sit voluptas omnis ex nostrum soluta ut voluptates aperiam. Et sunt sunt et autem aliquid et corporis
            ducimus ex asperiores sint aut magnam pariatur.
        </div>
        <div class="flex flex-row justify-center my-4 mx-8 hidden
           2xl:block 2xl:my-auto align-center
">
            <a target="_blank" href="<?php echo getLinkInstagram(); ?>"><i
                        class="fa-brands fa-instagram social-link"></i></a>
            <a target="_blank" href="<?php echo getLinkFacebook(); ?>"><i class="fa-brands fa-facebook social-link"></i></a>
            <a target="_blank" href="<?php echo getLinkGithub(); ?>"><i class="fa-brands fa-github social-link"></i></a>
        </div>

    </div>

    <div class="grid
    grid-cols-1
    2xl:grid-cols-[2fr,1fr] ">
        <div class="mx-6 mt-4">
            <h1 id="main-title" class="font-[tomarik-serif] uppercase text-center text-7xl my-10 tracking-[-0.12em]
            md:text-[100px]
            xl:text-[140px]
            2xl:text-[210px] 2xl:text-left
            ">Selected Work</h1>

            <div id="link-container">
                <div class="flex flex-row flex-wrap">
                    <div class="project-link">RaspiKeys</div>
                    <div class="project-link">Plotter Workshop</div>
                    <div class="project-link">Custom Library</div>
                </div>
            </div>
            <div id="tag-container" class="mt-2 mb-4">
                <div class="flex flex-row flex-wrap">
                    <?php
                    $all_categories = get_categories();
                    foreach ($all_categories as $category) {
                        ?>
                        <a href="<?php echo get_category_link($category); ?>">
                            <div class="tag-link category-<?php echo $category->slug; ?>"><?php echo $category->name; ?></div>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="font text-4xl font-[bebas-neue-semirounded] uppercase mt-8
            2xl:hidden">
                Blog and technical reviews
            </div>
        </div>
        <?php
        while ($all_posts->have_posts()) {
            $all_posts->the_post();
            if (get_the_ID() == $first_post->ID) {
                echo printCardBlogHTML(
                    $all_posts->found_posts,
                    get_the_ID(),
                    get_the_permalink(),
                    get_the_title(),
                    get_the_excerpt(),
                    get_the_author(),
                    get_the_date()
                );
                break;

            }
        }
        ?>
        <!--        section articles -->
        <div class="
        2xl:col-span-4 2xl:grid 2xl:grid-cols-3 2xl:gap-8">
            <?php
            $postCounter = 1;
            while ($all_posts->have_posts()) {
                $all_posts->the_post();
                if (get_the_ID() !== $first_post->ID)
                    echo printCardBlogHTML(
                        $all_posts->found_posts - $postCounter,
                        get_the_ID(),
                        get_the_permalink(),
                        get_the_title(),
                        get_the_excerpt(),
                        get_the_author(),
                        get_the_date()
                    );
                $postCounter += 1;

            }
            wp_reset_postdata();
            ?>
        </div>
        <!--        blank section -->
        <div class="my-12"></div>

        <!-- section footer -->
        <div class="flex flex-row justify-center mt-10 mb-8
        2xl:hidden my-auto">
            <a href="<?php echo getLinkInstagram(); ?>"><i class=" fa-brands fa-instagram social-link"></i></a>
            <a href="<?php echo getLinkFacebook(); ?>"><i class="fa-brands fa-facebook social-link"></i></a>
            <a href="<?php echo getLinkGithub(); ?>"><i class="fa-brands fa-github social-link"></i></a>
        </div>
    </div>
</div>


<?php get_footer(); ?>
