document.addEventListener("DOMContentLoaded", function () {
	const closeButton = document.querySelector("#banner-section .close")
	const bannerSection = document.getElementById("banner-section")

	if (bannerSection.style.display !== "none") {
		document.body.classList.add("banner-show")
	}

	closeButton.addEventListener("click", function () {
		bannerSection.style.display = "none"
		document.body.classList.remove("banner-show")
	})
})
        $('.section, section, .single-effect').viewportChecker({
            classToAdd: 'starteffect',
            offset: '15%'
        });
