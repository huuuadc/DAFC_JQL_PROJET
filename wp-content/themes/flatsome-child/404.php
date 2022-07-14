<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package flatsome
 */

get_header(); ?>
<?php do_action( 'flatsome_before_404' ); ?>
<?php
if ( get_theme_mod( '404_block' ) ) :
	echo do_shortcode( '[block id="' . get_theme_mod( '404_block' ) . '"]' );
else :
?>
<!--	<div id="primary" class="content-area">-->
<!--		<main id="main" class="site-main container pt" role="main">-->
<!--			<section class="error-404 not-found mt mb">-->
<!--				<div class="row">-->
<!--					<div class="col medium-3"><span class="header-font" style="font-size: 6em; font-weight: bold; opacity: .3">404</span></div>-->
<!--					<div class="col medium-9">-->
<!--						<header class="page-title">-->
<!--							<h1 class="page-title">--><?php //esc_html_e( 'Oops! That page can&rsquo;t be found.', 'flatsome' ); ?><!--</h1>-->
<!--						</header>-->
<!--						<div class="page-content">-->
<!--							<p>--><?php //esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'flatsome' ); ?><!--</p>-->
<!--							--><?php //get_search_form(); ?>
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</section>-->
<!--		</main>-->
<!--	</div>-->
<div id="primary" class="content-area" style="text-align: center;">
<!--    <section class="page_404">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class=" " style="width: 80%;">-->
<!--                    <div class="col-sm-10 col-sm-offset-1  text-center">-->
<!--                        <div class="four_zero_four_bg">-->
<!--                            <h1 class="text-center ">404</h1>-->
<!---->
<!---->
<!--                        </div>-->
<!---->
<!--                        <div class="contant_box_404">-->
<!--                            <h3 class="h2">-->
<!--                                Look like you're lost-->
<!--                            </h3>-->
<!---->
<!--                            <p>the page you are looking for not avaible!</p>-->
<!---->
<!--                            <a href="/" class="link_404">Go to Home</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <section>
        <div class="content">
            <canvas class="snow" id="snow"></canvas>
            <div class="main-text">
                <h1>Ôi, không !<br/>Trang này không tồn tại ròi.</h1><a class="home-link" href="/">Mang tôi về trang chủ.</a>
            </div>
            <div class="ground">
                <div class="mound">
                    <div class="mound_text">404</div>
                    <div class="mound_spade"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php endif; ?>
<?php do_action( 'flatsome_after_404' ); ?>
<?php get_footer(); ?>


<script>
    (function() {
        function ready(fn) {
            if (document.readyState != 'loading'){
                fn();
            } else {
                document.addEventListener('DOMContentLoaded', fn);
            }
        }

        function makeSnow(el) {
            var ctx = el.getContext('2d');
            var width = 0;
            var height = 0;
            var particles = [];

            var Particle = function() {
                this.x = this.y = this.dx = this.dy = 0;
                this.reset();
            }

            Particle.prototype.reset = function() {
                this.y = Math.random() * height;
                this.x = Math.random() * width;
                this.dx = (Math.random() * 1) - 0.5;
                this.dy = (Math.random() * 0.5) + 0.5;
            }

            function createParticles(count) {
                if (count != particles.length) {
                    particles = [];
                    for (var i = 0; i < count; i++) {
                        particles.push(new Particle());
                    }
                }
            }

            function onResize() {
                width = window.innerWidth;
                height = window.innerHeight;
                el.width = width;
                el.height = height;

                createParticles((width * height) / 10000);
            }

            function updateParticles() {
                ctx.clearRect(0, 0, width, height);
                ctx.fillStyle = '#f6f9fa';

                particles.forEach(function(particle) {
                    particle.y += particle.dy;
                    particle.x += particle.dx;

                    if (particle.y > height) {
                        particle.y = 0;
                    }

                    if (particle.x > width) {
                        particle.reset();
                        particle.y = 0;
                    }

                    ctx.beginPath();
                    ctx.arc(particle.x, particle.y, 5, 0, Math.PI * 2, false);
                    ctx.fill();
                });

                window.requestAnimationFrame(updateParticles);
            }

            onResize();
            updateParticles();

            window.addEventListener('resize', onResize);
        }

        ready(function() {
            var canvas = document.getElementById('snow');
            makeSnow(canvas);
        });
    })();
</script>