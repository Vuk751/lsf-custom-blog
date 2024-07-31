<?php
/*
Template Name: LSF Blog
Template Post Type: post
*/

$main_color = get_option('lsf_blog_main_color', '#000000');
$hero_bg_color = get_option('lsf_blog_hero_bg_color', '#0000FF');
$hero_title_color = get_option('lsf_blog_hero_heading_color', '#008000');
$author_image_id = get_option('lsf_blog_author_image');
$author_image_url = wp_get_attachment_url($author_image_id);
$author_name = get_option('lsf_blog_author_name');
$author_bio = get_option('lsf_blog_author_bio');
$cta_enabled = get_option('lsf_blog_enable_cta');
$cta_heading = get_option('lsf_blog_cta_heading');
$cta_button_text = get_option('lsf_blog_cta_button_text');
$cta_link = get_option('lsf_blog_cta_link');

get_header();

while (have_posts()) :
    the_post();
?>

<!-- HERO -->
<section class="lsf-blog-hero">
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
         <?php if ($cta_enabled) : ?>
    <div class="blog-cta">
        <h4><?php echo esc_html($cta_heading); ?></h4>
        <a href="<?php echo esc_url($cta_link); ?>">
            <div class="blog-btn"><?php echo esc_html($cta_button_text); ?></div>
        </a>
    </div>
<?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Share this post -->
  <div class="mx-auto mt-5">
		<h3 class="text-center">
			<b>Share This Post</b>
			<div class="mt-3 gap-2 d-flex align-items-center justify-content-center">
				<a href="https://www.facebook.com/sharer/sharer.php?u= <?php the_permalink(); ?>">
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" fill="var(--main-color)" width="60" height="40" viewBox="0 0 90 91"><g data-name="Group 677" transform="translate(193 656)"><rect data-name="Rectangle 731" 								width="90" height="91" rx="20" transform="translate(-193 -656)"/><path data-name="Path 4132" d="M-135.615-627.325h7.024v-11.877a98 98 0 0 0-10.237-.523c-10.162 0-17.112 									6.2-17.112 17.56v9.789h-11.47v13.3h11.47V-565h13.75v-34.075h11.432l1.719-13.3h-13.151v-8.482c0-3.923 1.046-6.468 6.575-6.468" fill="#fff"/></g></svg>
				</div></a>
				<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?><?php the_title(); ?>">
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" fill="var(--main-color)" width="60" height="40" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64"><rect width="512" height="509.64" rx="115.61" ry="115.61"/><path fill="#fff" fill-rule="nonzero" d="M323.74 148.35h36.12l-78.91 90.2 92.83 122.73h-72.69l-56.93-74.43-65.15 74.43h-36.14l84.4-96.47-89.05-116.46h74.53l51.46 68.04zm-12.68 191.31h20.02l-129.2-170.82H180.4z"/></svg>
				</div>
				</a>
				<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>">
					<div>
					<svg xmlns="http://www.w3.org/2000/svg" fill="var(--main-color)" width="60" height="40" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64"><rect width="512" height="509.64" rx="115.61" ry="115.61"/><path fill="#fff" d="M204.97 197.54h64.69v33.16h.94c9.01-16.16 31.04-33.16 63.89-33.16 68.31 0 80.94 42.51 80.94 97.81v116.92h-67.46l-.01-104.13c0-23.81-.49-54.45-35.08-54.45-35.12 0-40.51 25.91-40.51 52.72v105.86h-67.4zm-38.23-65.09c0 19.36-15.72 35.08-35.08 35.08-19.37 0-35.09-15.72-35.09-35.08 0-19.37 15.72-35.08 35.09-35.08 19.36 0 35.08 15.71 35.08 35.08m-70.17 65.09h70.17v214.73H96.57z"/></svg>
				</div></a>
			</div>
		</h3>
</div>
    <div class="reading-bar"></div>

          
     



<style>
    :root {
  /* Titles */
  --main-color: <?php echo esc_html($main_color); ?>;
  /* Links */
  --link-color: <?php echo esc_html($link_color); ?>;
  --button-color: <?php echo esc_html($button_color); ?>;
  --hero-bg-color: <?php echo esc_html($hero_bg_color); ?>;
  --hero-title-color: <?php echo esc_html($hero_title_color); ?>;
}

/* BLOG HERO */

.lsf-blog-hero {
  text-align: center;
  padding: 40px 0px 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--hero-title-color);
  flex-direction: column;
  background-color: var(--hero-bg-color);
}

.lsf-blog-hero h1 {
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
  background-color: var(--hero-title-color);
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
  color: var(--main-color);
}

.content-main a {
  font-weight: 700;
  color: var(--main-color);
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
  background-color: var(--main-color, white);
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

/* Reading Bar */

.reading-bar {
  bottom: 0;
  background-color: var(--main-color);
  height: 5px;
  width: 0%;
  position: fixed;
}

/* Active link while scrolling */

.toc-link.active {
  font-weight: bold;
  color: black; /* or any color you prefer */
  text-decoration: underline;
}

</style>

<script>
      document.addEventListener("DOMContentLoaded", () => {
        createTableOfContents();
        highlightTOCOnScroll();
        initReadingProgress();
      });

      function createTableOfContents() {
        const toc = document.querySelector(".toc");
        const h2s = document.querySelectorAll(".content-main h2");

        h2s.forEach((h2) => {
          const slug = h2.textContent.toLowerCase().replace(/\s+/g, "-");
          h2.id = slug;
          const link = document.createElement("a");
          link.href = `#${slug}`;
          link.textContent = h2.textContent;
          link.id = `toc-${slug}`;
          link.classList.add("toc-link");
          toc.appendChild(link);
        });

        // Reading time calculation
        let calcReadingTime = Math.floor(
          document.querySelector(".content-main").innerText.split(" ").length /
            200
        );
        document.querySelector(".reading-time").textContent = calcReadingTime;
      }

      function highlightTOCOnScroll() {
        const h2s = document.querySelectorAll(".content-main h2");
        const tocLinks = document.querySelectorAll(".toc a");

        window.addEventListener("scroll", () => {
          let current = "";
          h2s.forEach((h2) => {
            const sectionTop = h2.offsetTop;
            if (window.pageYOffset >= sectionTop - 60) {
              // 60 is an offset, adjust as needed
              current = h2.getAttribute("id");
            }
          });

          tocLinks.forEach((link) => {
            link.classList.remove("active");
            if (link.getAttribute("href") === `#${current}`) {
              link.classList.add("active");
            }
          });
        });
      }

      function initReadingProgress() {
        const post = document.getElementsByTagName("article")[0];
        const progressBar = document.querySelector(".reading-bar");
        const distance =
          post.clientHeight + post.offsetTop - window.innerHeight;

        window.addEventListener("scroll", () => {
          const progress = (window.scrollY / distance) * 100;
          progressBar.style.width = `${progress}%`;
        });
      }
    </script>

<?php
endwhile; 

get_footer();
?>