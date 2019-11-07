// フォント非同期
window.WebFontConfig = {
  google: {
    families: ['Noto+Sans+JP:500,700']
  },
  active: function() {
    sessionStorage.fonts = true;
  }
};
(function() {
  let wf = document.createElement('script');
  wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  let s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();