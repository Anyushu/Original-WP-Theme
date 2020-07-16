$(function ($) {
  // 設定項目
  let toc = "<h2>目次</h2>\n<ol>";
  const toc_selector = $("#toc");
  const wrapper = $(".main-article");
  const head = "h2,h3";
  let hierarchy;
  let element = 0;
  let count = 0;
  let max_head = 1;

  wrapper.find(head).each(function () {
    count++;
    this.id = "chapter-" + count;
    if (this.nodeName == "H2") {
      element = 0;
    } else {
      element = 1;
    }
    if (hierarchy === element) {
      toc += "</li>";
    } else if (hierarchy < element) {
      toc += "<ol>";
      hierarchy = 1;
    } else if (hierarchy > element) {
      toc += "</li></ol></li>";
      hierarchy = 0;
    } else if (count == 1) {
      hierarchy = 0;
    }
    toc += '<li><a href="#' + this.id + '" uk-scroll>' + $(this).html() + "</a>";
  });
  if (element == 0) {
    toc += "</li></ol>";
  } else if (element == 1) {
    toc += "</li></ol></li></ol>";
  }
  if (count < max_head) {
    toc_selector.remove();
  } else {
    toc_selector.html(toc);
  }
});
