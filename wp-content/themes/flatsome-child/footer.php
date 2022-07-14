<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

</main>

<footer id="footer" class="footer-wrapper">

	<?php do_action('flatsome_footer'); ?>

</footer>

</div>

<?php wp_footer(); ?>


<script>
	function setCookie(name,value,days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days*24*60*60*1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "")  + expires + "; path=/";
	}
	function getCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	function eraseCookie(name) {   
		document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	
	jQuery('.footer-2 .collapse-title').click(function(){
		jQuery(this).parents('.collapse').toggleClass('active');
	});

	jQuery('.tab-customer-care .tab > a').click(function(){
		if(window.innerWidth <= 849) {
			var p = jQuery('.tab-customer-care ul.nav-pills').offset().top + jQuery('.tab-customer-care ul.nav-pills').height();
			jQuery([document.documentElement, document.body]).animate({
				scrollTop: p
			}, 300);
		}
	});

	jQuery('body').on('click', '#toggleFilter', function(){
		if(window.innerWidth <= 849) {
			jQuery('body').toggleClass('mobile-filter-opened');
		}
	});

	jQuery('#toggleFilter').hover(
		function() {
			if(!jQuery(this).hasClass('active')) {
				jQuery( this ).trigger('click');
			}
		}, function() {
		}
	);

	jQuery('.woof_container_inner > h4').hover(
		function() {
			jQuery('.woof_container_inner .woof_front_toggle.woof_front_toggle_opened').trigger('click');
			jQuery(this).parents('.woof_container_inner').find('.woof_front_toggle.woof_front_toggle_closed').trigger('click');
		}, function() {

		}
	);

	window.stopOTPTimer = false;
	function otpTimer(remaining) {
		var m = Math.floor(remaining / 60);
		var s = remaining % 60;
		
		m = m < 10 ? '0' + m : m;
		s = s < 10 ? '0' + s : s;
		document.getElementById('otpTimeRemain').innerHTML = m + ':' + s;
		remaining -= 1;
		
		if(remaining >= 0 && !stopOTPTimer) {
			setTimeout(function() {
				otpTimer(remaining);
			}, 1000);
			return;
		}
		// Do timeout stuff here
		console.log('Timeout for otp');
	}

	function resendOTP(formElement) {
		jQuery(formElement).find('input[name="resend_smsotp"]').val('resend');
		jQuery(formElement).submit();
	}
	
</script>

<a class="sticky-hotline" href="tel:19002666"><img src="/wp-content/themes/flatsome-child/assets/images/hotline.svg"></a>
<style>
	.sticky-hotline {
        position: fixed;
        bottom: 90px;
        right: 22px;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background-color: #E6E4E2;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99;
	}
	.sticky-hotline img {
		width: 32px; 
		height: 32px;
	}
	@media (min-width: 1386px) {
		.sticky-hotline {
                        bottom: 90px;
                        border-radius: 50%;
			right: 22px;
			width: 64px;
			height: 64px;
		}
		.sticky-hotline img {
			width: 36px; 
			height: 36px;
		}
	}
</style>
</body>
</html>
