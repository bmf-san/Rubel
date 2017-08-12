import "../../scss/post/show.scss"

// Table of contents
if (document.getElementById("post-toc")) {
	(() => {
		const dom = document.querySelectorAll("#post-content h1")
		const headings = Array.prototype.map.call(dom, function(elm) {
			return elm.textContent
		})

		const toc = document.getElementById("post-toc")

		const list = []

		for (var i = 0; i < headings.length; i++) {
			let h = headings[i]
			var li = "<li><a href=\"#" + headings[i] + "\">" + headings[i] + "</a></li>"
			list.push(li)
		}
		toc.innerHTML = list.join("")
	})()
}
