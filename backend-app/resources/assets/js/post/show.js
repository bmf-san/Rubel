require('../../scss/post/show.scss');

(() => {
  const dom = document.querySelectorAll('#post-content h1');
  const headings = Array.prototype.map.call(dom, function(elm) {
    return elm.textContent;
  });

  const toc = document.getElementById('post-toc');

  const list = [];

  for (var i = 0; i < headings.length; i++) {
    let h = headings[i];
    var li = '<li><a href="#' + headings[i] + '">' + headings[i] + '</a></li>';
    list.push(li);
  }
  toc.innerHTML = list.join("");
})();

var elem = document.getElementsByClassName("test");
elem.innerHTML = "<span style='color: red;'>span要素に変更したよ！</span>";
