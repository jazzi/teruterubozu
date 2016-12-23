<?php get_template_part('templates/author', 'header'); ?>

<?php if (is_paged()): ?>
  <?php get_template_part('templates/page', 'navigation'); ?>

  <!-- Atom: decorative-line -->
  <hr class="decorative-line">

<?php endif; ?>


<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<!-- <?php Roots\Sage\Extras\wp_pagination(); ?>
<?php the_posts_navigation(); ?> -->

<?php get_template_part('templates/page', 'navigation'); ?>
