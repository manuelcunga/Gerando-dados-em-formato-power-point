<?php

// $servidor = "localhost";
// $usuario = "root";
// $senha = "";
// $dbname = "generatepoint";
try {
  $con = new PDO("mysql:host=localhost;dbname=generatepoint", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (Exception $erro) {
  echo "Erro no banco" . $erro->getMessage();
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="https://github.com/gitbrent">
  <meta name="website" content="https://github.com/gitbrent/PptxGenJS/">
  <meta name="version" content="3.3.1">
  <meta name="updated" content="2020-08-23">
  <link rel="icon" href="images/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="images/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="icon" href="images/favicon.png">
  <title>Generate POWER POINT</title>
  <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.0/yeti/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.0/cyborg/bootstrap.min.css" media="(prefers-color-scheme: dark)"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.0/yeti/bootstrap.min.css" media="(prefers-color-scheme: no-preference), (prefers-color-scheme: light)">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/themes/prism-okaidia.min.css">
  <style>
    #infoBar .iconSvg {
      vertical-align: middle;
      margin-right: 5px;
    }

    #demo-sandbox:focus {
      /* Chrome draws a super-annoying outline around *each line* in the <code> tag, so NOPE! */
      outline: none;
      /*-webkit-focus-ring-color auto 5px;*/
    }

    /* -- brentstrap.css ---------- */
    .bde-arrow-cont {
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .bde-arrow-cont span {
      font-size: 50% !important;
      color: #b9c9d9 !important;
      text-transform: none !important;
      margin-left: 4px;
    }

    .arrow {
      display: inline-block;
      height: 12px;
      width: 12px;
      border-top: 3px solid var(--primary);
      border-right: 3px solid var(--primary);
      margin-right: 10px;
      cursor: pointer;
      transition: all .25s ease;
      transform: rotate(45deg);
    }

    .arrow.active {
      transform: rotate(135deg);
      margin-bottom: 3px;
    }

    .bde-callout-info {
      padding: 1.25rem;
      margin-top: 1.25rem;
      margin-bottom: 1.25rem;
      border-radius: .25rem;
      border-left-width: .25rem !important;
      border-left-color: var(--primary) !important;
      border: 1px solid var(--white);
      background: var(--light);
    }

    /* -- brentstrap.css ---------- */
    .tab-pane {
      background-color: var(--white);
    }

    @media (prefers-color-scheme: dark) {
      :root {
        --white: black;
        --secondary: #232323;
        --light: #363636;
      }
    }

    /* ------------------------------------------------------------------------- */
    div.iconSvg {
      display: inline-block;
      background-size: contain;
      max-width: 256px;
      max-height: 256px;
    }

    div.iconSvg.size16 {
      width: 16px;
      height: 16px;
    }

    div.iconSvg.size20 {
      width: 20px;
      height: 20px;
    }

    div.iconSvg.size24 {
      width: 24px;
      height: 24px;
    }

    div.iconSvg.size32 {
      width: 32px;
      height: 32px;
    }

    div.iconSvg.size48 {
      width: 48px;
      height: 48px;
    }

    div.iconSvg.circle.question,
    div.iconSvg.question {
      background-image:
        url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUwIDUwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MCA1MDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxjaXJjbGUgc3R5bGU9ImZpbGw6IzQ4QTBEQzsiIGN4PSIyNSIgY3k9IjI1IiByPSIyNSIvPgo8bGluZSBzdHlsZT0iZmlsbDpub25lO3N0cm9rZTojRkZGRkZGO3N0cm9rZS13aWR0aDoyO3N0cm9rZS1saW5lY2FwOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjEwOyIgeDE9IjI1IiB5MT0iMzciIHgyPSIyNSIgeTI9IjM5Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlOiNGRkZGRkY7c3Ryb2tlLXdpZHRoOjI7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6MTA7IiBkPSJNMTgsMTYgIGMwLTMuODk5LDMuMTg4LTcuMDU0LDcuMS02Ljk5OWMzLjcxNywwLjA1Miw2Ljg0OCwzLjE4Miw2LjksNi45YzAuMDM1LDIuNTExLTEuMjUyLDQuNzIzLTMuMjEsNS45ODYgIEMyNi4zNTUsMjMuNDU3LDI1LDI2LjI2MSwyNSwyOS4xNThWMzIiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==);
    }

    div.iconSvg.circle.info,
    div.iconSvg.info {
      background-image:
        url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgMzQ3LjYxMiAzNDcuNjEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzNDcuNjEyIDM0Ny42MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48Zz48cGF0aCBmaWxsPSIjMDA4OENDIiBkPSJNMTczLjgwNywwQzc3Ljk3LDAsMCw3Ny45NywwLDE3My44MDZDMCwyNjkuNjQsNzcuOTcsMzQ3LjYxMiwxNzMuODA3LDM0Ny42MTJjOTUuODMzLDAsMTczLjgwNi03Ny45NzMsMTczLjgwNi0xNzMuODA3IEMzNDcuNjEyLDc3Ljk3LDI2OS42NCwwLDE3My44MDcsMHogTTE5Ni40ODksMjY5LjQ0N2MwLDkuOTMzLTguMDcsMTcuOTk3LTE3Ljk5LDE3Ljk5N2MtOS45MTQsMC0xNy45NjktOC4wNjQtMTcuOTY5LTE3Ljk5NyBWMTM3LjM0MmMwLTkuODk4LDguMDU2LTE3Ljk2NiwxNy45NjktMTcuOTY2YzkuOTIsMCwxNy45OSw4LjA2OCwxNy45OSwxNy45NjZWMjY5LjQ0N3ogTTE3OS4yMzQsMTAxLjE1NyBjLTExLjI5NCwwLTIwLjQ5NC05LjE5My0yMC40OTQtMjAuNDk1czkuMTkzLTIwLjQ5NSwyMC40OTQtMjAuNDk1YzExLjMwNSwwLDIwLjQ5OCw5LjE5MywyMC40OTgsMjAuNDk1IFMxOTAuNTM5LDEwMS4xNTcsMTc5LjIzNCwxMDEuMTU3eiIgLz48L2c+PC9nPjwvc3ZnPg==);
    }

    div.iconSvg.yes,
    div.iconSvg.check {
      background-image:
        url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaWQ9IkxheWVyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48c3R5bGUgdHlwZT0idGV4dC9jc3MiPi5zdDB7ZmlsbDojMkJCNjczO30uc3Qxe2ZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MzA7c3Ryb2tlLW1pdGVybGltaXQ6MTA7fTwvc3R5bGU+PHBhdGggY2xhc3M9InN0MCIgZD0iTTQ4OSwyNTUuOWMwLTAuMiwwLTAuNSwwLTAuN2MwLTEuNiwwLTMuMi0wLjEtNC43YzAtMC45LTAuMS0xLjgtMC4xLTIuOGMwLTAuOS0wLjEtMS44LTAuMS0yLjcgIGMtMC4xLTEuMS0wLjEtMi4yLTAuMi0zLjNjMC0wLjctMC4xLTEuNC0wLjEtMi4xYy0wLjEtMS4yLTAuMi0yLjQtMC4zLTMuNmMwLTAuNS0wLjEtMS4xLTAuMS0xLjZjLTAuMS0xLjMtMC4zLTIuNi0wLjQtNCAgYzAtMC4zLTAuMS0wLjctMC4xLTFDNDc0LjMsMTEzLjIsMzc1LjcsMjIuOSwyNTYsMjIuOVMzNy43LDExMy4yLDI0LjUsMjI5LjVjMCwwLjMtMC4xLDAuNy0wLjEsMWMtMC4xLDEuMy0wLjMsMi42LTAuNCw0ICBjLTAuMSwwLjUtMC4xLDEuMS0wLjEsMS42Yy0wLjEsMS4yLTAuMiwyLjQtMC4zLDMuNmMwLDAuNy0wLjEsMS40LTAuMSwyLjFjLTAuMSwxLjEtMC4xLDIuMi0wLjIsMy4zYzAsMC45LTAuMSwxLjgtMC4xLDIuNyAgYzAsMC45LTAuMSwxLjgtMC4xLDIuOGMwLDEuNi0wLjEsMy4yLTAuMSw0LjdjMCwwLjIsMCwwLjUsMCwwLjdjMCwwLDAsMCwwLDAuMXMwLDAsMCwwLjFjMCwwLjIsMCwwLjUsMCwwLjdjMCwxLjYsMCwzLjIsMC4xLDQuNyAgYzAsMC45LDAuMSwxLjgsMC4xLDIuOGMwLDAuOSwwLjEsMS44LDAuMSwyLjdjMC4xLDEuMSwwLjEsMi4yLDAuMiwzLjNjMCwwLjcsMC4xLDEuNCwwLjEsMi4xYzAuMSwxLjIsMC4yLDIuNCwwLjMsMy42ICBjMCwwLjUsMC4xLDEuMSwwLjEsMS42YzAuMSwxLjMsMC4zLDIuNiwwLjQsNGMwLDAuMywwLjEsMC43LDAuMSwxQzM3LjcsMzk4LjgsMTM2LjMsNDg5LjEsMjU2LDQ4OS4xczIxOC4zLTkwLjMsMjMxLjUtMjA2LjUgIGMwLTAuMywwLjEtMC43LDAuMS0xYzAuMS0xLjMsMC4zLTIuNiwwLjQtNGMwLjEtMC41LDAuMS0xLjEsMC4xLTEuNmMwLjEtMS4yLDAuMi0yLjQsMC4zLTMuNmMwLTAuNywwLjEtMS40LDAuMS0yLjEgIGMwLjEtMS4xLDAuMS0yLjIsMC4yLTMuM2MwLTAuOSwwLjEtMS44LDAuMS0yLjdjMC0wLjksMC4xLTEuOCwwLjEtMi44YzAtMS42LDAuMS0zLjIsMC4xLTQuN2MwLTAuMiwwLTAuNSwwLTAuNyAgQzQ4OSwyNTYsNDg5LDI1Niw0ODksMjU1LjlDNDg5LDI1Niw0ODksMjU2LDQ4OSwyNTUuOXoiIGlkPSJYTUxJRF8zXyIvPjxnIGlkPSJYTUxJRF8xXyI+PGxpbmUgY2xhc3M9InN0MSIgaWQ9IlhNTElEXzJfIiB4MT0iMjEzLjYiIHgyPSIzNjkuNyIgeTE9IjM0NC4yIiB5Mj0iMTg4LjIiLz48bGluZSBjbGFzcz0ic3QxIiBpZD0iWE1MSURfNF8iIHgxPSIyMzMuOCIgeDI9IjE1NC43IiB5MT0iMzQ1LjIiIHkyPSIyNjYuMSIvPjwvZz48L3N2Zz4=);
    }

    div.iconSvg.no,
    div.iconSvg.fail {
      background-image:
        url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUwIDUwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MCA1MDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0Q3NUE0QTsiIGN4PSIyNSIgY3k9IjI1IiByPSIyNSIvPgo8cG9seWxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHBvaW50cz0iMTYsMzQgMjUsMjUgMzQsMTYgICAiLz4KPHBvbHlsaW5lIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlOiNGRkZGRkY7c3Ryb2tlLXdpZHRoOjI7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6MTA7IiBwb2ludHM9IjE2LDE2IDI1LDI1IDM0LDM0ICAgIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=);
    }

    div.iconSvg.xmark {
      background-image:
        url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ0OS45OTggNDQ5Ljk5OCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDQ5Ljk5OCA0NDkuOTk4OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij48Zz48Zz48cG9seWdvbiBwb2ludHM9IjQ0OS45NzQsMzQuODU1IDQxNS4xOTEsMCAyMjUuMDA3LDE5MC4xODQgMzQuODM5LDAgMC4wMjQsMzQuODM5IDE5MC4xOTIsMjI0Ljk5OSAgICAgMC4wMjQsNDE1LjE1OSAzNC44MzksNDQ5Ljk5OCAyMjUuMDA3LDI1OS43OTcgNDE1LjE5MSw0NDkuOTk4IDQ0OS45NzQsNDE1LjE0MyAyNTkuODMsMjI0Ljk5OSAgICIgZmlsbD0iI0Q4MDAyNyIvPjwvZz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PC9zdmc+);
    }

    div.iconSvg.circle.info {
      background-image:
        url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgMzQ3LjYxMiAzNDcuNjEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzNDcuNjEyIDM0Ny42MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48Zz48cGF0aCBmaWxsPSIjMDA4OENDIiBkPSJNMTczLjgwNywwQzc3Ljk3LDAsMCw3Ny45NywwLDE3My44MDZDMCwyNjkuNjQsNzcuOTcsMzQ3LjYxMiwxNzMuODA3LDM0Ny42MTJjOTUuODMzLDAsMTczLjgwNi03Ny45NzMsMTczLjgwNi0xNzMuODA3IEMzNDcuNjEyLDc3Ljk3LDI2OS42NCwwLDE3My44MDcsMHogTTE5Ni40ODksMjY5LjQ0N2MwLDkuOTMzLTguMDcsMTcuOTk3LTE3Ljk5LDE3Ljk5N2MtOS45MTQsMC0xNy45NjktOC4wNjQtMTcuOTY5LTE3Ljk5NyBWMTM3LjM0MmMwLTkuODk4LDguMDU2LTE3Ljk2NiwxNy45NjktMTcuOTY2YzkuOTIsMCwxNy45OSw4LjA2OCwxNy45OSwxNy45NjZWMjY5LjQ0N3ogTTE3OS4yMzQsMTAxLjE1NyBjLTExLjI5NCwwLTIwLjQ5NC05LjE5My0yMC40OTQtMjAuNDk1czkuMTkzLTIwLjQ5NSwyMC40OTQtMjAuNDk1YzExLjMwNSwwLDIwLjQ5OCw5LjE5MywyMC40OTgsMjAuNDk1IFMxOTAuNTM5LDEwMS4xNTcsMTc5LjIzNCwxMDEuMTU3eiIgLz48L2c+PC9nPjwvc3ZnPg==);
    }

    div.iconSvg.lock {
      background-image:
        url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU4IDU4IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1OCA1ODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNDN0NBQzc7c3Ryb2tlOiNDN0NBQzc7c3Ryb2tlLXdpZHRoOjI7c3Ryb2tlLW1pdGVybGltaXQ6MTA7IiBkPSJNNDIsMzJIMTVWMTMuNjAxQzE1LDYuNjUyLDIxLjA1NiwxLDI4LjUsMSAgUzQyLDYuNjUyLDQyLDEzLjYwMVYzMnogTTE5LDI4aDE5VjEzLjYwMUMzOCw4Ljg1OCwzMy43MzgsNSwyOC41LDVTMTksOC44NTgsMTksMTMuNjAxVjI4eiIvPgo8cmVjdCB4PSI4IiB5PSIyNiIgc3R5bGU9ImZpbGw6IzczODNCRjsiIHdpZHRoPSI0MiIgaGVpZ2h0PSIzMiIvPgo8cmVjdCB4PSIyOSIgeT0iMjYiIHN0eWxlPSJmaWxsOiM2ODc5QUY7IiB3aWR0aD0iMjEiIGhlaWdodD0iMzIiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6I0VCQkExNjsiIHBvaW50cz0iNDIuNTg2LDU3IDQ5LDUwLjU4NiA0OSw0NyA0My40MTQsNDcgMzMuNDE0LDU3ICIvPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojNEY1OTcwOyIgcG9pbnRzPSI5LDQ3IDksNTQuNTg2IDE2LjU4Niw0NyAiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6IzQyNEE2MDsiIHBvaW50cz0iMzAuNTg2LDU3IDQwLjU4Niw0NyAzMS40MTQsNDcgMjEuNDE0LDU3ICIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUFDQzE4OyIgZD0iTTI4LjU4Niw0N2gtOS4xNzJsLTkuNzA3LDkuNzA3QzkuNTEyLDU2LjkwMiw5LjI1Niw1Nyw5LDU3aDkuNTg2TDI4LjU4Niw0N3oiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6IzQyNEE2MDsiIHBvaW50cz0iNDksNTcgNDksNTMuNDE0IDQ1LjQxNCw1NyAiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6IzRGNTk3MDsiIHBvaW50cz0iMjksNDkuNDE0IDIxLjQxNCw1NyAyOSw1NyAiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==);
    }

    div.iconSvg.reload,
    div.iconSvg.refresh {
      background-image:
        url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAyIDUxMi4wMDIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDIgNTEyLjAwMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIHN0eWxlPSJmaWxsOiMwMDg4Y2M7IiB0cmFuc2Zvcm09InJvdGF0ZSg5MCAyNTYgMjU2KSIgZD0iTTQzNi44NjYsNDM2Ljg3MWM0OC4zMTItNDguMzExLDc0LjkyMS0xMTIuNTQ2LDc0LjkyMS0xODAuODcxIGMwLTE0MS4wMzktMTE0Ljc0NC0yNTUuNzg1LTI1NS43ODMtMjU1Ljc4NnY0OS41MDdjMTEzLjc0MSwwLjAwMiwyMDYuMjc2LDkyLjUzOSwyMDYuMjc2LDIwNi4yNzljMCw1NS4xMDEtMjEuNDU4LDEwNi45MDItNjAuNDIsMTQ1Ljg2NGwtNy41NzEsNy41NzFsLTY3LjU1Mi02Ny41NTJsMC4wMjEsMTcwLjA3NmwxNzAuMDk2LDAuMDQxbC02Ny41NTktNjcuNTU5TDQzNi44NjYsNDM2Ljg3MXoiLz48cGF0aCBzdHlsZT0iZmlsbDojMDA4OGNjOyIgdHJhbnNmb3JtPSJyb3RhdGUoOTAgMjU2IDI1NikiIGQ9Ik00OS43MjQsMjU2LjAwMWMwLTU1LjEwMSwyMS40NTgtMTA2LjkwMiw2MC40Mi0xNDUuODY0bDcuNTcxLTcuNTcxbDY3LjU1Miw2Ny41NTJMMTg1LjI0NSwwLjA0MUwxNS4xNDgsMGw2Ny41NTksNjcuNTU5bC03LjU3MSw3LjU3QzI2LjgyNCwxMjMuNDM5LDAuMjE1LDE4Ny42NzUsMC4yMTUsMjU1Ljk5OWMwLDE0MS4wMzksMTE0Ljc0NCwyNTUuNzg1LDI1NS43ODMsMjU1Ljc4NnYtNDkuNTA3QzE0Mi4yNTgsNDYyLjI3OCw0OS43MjQsMzY5Ljc0Miw0OS43MjQsMjU2LjAwMXoiLz48L3N2Zz4=);
    }

    /* ------------------------------------------------------------------------- */
    .tabDemo {
      width: 100%;
      border-collapse: collapse;
    }

    .tabDemo thead th {
      border: 1px solid var(--white);
      background: var(--primary);
      color: var(--white);
      padding: 10px;
      margin: 0;
    }

    .tabDemo tbody td:first-child {
      background: var(--secondary);
    }

    .tabDemo tbody td {
      border: 1px solid var(--secondary);
      background: var(--white);
      padding: 10px;
      margin: 0;
      text-align: left;
    }

    .tabDemo tbody td:nth-child(1),
    .tabDemo tbody td:nth-child(2) {
      white-space: nowrap;
    }

    .tabHtmlToPpt thead th {
      background: var(--light);
      color: white;
      font-weight: normal;
    }

    .tabHtmlToPpt tbody td {
      background: var(--light);
      color: var(--dark);
    }

    .tabHtmlToPpt th,
    .tabHtmlToPpt td {
      border: 1px solid var(--light);
      padding: 4px 8px;
    }
  </style>
  <html>

  <head>

  <body>
    <div class="container"><br><br><br><br>
      <h2 style="font-family: Arial, Helvetica, sans-serif;" class="text-center">Come here to generete data, html to Power Point <i class="icon-magic text-primary"> </i></h2>
      <br>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Gráficos</a>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <br>
          <table class="table" id="generete">
            <thead class="thead-dark">
              <tr>
                <th scope="col" data-pptx-min-width="0.8">Nome Completo</th>
                <th scope="col" data-pptx-min-width="0.8">E-mail</th>
                <!-- <th scope="col" data-pptx-min-width="0.8">Telefone</th> -->
              </tr>
            </thead>
            <tbody>
              <?php   $select = $con->query("SELECT * FROM usuarios"); ?>
                <?php

                foreach ($select as $dados) {
                echo '<tr> ';
                echo '<td>'.$dados["nome"].'</td>';
                echo '<td>'.$dados["email"].'<td>';
                // echo '<td>'.$dados["telefone"].'<td>';
                echo '</tr>';
                
                }
                ?>
             

            </tbody>
          </table>
          <br>
          <div class="container"><br>
            <button class=" btn btn-primary " class="create" onclick="{ var pptx=new PptxGenJS(); pptx.tableToSlides('generete'); pptx.writeFile(); }">Generete</button>
          </div>

          <script>



            pptx.tableToSlides("generete");

              // Optionally, include a Master Slide name for pre-defined margins, background, logo, etc.
              pptx.tableToSlides("generete", { master: "MASTER_SLIDE" });

              // Optionally, add images/shapes/text/tables to each Slide
              pptx.tableToSlides("generete", {
                addText: { text: "Dynamic Title", options: { x: 1, y: 0.5, color: "0088CC" } }
              });
              pptx.tableToSlides("generete", {
                addImage: { path: "images/logo.png", x: 10, y: 0.5, w: 1.2, h: 0.75 }
              });


          

          </script>
        </div>
        <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

          <script type="text/javascript">
            google.charts.load("current", {
              packages: ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

              var data = google.visualization.arrayToDataTable([
                ['Element', 'Density', {
                  role: 'style'
                }],
                ['Copper', 8.94, '#b87333', ],
                ['Silver', 10.49, 'silver'],
                ['Gold', 19.30, 'gold'],
                ['Platinum', 21.45, 'color: #e5e4e2']
              ]);

              var options = {
                title: "Density of Precious Metals, in g/cm^3",
                bar: {
                  groupWidth: '95%'
                },
                legend: 'none',
              };

              var chart_div = document.getElementById('chart_div');
              var chart = new google.visualization.ColumnChart(chart_div);

              // Wait for the chart to finish drawing before calling the getImageURI() method.
              google.visualization.events.addListener(chart, 'ready', function() {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(chart_div.innerHTML);
              });

              chart.draw(data, options);

            }
          </script>

          <div id='chart_div'></div>


          <script>
            function CreatePowerPoint() {
              // Criando nova apresentação
              var pptx = new PptxGenJS();
              // Adicionando novo slider de apresentação
              var slide = pptx.addSlide();
              // 
              // slide.addText(
              //     'Teste relatorio em power point com php e javascript',
              //     { x: 0.0, y: 0.25, w: '100%', h: 1.5, align: 'center', fontSize: 24, color: '0088CC', fill: { color: 'F1F1F1' } }
              // );
              slide.addImage({
                // Aqui é a imagem em base64 tens a opção de usar imagens locais também
                // encontras isso na documentação da API https://gitbrent.github.io/PptxGenJS/docs/api-images.html
                data: "data:image/png;base64,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"
              });

              slide.addSlide()
              // salvando 
              pptx.writeFile('PptxGenJs-Basic-Slide-Demo');
            }
          </script>
          <div class="container"><br>
            <button class=" btn btn-primary " onclick=" CreatePowerPoint(); ">Generete</button>
          </div>
        </div>
        <!-- <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
      </div>

    </div>







    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/prism.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/pptxgenjs@latest/examples/images/base64Images.js" async></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/pptxgenjs@latest/dist/pptxgen.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/pptxgenjs@latest/demos/common/demos.js"></script>
  </body>

  </html>