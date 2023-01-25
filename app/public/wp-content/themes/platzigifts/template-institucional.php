<?php
//template Name: Pagina Institucional
get_header( ); ?>

<main class="container my-5">

    <?php if(have_posts()){
        while(have_posts()){
            the_post();?>
                
                <h1 class="my-3"><?php the_field('titulo') ?></h1>
                <img src="<?php the_field('imagen') ?>" alt="imagen">
                <hr>
                <?php the_content( ); ?>

     <?php   
        }
    }?>
</main>

<?php get_footer( ); ?>