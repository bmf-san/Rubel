// Tabs
(() => {
	const recentBtn = document.querySelector("#recent-btn")
	const randomBtn = document.querySelector("#random-btn")

	const recentTab = document.querySelector("#recent-tab")
	const randomTab = document.querySelector("#random-tab")

	// Init
	recentBtn.classList.add("is-active")
	randomTab.style.display = "none"

	recentBtn.addEventListener("click", () => {
		if (!recentBtn.classList.contains("is-active")) {
			recentBtn.classList.toggle("is-active")
			randomBtn.classList.toggle("is-active")
			recentTab.style.display = "block"
			randomTab.style.display = "none"
		}
	})

	randomBtn.addEventListener("click", () => {
		if (!randomBtn.classList.contains("is-active")) {
			randomBtn.classList.toggle("is-active")
			recentBtn.classList.toggle("is-active")
			randomTab.style.display = "block"
			recentTab.style.display = "none"
		}
	})
})()
