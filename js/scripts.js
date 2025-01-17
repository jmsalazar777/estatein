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

function filterItems(category) {
	const items = document.querySelectorAll(".items-wrapper .item")
	const tabs = document.querySelectorAll(".tablinks")

	tabs.forEach((tab) => tab.classList.remove("active"))
	document
		.querySelector(`.tablinks[onclick="filterItems('${category}')"]`)
		.classList.add("active")

	items.forEach((item) => {
		if (category === "all" || item.dataset.category === category) {
			item.style.display = "block"
		} else {
			item.style.display = "none"
		}
	})
}

var thumbnailGallery = new Swiper(".thumbnail-gallery", {
	slidesPerView: 9,
	spaceBetween: 20,
	watchSlidesProgress: true,

	breakpoints: {
		0: {
			slidesPerView: 2,
			pagination: {
				dynamicMainBullets: 1,
			},
		},
		550: {
			slidesPerView: 4,
			pagination: {
				dynamicMainBullets: 3,
			},
		},
		768: {
			slidesPerView: 4,
			pagination: {
				dynamicMainBullets: 5,
			},
		},
		1024: {
			slidesPerView: 8,
			spaceBetween: 20,
			pagination: {
				dynamicBullets: false,
			},
		},

		1441: {
			slidesPerView: 9,
			spaceBetween: 30,
			pagination: {
				dynamicBullets: false,
			},
		},
	},
})

var mainGallery = new Swiper(".main-gallery", {
	slidesPerView: 2,
	spaceBetween: 30,
	navigation: {
		nextEl: ".gallery-images .swiper-button-next",
		prevEl: ".gallery-images .swiper-button-prev",
	},
	thumbs: {
		swiper: thumbnailGallery,
	},
	pagination: {
		el: ".swiper-pagination",
		dynamicBullets: true,
		dynamicMainBullets: 4,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			pagination: {
				dynamicMainBullets: 1,
			},
		},
		550: {
			slidesPerView: 1,
			pagination: {
				dynamicMainBullets: 3,
			},
		},
		768: {
			slidesPerView: 2,
			pagination: {
				dynamicMainBullets: 5,
			},
		},
		1024: {
			slidesPerView: 2,
			spaceBetween: 20,
			pagination: {
				dynamicBullets: false,
			},
		},

		1441: {
			slidesPerView: 2,
			spaceBetween: 30,
			pagination: {
				dynamicBullets: false,
			},
		},
	},
})
