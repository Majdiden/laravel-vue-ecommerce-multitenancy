<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shops</title>

        <!-- Fonts -->


        <!-- Styles -->
      <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
      <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
<link
  rel="preconnect"
  href="https://fonts.gstatic.com"
  crossorigin="anonymous"
/>
<link
  rel="preload"
  href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,600,700|Roboto:300,300i,400,400i,500,700&display=swap"
  as="fetch"
  crossorigin="anonymous"
/>
<script type="text/javascript">
  !(function (e, n, t) {
    "use strict";
    var o =
        "https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,600,700|Roboto:300,300i,400,400i,500,700&display=swap",
      r = "__3perf_googleFonts_dc153";
    function c(e) {
      (n.head || n.body).appendChild(e);
    }
    function a() {
      var e = n.createElement("link");
      (e.href = o), (e.rel = "stylesheet"), c(e);
    }
    function f(e) {
      if (!n.getElementById(r)) {
        var t = n.createElement("style");
        (t.id = r), c(t);
      }
      n.getElementById(r).innerHTML = e;
    }
    e.FontFace && e.FontFace.prototype.hasOwnProperty("display")
      ? (t[r] && f(t[r]),
        fetch(o)
          .then(function (e) {
            return e.text();
          })
          .then(function (e) {
            return e.replace(/@font-face {/g, "@font-face{font-display:swap;");
          })
          .then(function (e) {
            return (t[r] = e);
          })
          .then(f)
          .catch(a))
      : a();
  })(window, document, localStorage);
</script>


    </head>
    <body>
        <div id="app">
          <app></app>
        </div>
        <script src="{{ global_asset('js/app.js') }}"></script>
    </body>
</html>
