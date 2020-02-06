// CSSインポート
import '../scss/style.scss';

// JSインポート
/* UIkit */
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

/* barba */
// import barba from '@barba/core';
// import barbaCss from '@barba/css';

/* オリジナル */
import './toc';
import './hljs';

// loads the Icon plugin
UIkit.use(Icons);

// barba setup
// barba.use(barbaCss);
// barba.init({
//   transitions: [{
//     sync: true
//   }]
// });

// Google Fonts
window.WebFontConfig = {
  google: {
    families: ['Noto+Sans+JP:300,500&display=swap&subset=japanese']
  },
  active: function() {
    sessionStorage.fonts = true;
  }
};
(function() {
  var wf = document.createElement('script');
  wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();