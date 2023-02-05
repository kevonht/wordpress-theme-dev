<?php get_header( ) ?>

<main class='container'>
    <?php if(have_posts()){
        while(have_posts()){
            the_post();
    ?>
    <?php $taxonomy = get_the_terms(get_the_id(), 'categoria-productos'); ?>
        <h1 class="my-5"> <?php the_title() ?> </h1>
        <div class="row">
            <div class="col-md-6 col-12">
                <?php the_post_thumbnail( 'large') ?>
            </div>
            <div class="col-md-6 col-12">
                <?php echo do_shortcode( '[contact-form-7 id="53" title="Formulario 1 sitio"]' ) ?>
            </div>
            <div class="col-12">
                <?php the_content( ) ?>
            </div>
        </div>
        
        <?php 
        $exclude_post = $post->ID;
        
        $args = array(

            'post_type' => 'producto',
            'post_per_page' => 6,
            'order' => 'ASC',
            'orderby' => 'title',
            'post__not_in' => array($exclude_post),
            'tax_query' => array(
                array('taxonomy' =>'categoria-productos',
                      'field' => 'slug',
                      'terms' => $taxonomy[0]->slug )
            )
        );

        $productos = new Wp_Query($args); ?>

        <?php if($productos -> have_posts( )){ ?>
            <div class="row text-center justify-content-center productos-relacionados">
                <div class="col-12">
                    <h3>Productos Relacionados</h3>
                </div>
                    
                <?php while ($productos->have_posts()){ ?>
                    <?php $productos -> the_post(); ?>
                    <div class="col-2 my-3 text-center" >
                        <?php the_post_thumbnail( 'thumbnail');?>
                        <h4>
                            <a href="<?php the_permalink()?>" class="enlace_productos">
                            <?php the_title( ) ?>
                        </a>
                        </h4>
                    </div>

               <?php } ?> 
            </div>
       <?php } ?>
    
    <?php
        }?>
  <?php } ?> 

</main>
<?php get_footer( ) ?>