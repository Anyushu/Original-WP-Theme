// CSSインポート
import "../scss/style.scss";

// JSインポート
/* UIkit */
import UIkit from "uikit";
import Icons from "uikit/dist/js/uikit-icons";

/* ロード時間のデバッグ */
import { getCLS, getFID, getLCP } from "web-vitals";

/* オリジナル */
import "./toc";
import "./hljs";

// loads the Icon plugin
UIkit.use(Icons);

/* ロード時間のデバッグ */
getCLS(console.log);
getFID(console.log);
getLCP(console.log);
