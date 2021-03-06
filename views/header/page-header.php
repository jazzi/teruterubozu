<header class="site-header u-margin-bottom-large u-margin-bottom-huge@tablet">

<?php if ( is_front_page() ) :

    the_header_image_tag( array( 'class' => 'site-header-img' ) ) ?>

    <div class="site-header-content">
        <div class="o-wrapper">

            <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

            <?php
            if ( get_bloginfo( 'description', 'display' ) || is_customize_preview() ) : ?>
                <h2 class="site-description"><?php bloginfo( 'description' ) /* WPCS: xss ok. */ ?></h2>
            <?php
            endif;
            ?>

        </div>
    </div>


<?php elseif ( is_home() && ! is_front_page() ) : ?>

    <?php
    // $page_object = get_queried_object();
    // $page_id     = get_queried_object_id();
    // // echo $page_object;
    // echo $page_id;
    echo get_the_post_thumbnail( get_queried_object_id(), 'full', array( 'class' => 'site-header-img' ) );
    ?>

    <div class="site-header-content">
        <div class="o-wrapper">
            <h1 class="site-title"><?php esc_html_e( 'Blog', 'teruterubozu' ) ?></h1>
            <h2 class="site-title u-h4"><?php bloginfo( 'name' ) ?></h2>
        </div>
    </div>


<?php elseif ( is_singular() && has_post_thumbnail() ) : ?>

    <?php the_post_thumbnail( 'full',  array( 'class' => 'site-header-img' ) ); ?>


<?php elseif ( is_tag() ) :

    teruterubozu_term_cover() ?>

    <div class="site-header-content">
        <div class="o-wrapper">
            <h1 class="label-title"> <?php single_tag_title(); ?> </h1>
            <h2 class="label-description"> <?php echo term_description(); ?> </h2>
        </div>
    </div>


<?php elseif ( is_author() ) : ?>

    <img class="site-header-img" src="<?php the_author_meta( 'author_cover_image' ) ?>" alt="">

<?php endif; ?>


    <nav class="navbar">
        <div class="custom-logo" itemscope itemtype="http://schema.org/Organization">
            <?php the_custom_logo() ?>
        </div>
        <a class="menu-btn icon-menu" href="#"> <span class="word"><?php esc_attr_e( 'Menu', 'teruterubozu' ) ?></span> </a>
    </nav>


<?php if ( ! is_paged() && get_header_image() ) : ?>

    <a class="scroll-down-arrow icon-arrow-left radial-gradient" href="#content" onclick="animateScrollTo( document.querySelector( '#content' ) )"><span hidden><?php esc_html_e( 'Scroll Down', 'teruterubozu' ) ?></span></a>

<?php endif; ?>


</header>
