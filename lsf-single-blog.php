<?php
/*
Template Name: LSF Blog
Template Post Type: post
*/

$heading_color = get_option('lsf_blog_heading_color', '#000000');
$link_color = get_option('lsf_blog_link_color', '#0000FF');
$button_color = get_option('lsf_blog_button_color', '#008000');
$author_image_id = get_option('lsf_blog_author_image');
$author_image_url = wp_get_attachment_url($author_image_id);
$author_name = get_option('lsf_blog_author_name');
$author_bio = get_option('lsf_blog_author_bio');

get_header();

while (have_posts()) :
    the_post();
?>

<!-- HERO -->
<section class="blog-hero">
      <h1><?php the_title(); ?></h1>
      <div class="blog-details">
        <p>By <b><?php echo esc_html($author_name); ?></b></p>
        <div class="blog-details-inner">
          <p><?php the_date(); ?></p>
          <div class="dot"></div>
          <p><span class="reading-time"></span> minute read</p>
        </div>
      </div>
</section>
	
<!-- BODY -->
<section class="container mx-auto mt-5" style="max-width: 1114px">
      <div class="row gy-5">
        <div class="col-12 col-md-3">
          <div class="toc">
            <h3>Contents</h3>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <article class="content-main">
           <?php
            the_content();
            ?>
          </article>
          <!-- AUTHOR BOTTOM -->
          <div class="author-bottom text-center">
            <img src="<?php echo esc_url($author_image_url); ?>" alt="<?php echo esc_attr($author_name); ?>" />
            <p class="written-by">Written by</p>
            <h3 class="author-title"><?php echo esc_html($author_name); ?></h3>
            <p class="author-bio">
            <?php echo wp_kses_post($author_bio); ?>
            </p>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="author-details pb-5">
            <img src="<?php echo esc_url($author_image_url); ?>" alt="<?php echo esc_attr($author_name); ?>" />
            <h3 class="pt-3 author-title" style="font-size: 20px">
              <?php echo esc_html($author_name); ?>
            </h3>
            <p class="author-bio">
              <?php echo wp_kses_post($author_bio); ?>
            </p>
          </div>
          <div class="blog-cta">
            <h4>Need our services?</h4>
            <a href="/contact-us#free-quote">
              <div class="blog-btn">Free Quote</div>
            </a>
          </div>
        </div>
      </div>
    </section>
    

          
     



<style>
    :root {
  /* Titles */
  --heading-color: <?php echo esc_html($heading_color); ?>;
  /* Links */
  --link-color: <?php echo esc_html($link_color); ?>;
  --button-color: <?php echo esc_html($button_color); ?>;
}

/* BLOG HERO */

.blog-hero {
  text-align: center;
  padding: 40px 0px 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  flex-direction: column;
  background-color: blue;
}

.blog-hero h1 {
  font-size: 46px;
  max-width: 550px;
}

.blog-details p {
  margin-top: 1em;
  margin-bottom: 12px;
}

.blog-details .dot {
  height: 5px;
  width: 5px;
  background-color: white;
}

.blog-details-inner p {
  margin: 0;
}

.blog-details-inner {
  align-items: center;
  display: flex;
  gap: 1em;
}

/* CENTER COLUMN MAIN CONTENT */
.content-main {
  padding-inline: 15px;
  font-size: 15px;
}
	
	.content-main img{
		border-radius: 10px;
	}

.content-main h2 {
  font-size: 38px;
  padding-bottom: 0.3em;
}

.content-main h2,
.content-main h3,
.content-main h4 {
  color: var(--heading-color);
}

.content-main a {
  font-weight: 700;
  color: blue;
}

/* Table Of Contents */

.toc {
  border-radius: 10px;
  margin: auto;
  padding: 10px;
  max-width: 230px;
  border: 1px solid gray;
  display: flex;
  flex-direction: column;
  gap: 0.6em;
}

@media (min-width: 768px) {
  .toc {
    border-radius: 0;
    text-align: start;
    padding: 0px;
    border-left: none;
    border-top: none;
    border-bottom: none;
    border-right: 1px solid gray;
    position: sticky;
    top: 20px;
  }
}

.toc a {
  display: block;
  word-break: break-word;
  overflow-wrap: break-word;
  width: 100% !important;
  text-decoration: none;
  color: black;
  transition: 0.2s ease-in-out;
  font-size: 15px;
}

.toc h3 {
  font-size: 15px;
}

.toc a:hover {
  text-decoration: underline;
}

/* AUTHOR */

.author-details {
  display: none;
}

@media (min-width: 768px) {
  .author-details {
    display: block;
  }
}

.author-bio {
  font-size: 15px;
}

/* AUTHOR BOTTOM */
.written-by {
  font-size: 15px;
  padding-top: 10px;
  padding-bottom: 0px !important;
}

.author-bottom {
  margin-top: 3em;
}

/* BLOG QUOTE CTA */

.blog-cta {
  max-width: 300px;
  margin: auto;
  display: flex;
  gap: 1em;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  border: 2px solid gray;
  border-radius: 10px;
}

@media (min-width: 768px) {
  .blog-cta {
    position: sticky;
    top: 20px;
  }
}

.blog-cta a {
  text-decoration: none;
}

.blog-btn {
  text-decoration: none;
  color: white;
  background-color: var(--button-color, white);
  padding: 10px 20px;
  border-radius: 5px;
  transition: all 0.2s ease-in-out;
}
	
	.blog-cta h4{
		font-size: 20px;
	}

.blog-btn:hover {
  transform: scale(1.1);
}

</style>

<script>
     document.addEventListener("DOMContentLoaded", () => {
        const toc = document.querySelector(".toc");
        const h2s = document.querySelectorAll(".content-main h2");

        h2s.forEach((h2) => {
          const slug = h2.textContent.toLowerCase().replace(/\s+/g, "-");
          h2.id = slug;
          const link = document.createElement("a");
          link.href = `#${slug}`;
          link.textContent = h2.textContent;
          link.classList.add("toc-link");
          toc.appendChild(link);

          // Reading time -> word count / 200 -> rounded down

          let calcReadingTime = Math.floor(
            document.querySelector(".content-main").innerText.split(" ")
              .length / 200
          );
          let readingTime = (document.querySelector(
            ".reading-time"
          ).textContent = calcReadingTime);
        });
      });
</script>

<?php
endwhile; 

get_footer();
?>