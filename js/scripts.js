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
