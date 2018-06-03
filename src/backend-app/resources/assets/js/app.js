// Toggle menu
(() => {
	const burger = document.querySelector(".nav-toggle")
	const menu = document.querySelector(".nav-menu")

	burger.addEventListener("click", () => {
		burger.classList.toggle("is-active")
		menu.classList.toggle("is-active")
	})
})()
