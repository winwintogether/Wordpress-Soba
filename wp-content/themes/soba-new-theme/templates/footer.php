<?php if ( is_front_page() ) { ?>
    <div class="contact-section">
        <div class="content">
            <div class="grad-sep"></div>
            <div class="left">
                <div class="inner">
                    <h1>Welcome Home</h1>
                    <p class="padd">If you’re reading this right now, you may feel a sense of shame in your addiction
                        and we understand. You were giving it all you could to maintain a life that has become
                        unmanageable. Although you have those feelings of helplessness, shame, and guilt, what matters
                        now is you are on the verge of changing the course of your life by coming to the SOBA Recovery
                        Center (SRC) and that’s something for which to have immense gratitude. </p>
                    <h3 class="border">
                        <a href="tel(866) 547-6451">#(866) 547-6451</a>
                    </h3>
                    <h3 class="border">
                        22669 Pacific Coast Hwy,
                        Malibu CA 90265
                    </h3>
                    <h3 class="border">
                        <a href="mailto:admissions@sobarecovery.com">admissions@sobarecovery.com</a>
                    </h3>
                </div>
            </div>
            <div class="right">
                <div class="inner">
					<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-footer' ) ): ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="left-bg"></div>
        <div class="right-bg"></div>
    </div>
<?php } else if ( is_post_type_archive( 'press' ) ) {
	?>
    <div class="press-footer">
        <div class="inner">
            <div class="footer-content">
                <h1>Have a press inquiry?</h1>
                <br>
                <a class="phone-btn" href="tel:18665476451"># (866) 547-6451</a>
                <br>
                <p>Contact us anytime with your press inquiries, we'd love to hear from you</p>
                <br>
                <a class="border-btn light-blue-color">contact us</a>
            </div>
        </div>
    </div>
	<?php
} else {
	?>
    <div class="callout-one no-margin" data-aos="flip-down" data-aos-once="true">
        <div class="inner">
            <h2>Our <span>compassionate</span> treatment advisors are standing by to help.</h2>
            <a class="phone-btn" href="tel:18665476451"># (866) 547-6451</a>
            <p>Insurance Accepted</p>
        </div>
    </div>
<?php } ?>

<footer class="footer">
    <div class="inner">
        <div class="branding">
            <div class="logo">
				<?= img( 'logo.svg' ) ?>
				<?= img( '07_goldseal.png' ) ?>

            </div>
			<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-widget-1' ) ): ?>
			<?php endif; ?>
        </div>


        <div class="footer-col">
			<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-widget-2' ) ): ?>
			<?php endif; ?>
        </div>

        <div class="footer-col">
			<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-widget-3' ) ): ?>
			<?php endif; ?>
        </div>

        <div class="footer-col">
			<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-widget-4' ) ): ?>
			<?php endif; ?>
        </div>
        <div class="copyright-section">
            <p class="copyright">
                &copy; <?php echo date( "Y" ); ?> Copyright <?php bloginfo( 'name' ); ?> | <a
                        href="http://www.sobamalibu.com/privacy-policy">Privacy Policy</a>.
            </p>
        </div>
    </div>
</footer>
<!-- End Off Canvas -->
</div>
	
	

