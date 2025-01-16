jQuery(document).ready(function ($) {
	jQuery("#banner-section .close").on("click", function () {
		jQuery("#banner-section").hide()
	})

	jQuery(".menu-toggle").on("click", function (e) {
		e.preventDefault()
		jQuery("body").toggleClass("menu-open")
	})
})
