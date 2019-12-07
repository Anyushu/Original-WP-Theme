// CSSインポート
import '../scss/style.scss';

// JSインポート
import './material-kit';


// Googleフォント非同期読み込み
window.WebFontConfig = {
  google: {
    families: ["Noto+Sans+JP:400,700"]
  },
  active: function() {
    sessionStorage.fonts = true
  }
};
(function() {
  var a = document.createElement('script');
  a.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
  a.type = 'text/javascript';
  a.async = 'true';
  var b = document.getElementsByTagName('script')[0];
  b.parentNode.insertBefore(a, b)
})();