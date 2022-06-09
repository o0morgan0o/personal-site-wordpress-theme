<?php get_header(); ?>

<div class="container mx-auto h-screen">

    <?php get_template_part('template-parts/navbar'); ?>
    <div class="grid grid-cols-1 h-full
    2xl:grid-cols-[2fr,1fr] ">
        <div class="mx-6 mt-4 flex flex-col justify-center">
            <h1 id="main-title" class="font-[tomarik-serif] uppercase text-center text-7xl my-10 tracking-[-0.12em]
            md:text-[100px]
            xl:text-[140px]
            2xl:text-[210px] 2xl:text-left
            ">Error 404 !</h1>
            <h3 class="font-[tomarik-serif] w-full text-center">
               The content you're looking for don't exist...
            </h3>
        </div>

        <?php get_template_part('template-parts/backbutton');?>

        <!-- section footer -->
        <div class="flex flex-row justify-center mt-10 mb-8
        md:hidden my-auto">
            <a href="<?php echo getLinkInstagram(); ?>"><i class=" fa-brands fa-instagram social-link"></i></a>
            <a href="<?php echo getLinkFacebook(); ?>"><i class="fa-brands fa-facebook social-link"></i></a>
            <a href="<?php echo getLinkGithub(); ?>"><i class="fa-brands fa-github social-link"></i></a>
        </div>
    </div>
</div>


<?php get_footer(); ?>
