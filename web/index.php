<?php
declare(strict_types=1);

$version = file_get_contents('cache/version.txt');
define('LATEST_VERSION', $version === false ? '_' : $version);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="index,follow">
    <meta name="author" content="chylex">
    <meta name="description" content="Discord History Tracker - Save history of Discord servers and private conversations">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Discord History Tracker</title>
    
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="inner">
      <h1>Discord History Tracker&nbsp;<span class="bar">|</span>&nbsp;<span class="notes"><a href="https://github.com/chylex/Discord-History-Tracker/releases">Release&nbsp;Notes</a></span></h1>
      <p>Discord History Tracker lets you save chat history in your servers, groups, and private conversations, and view it offline.</p>
      <img src="img/tracker.png" width="851" class="dht bordered">
      <p>This page explains how to use the desktop app, which is available for Windows / Linux / Mac.</p>
      <p>If you are looking for the older version of Discord History Tracker which only needs a browser or the Discord app, visit the page for the <a href="https://dht.chylex.com/browser-only">browser-only version</a>, however keep in mind that this version has <strong>significant limitations and fewer features</strong>.</p>
      
      <h2>How to Use</h2>
      <p>Download the latest version of the desktop app here, or visit <a href="https://github.com/chylex/Discord-History-Tracker/releases">All Releases</a> for older versions and release notes.</p>
      <div class="downloads">
        <a href="https://github.com/chylex/Discord-History-Tracker/releases/download/<?= LATEST_VERSION ?>/win-x64.zip">
          <svg class="icon icon-large">
            <use href="#icon-windows" />
          </svg>
          <span class="platform">Windows</span>
          <span class="arch">64-bit</span>
        </a>
        <a href="https://github.com/chylex/Discord-History-Tracker/releases/download/<?= LATEST_VERSION ?>/linux-x64.zip">
          <svg class="icon">
            <use href="#icon-linux" />
          </svg>
          <span class="platform">Linux</span>
          <span class="arch">64-bit</span>
        </a>
        <a href="https://github.com/chylex/Discord-History-Tracker/releases/download/<?= LATEST_VERSION ?>/osx-x64.zip">
          <svg class="icon icon-large">
            <use href="#icon-apple" />
          </svg>
          <span class="platform">macOS</span>
          <span class="arch">Intel</span>
        </a>
        <a href="https://github.com/chylex/Discord-History-Tracker/releases/download/<?= LATEST_VERSION ?>/portable.zip">
          <svg class="icon">
            <use href="#icon-globe" />
          </svg>
          <span class="platform">Other</span>
        </a>
      </div>
      <p>To launch the three OS-specific versions, extract the <strong>DiscordHistoryTracker</strong> executable, and double-click it.</p>
      <p>To launch the <strong>Other</strong> version, which works on other operating systems including 32-bit versions, you must install <a href="https://dotnet.microsoft.com/download/dotnet/8.0" rel="nofollow noopener">ASP.NET Core Runtime 8</a>. Then extract the downloaded archive into a folder, open the folder in a terminal, and type: <code>dotnet DiscordHistoryTracker.dll</code></p>
      
      <h3>How to Track Messages</h3>
      <p>The app saves messages into a database file stored on your computer. When you open the app, you are given the option to create a new database file, or open an existing one.</p>
      <p>In the <strong>Tracking</strong> tab, click <strong>Copy Tracking Script</strong> to generate a tracking script that works similarly to the browser-only version of Discord History Tracker, but instead of saving messages in the browser, the tracking script sends them to the app which saves them in the database file.</p>
      <img src="img/app-tracker.png" class="dht bordered" alt="Screenshot of the App (Tracker tab)">
      <p>When using the script for the first time, you will see a <strong>Settings</strong> dialog where you can configure the script. These settings will be remembered as long as you don't delete cookies in your browser.</p>
      <p>By default, Discord History Tracker is set to automatically scroll up to load the channel history, and pause tracking if it reaches a previously saved message to avoid unnecessary history loading.</p>
      
      <h3>How to View History</h3>
      <p>In the <strong>Viewer</strong> tab, you can open a viewer in your browser, or save it as a file you can open in your browser later. You also have the option to apply filters to only view a portion of the saved messages.</p>
      <img src="img/app-viewer.png" class="dht bordered" alt="Screenshot of the App (Viewer tab)">
      
      <h3>Technical Details</h3>
      <ol>
        <li>The app uses SQLite. You can use SQL to query or manipulate the database file.</li>
        <li>The app communicates with the tracking script using an integrated server. The server only listens for connections from programs running on your computer, i.e. your browser or the Discord app. The tracking script contains a randomly generated token that ensures only the tracking script is able to talk to the server.</li>
        <li>You can use the <code>-port &lt;p&gt;</code> and <code>-token &lt;t&gt;</code> command line arguments to configure the server &mdash; otherwise, it is configured automatically to allow running multiple instances of the app, and prevent reuse of the tracking script between instances.</li>
      </ol>
      
      <h2>External Links</h2>
      <p class="links">
        <a href="https://github.com/chylex/Discord-History-Tracker/issues">Issues&nbsp;&amp;&nbsp;Suggestions</a>&nbsp;&nbsp;&mdash;&nbsp;
        <a href="https://github.com/chylex/Discord-History-Tracker">Source&nbsp;Code</a>&nbsp;&nbsp;&mdash;&nbsp;
        <a href="https://twitter.com/chylexmc">Follow&nbsp;Dev&nbsp;on&nbsp;Twitter</a>&nbsp;&nbsp;&mdash;&nbsp;
        <a href="https://www.patreon.com/chylex">Support&nbsp;via&nbsp;Patreon</a>&nbsp;&nbsp;&mdash;&nbsp;
        <a href="https://ko-fi.com/chylex">Support&nbsp;via&nbsp;Ko-fi</a>
      </p>
      
      <footer>
        <p>Discord History Tracker is released under the open-source <a href="https://github.com/chylex/Discord-History-Tracker/blob/master/LICENSE.md">MIT License</a>. Not affiliated with Discord.</p>
        <p>Website icons from <a href="https://fontawesome.com" rel="nofollow">Font Awesome</a>, free icon pack under <a href="https://creativecommons.org/licenses/by/4.0/" rel="nofollow">CC BY 4.0</a>.</p>
      </footer>
      
      <svg aria-hidden="true" id="svg-definitions">
        <symbol id="icon-windows" viewBox="0 0 26 28">
          <path d="M10.656 15.719v10.172l-10.656-1.469v-8.703h10.656zM10.656 4.109v10.297h-10.656v-8.828zM26 15.719v12.281l-14.172-1.953v-10.328h14.172zM26 2v12.406h-14.172v-10.453z" />
        </symbol>
        <symbol id="icon-linux" viewBox="0 0 25 28">
          <path d="M10.359 6.422v0c-0.313 0.031-0.203 0.313-0.375 0.313-0.156 0.016-0.125-0.344 0.375-0.313zM11.719 6.641c-0.156 0.047-0.172-0.25-0.453-0.172v0c0.453-0.203 0.609 0.109 0.453 0.172zM6.234 13.312c-0.141-0.047-0.109 0.234-0.25 0.453-0.109 0.203-0.391 0.359-0.172 0.391v0c0.078 0.016 0.297-0.172 0.391-0.391 0.078-0.266 0.156-0.406 0.031-0.453zM19.594 18.922c0-0.281-0.609-0.547-0.859-0.656 0.422-1.406 0.234-1.969-0.047-3.297-0.219-1-1.141-2.359-1.859-2.781 0.187 0.156 0.531 0.609 0.891 1.297 0.625 1.172 1.25 2.906 0.844 4.344-0.156 0.562-0.531 0.641-0.781 0.656-1.094 0.125-0.453-1.313-0.906-3.266-0.516-2.188-1.047-2.344-1.172-2.516-0.641-2.844-1.344-2.562-1.547-3.625-0.172-0.953 0.828-1.734-0.531-2-0.422-0.078-1.016-0.5-1.25-0.531s-0.359-1.578 0.516-1.625c0.859-0.063 1.016 0.969 0.859 1.375-0.25 0.406 0.016 0.562 0.438 0.422 0.344-0.109 0.125-1.016 0.203-1.141-0.219-1.313-0.766-1.5-1.328-1.609-2.156 0.172-1.188 2.547-1.406 2.328-0.313-0.328-1.219-0.031-1.219-0.234 0.016-1.219-0.391-1.922-0.953-1.937-0.625-0.016-0.875 0.859-0.906 1.359-0.047 0.469 0.266 1.453 0.5 1.375 0.156-0.047 0.422-0.359 0.141-0.344-0.141 0-0.359-0.344-0.391-0.75-0.016-0.406 0.141-0.812 0.672-0.797 0.609 0.016 0.609 1.234 0.547 1.281-0.203 0.141-0.453 0.406-0.484 0.453-0.203 0.328-0.594 0.422-0.75 0.562-0.266 0.281-0.328 0.594-0.125 0.703 0.719 0.406 0.484 0.875 1.484 0.906 0.656 0.031 1.141-0.094 1.594-0.234 0.344-0.109 1.453-0.344 1.687-0.75 0.109-0.172 0.234-0.172 0.313-0.125 0.156 0.078 0.187 0.375-0.203 0.469-0.547 0.156-1.094 0.453-1.594 0.641-0.484 0.203-0.641 0.281-1.094 0.359-1.031 0.187-1.797-0.375-1.109 0.297 0.234 0.219 0.453 0.359 1.047 0.344 1.313-0.047 2.766-1.625 2.906-0.922 0.031 0.156-0.406 0.344-0.75 0.516-1.219 0.594-2.078 1.781-2.859 1.375-0.703-0.375-1.406-2.109-1.391-1.328 0.016 1.203-1.578 2.266-0.844 3.641-0.484 0.125-1.563 2.422-1.719 3.609-0.094 0.688 0.063 1.531-0.109 2-0.234 0.688-1.297-0.656-0.953-2.297 0.063-0.281 0-0.344-0.078-0.203-0.422 0.766-0.187 1.844 0.156 2.594 0.141 0.328 0.5 0.469 0.766 0.75 0.547 0.625 2.703 2.219 3.078 2.609 0.484 0.453 0.344 1.516-0.656 1.625v0c0.516 0.969 1.016 1.062 1 2.641 0.594-0.313 0.359-1 0.109-1.437-0.172-0.313-0.391-0.453-0.344-0.531 0.031-0.047 0.344-0.313 0.516-0.109 0.531 0.594 1.531 0.703 2.594 0.562 1.078-0.125 2.234-0.5 2.766-1.359 0.25-0.406 0.422-0.547 0.531-0.469 0.125 0.063 0.172 0.344 0.156 0.812-0.016 0.5-0.219 1.016-0.359 1.437-0.141 0.484-0.187 0.812 0.281 0.828 0.125-0.875 0.375-1.734 0.438-2.609 0.078-1-0.641-2.844 0.141-3.766 0.203-0.25 0.453-0.281 0.797-0.281 0.047-1.25 1.969-1.156 2.609-0.641zM9.781 6c0.063-0.391-0.125-0.672-0.219-0.703-0.187-0.047-0.156 0.234-0.063 0.203v0c0.063 0 0.141 0.094 0.109 0.234-0.031 0.187-0.016 0.313 0.125 0.313 0.016 0 0.047 0 0.047-0.047zM16.328 9.078c-0.063-0.297-0.281-0.187-0.531-0.344-0.297-0.187-0.359-0.5-0.469-0.391v0c-0.328 0.359 0.406 1.109 0.719 1.172 0.187 0.031 0.328-0.219 0.281-0.438zM13.547 5.75c0.016-0.375-0.313-0.562-0.391-0.547-0.203 0.016-0.141 0.109-0.047 0.141v0c0.125 0.031 0.25 0.25 0.281 0.484 0 0.031 0.156-0.031 0.156-0.078zM14.391 2.109c0.016-0.078-0.187-0.172-0.328-0.281-0.125-0.125-0.25-0.234-0.375-0.234-0.313 0.031-0.156 0.359-0.203 0.516v0c-0.063 0.172-0.297 0.313-0.141 0.438 0.141 0.109 0.234-0.172 0.531-0.281 0.078-0.031 0.438 0.016 0.516-0.156zM23.219 23.063c1.922 1.188-0.719 2.172-1.859 2.75-0.891 0.453-2.078 1.453-2.516 1.875-0.328 0.313-1.687 0.469-2.453 0.078-0.891-0.453-0.422-1.172-1.797-1.219-0.688-0.016-1.359-0.016-2.031-0.016-0.594 0.016-1.188 0.047-1.797 0.063-2.063 0.047-2.266 1.375-3.594 1.328-0.906-0.031-2.047-0.75-4.016-1.156-1.375-0.281-2.703-0.359-2.984-0.969s0.344-1.297 0.391-1.891c0.047-0.797-0.594-1.875-0.125-2.281 0.406-0.359 1.266-0.094 1.828-0.406 0.594-0.344 0.844-0.609 0.844-1.344 0.219 0.75-0.016 1.359-0.5 1.656-0.297 0.187-0.844 0.281-1.297 0.234-0.359-0.031-0.578 0.016-0.672 0.156-0.141 0.172-0.094 0.484 0.078 0.891s0.375 0.672 0.344 1.172c-0.016 0.5-0.578 1.094-0.484 1.516 0.031 0.156 0.187 0.297 0.578 0.406 0.625 0.172 1.766 0.344 2.875 0.609 1.234 0.313 2.516 0.875 3.313 0.766 2.375-0.328 1.016-2.875 0.641-3.484v0c-2.016-3.156-3.344-5.219-4.406-4.406-0.266 0.219-0.281-0.531-0.266-0.828 0.047-1.031 0.562-1.406 0.875-2.203 0.594-1.516 1.047-3.25 1.953-4.141 0.672-0.875 1.734-2.297 1.937-3.047-0.172-1.625-0.219-3.344-0.25-4.844-0.031-1.609 0.219-3.016 2.031-4 0.438-0.234 1.016-0.328 1.625-0.328 1.078-0.016 2.281 0.297 3.047 0.859 1.219 0.906 1.984 2.828 1.891 4.203-0.063 1.078 0.125 2.188 0.469 3.344 0.406 1.359 1.047 2.312 2.078 3.406 1.234 1.313 2.203 3.891 2.484 5.531 0.25 1.531-0.094 2.484-0.422 2.531-0.5 0.078-0.812 1.656-2.375 1.594-1-0.047-1.094-0.641-1.375-1.156-0.453-0.797-0.906-0.547-1.078 0.297-0.094 0.422-0.031 1.047 0.109 1.516 0.281 0.984 0.187 1.906 0.016 3.047-0.328 2.156 1.516 2.562 2.75 1.531 1.219-1.016 1.484-1.172 3.016-1.703 2.328-0.797 1.547-1.5 0.297-1.922-1.125-0.375-1.172-2.266-0.766-2.625 0.094 2.031 1.156 2.328 1.594 2.609z" />
        </symbol>
        <symbol id="icon-apple" viewBox="0 0 22 28">
          <path d="M21.766 18.984c-0.391 1.234-1.016 2.547-1.922 3.906-1.344 2.047-2.688 3.063-4.016 3.063-0.531 0-1.25-0.172-2.188-0.5-0.922-0.344-1.719-0.5-2.359-0.5-0.625 0-1.375 0.172-2.219 0.516-0.859 0.359-1.547 0.531-2.063 0.531-1.609 0-3.156-1.359-4.703-4.047-1.516-2.688-2.297-5.297-2.297-7.859 0-2.391 0.594-4.328 1.766-5.844 1.172-1.5 2.641-2.25 4.438-2.25 0.766 0 1.672 0.156 2.766 0.469 1.078 0.313 1.797 0.469 2.156 0.469 0.453 0 1.203-0.172 2.234-0.531 1.031-0.344 1.937-0.531 2.703-0.531 1.25 0 2.359 0.344 3.328 1.016 0.547 0.375 1.094 0.906 1.625 1.563-0.812 0.688-1.406 1.297-1.781 1.844-0.672 0.969-1.016 2.047-1.016 3.234 0 1.281 0.359 2.453 1.078 3.484s1.547 1.687 2.469 1.969zM15.891 0.656c0 0.641-0.156 1.359-0.453 2.125-0.313 0.781-0.797 1.5-1.453 2.156-0.562 0.562-1.125 0.938-1.687 1.125-0.359 0.109-0.891 0.203-1.625 0.266 0.031-1.547 0.438-2.891 1.219-4.016s2.094-1.891 3.906-2.312c0.031 0.141 0.063 0.25 0.078 0.344 0 0.109 0.016 0.203 0.016 0.313z" />
        </symbol>
        <symbol id="icon-globe" viewBox="0 0 24 28">
          <path d="M12 2c6.625 0 12 5.375 12 12s-5.375 12-12 12-12-5.375-12-12 5.375-12 12-12zM16.281 10.141c-0.125 0.094-0.203 0.266-0.359 0.297 0.078-0.016 0.156-0.297 0.203-0.359 0.094-0.109 0.219-0.172 0.344-0.234 0.266-0.109 0.531-0.141 0.812-0.187 0.266-0.063 0.594-0.063 0.797 0.172-0.047-0.047 0.328-0.375 0.375-0.391 0.141-0.078 0.375-0.047 0.469-0.187 0.031-0.047 0.031-0.344 0.031-0.344-0.266 0.031-0.359-0.219-0.375-0.438 0 0.016-0.031 0.063-0.094 0.125 0.016-0.234-0.281-0.063-0.391-0.094-0.359-0.094-0.313-0.344-0.422-0.609-0.063-0.141-0.234-0.187-0.297-0.328-0.063-0.094-0.094-0.297-0.234-0.313-0.094-0.016-0.266 0.328-0.297 0.313-0.141-0.078-0.203 0.031-0.313 0.094-0.094 0.063-0.172 0.031-0.266 0.078 0.281-0.094-0.125-0.25-0.266-0.219 0.219-0.063 0.109-0.297-0.016-0.406h0.078c-0.031-0.141-0.469-0.266-0.609-0.359s-0.891-0.25-1.047-0.156c-0.187 0.109 0.047 0.422 0.047 0.578 0.016 0.187-0.187 0.234-0.187 0.391 0 0.266 0.5 0.219 0.375 0.578-0.078 0.219-0.375 0.266-0.5 0.438-0.125 0.156 0.016 0.438 0.141 0.547 0.125 0.094-0.219 0.25-0.266 0.281-0.266 0.125-0.469-0.266-0.531-0.5-0.047-0.172-0.063-0.375-0.25-0.469-0.094-0.031-0.391-0.078-0.453 0.016-0.094-0.234-0.422-0.328-0.641-0.406-0.313-0.109-0.578-0.109-0.906-0.063 0.109-0.016-0.031-0.5-0.297-0.422 0.078-0.156 0.047-0.328 0.078-0.484 0.031-0.125 0.094-0.25 0.187-0.359 0.031-0.063 0.375-0.422 0.266-0.438 0.266 0.031 0.562 0.047 0.781-0.172 0.141-0.141 0.203-0.375 0.344-0.531 0.203-0.234 0.453 0.063 0.672 0.078 0.313 0.016 0.297-0.328 0.125-0.484 0.203 0.016 0.031-0.359-0.078-0.406-0.141-0.047-0.672 0.094-0.391 0.203-0.063-0.031-0.438 0.75-0.656 0.359-0.063-0.078-0.094-0.406-0.234-0.422-0.125 0-0.203 0.141-0.25 0.234 0.078-0.203-0.438-0.344-0.547-0.359 0.234-0.156 0.047-0.328-0.125-0.422-0.125-0.078-0.516-0.141-0.625-0.016-0.297 0.359 0.313 0.406 0.469 0.5 0.047 0.031 0.234 0.141 0.125 0.219-0.094 0.047-0.375 0.125-0.406 0.187-0.094 0.141 0.109 0.297-0.031 0.438-0.141-0.141-0.141-0.375-0.25-0.531 0.141 0.172-0.562 0.078-0.547 0.078-0.234 0-0.609 0.156-0.781-0.078-0.031-0.063-0.031-0.422 0.063-0.344-0.141-0.109-0.234-0.219-0.328-0.281-0.516 0.172-1 0.391-1.469 0.641 0.063 0.016 0.109 0.016 0.187-0.016 0.125-0.047 0.234-0.125 0.359-0.187 0.156-0.063 0.484-0.25 0.656-0.109 0.016-0.031 0.063-0.063 0.078-0.078 0.109 0.125 0.219 0.25 0.313 0.391-0.125-0.063-0.328-0.031-0.469-0.016-0.109 0.031-0.297 0.063-0.344 0.187 0.047 0.078 0.109 0.203 0.078 0.281-0.203-0.141-0.359-0.375-0.641-0.406-0.125 0-0.25 0-0.344 0.016-1.5 0.828-2.766 2.031-3.672 3.469 0.063 0.063 0.125 0.109 0.187 0.125 0.156 0.047 0 0.5 0.297 0.266 0.094 0.078 0.109 0.187 0.047 0.297 0.016-0.016 0.641 0.391 0.688 0.422 0.109 0.094 0.281 0.203 0.328 0.328 0.031 0.109-0.063 0.234-0.156 0.281-0.016-0.031-0.25-0.266-0.281-0.203-0.047 0.078 0 0.5 0.172 0.484-0.25 0.016-0.141 0.984-0.203 1.172 0 0.016 0.031 0.016 0.031 0.016-0.047 0.187 0.109 0.922 0.422 0.844-0.203 0.047 0.359 0.766 0.438 0.812 0.203 0.141 0.438 0.234 0.578 0.438 0.156 0.219 0.156 0.547 0.375 0.719-0.063 0.187 0.328 0.406 0.313 0.672-0.031 0.016-0.047 0.016-0.078 0.031 0.078 0.219 0.375 0.219 0.484 0.422 0.063 0.125 0 0.422 0.203 0.359 0.031-0.344-0.203-0.688-0.375-0.969-0.094-0.156-0.187-0.297-0.266-0.453-0.078-0.141-0.094-0.313-0.156-0.469 0.063 0.016 0.406 0.141 0.375 0.187-0.125 0.313 0.5 0.859 0.672 1.062 0.047 0.047 0.406 0.516 0.219 0.516 0.203 0 0.484 0.313 0.578 0.469 0.141 0.234 0.109 0.531 0.203 0.781 0.094 0.313 0.531 0.453 0.781 0.594 0.219 0.109 0.406 0.266 0.625 0.344 0.328 0.125 0.406 0.016 0.688-0.031 0.406-0.063 0.453 0.391 0.781 0.562 0.203 0.109 0.641 0.266 0.859 0.172-0.094 0.031 0.328 0.672 0.359 0.719 0.141 0.187 0.406 0.281 0.562 0.469 0.047-0.031 0.094-0.078 0.109-0.141-0.063 0.172 0.234 0.5 0.391 0.469 0.172-0.031 0.219-0.375 0.219-0.5-0.313 0.156-0.594 0.031-0.766-0.281-0.031-0.078-0.281-0.516-0.063-0.516 0.297 0 0.094-0.234 0.063-0.453s-0.25-0.359-0.359-0.547c-0.094 0.187-0.406 0.141-0.5-0.016 0 0.047-0.047 0.125-0.047 0.187-0.078 0-0.156 0.016-0.234-0.016 0.031-0.187 0.047-0.422 0.094-0.625 0.078-0.281 0.594-0.828-0.078-0.797-0.234 0.016-0.328 0.109-0.406 0.313-0.078 0.187-0.047 0.359-0.266 0.453-0.141 0.063-0.609 0.031-0.75-0.047-0.297-0.172-0.5-0.719-0.5-1.031-0.016-0.422 0.203-0.797 0-1.188 0.094-0.078 0.187-0.234 0.297-0.313 0.094-0.063 0.203 0.047 0.25-0.141-0.047-0.031-0.109-0.094-0.125-0.094 0.234 0.109 0.672-0.156 0.875 0 0.125 0.094 0.266 0.125 0.344-0.031 0.016-0.047-0.109-0.234-0.047-0.359 0.047 0.266 0.219 0.313 0.453 0.141 0.094 0.094 0.344 0.063 0.516 0.156 0.172 0.109 0.203 0.281 0.406 0.047 0.125 0.187 0.141 0.187 0.187 0.375 0.047 0.172 0.141 0.609 0.297 0.688 0.328 0.203 0.25-0.344 0.219-0.531-0.016-0.016-0.016-0.531-0.031-0.531-0.5-0.109-0.313-0.5-0.031-0.766 0.047-0.031 0.406-0.156 0.562-0.281 0.141-0.125 0.313-0.344 0.234-0.547 0.078 0 0.141-0.063 0.172-0.141-0.047-0.016-0.234-0.172-0.266-0.156 0.109-0.063 0.094-0.156 0.031-0.25 0.156-0.094 0.078-0.266 0.234-0.328 0.172 0.234 0.516-0.031 0.344-0.219 0.156-0.219 0.516-0.109 0.609-0.313 0.234 0.063 0.063-0.234 0.187-0.406 0.109-0.141 0.297-0.141 0.438-0.219 0 0.016 0.391-0.219 0.266-0.234 0.266 0.031 0.797-0.25 0.391-0.484 0.063-0.141-0.141-0.203-0.281-0.234 0.109-0.031 0.25 0.031 0.344-0.031 0.203-0.141 0.063-0.203-0.109-0.25-0.219-0.063-0.5 0.078-0.672 0.187zM13.734 23.844c2.141-0.375 4.047-1.437 5.484-2.953-0.094-0.094-0.266-0.063-0.391-0.125-0.125-0.047-0.219-0.094-0.375-0.125 0.031-0.313-0.313-0.422-0.531-0.578-0.203-0.156-0.328-0.328-0.625-0.266-0.031 0.016-0.344 0.125-0.281 0.187-0.203-0.172-0.297-0.266-0.562-0.344-0.25-0.078-0.422-0.391-0.672-0.109-0.125 0.125-0.063 0.313-0.125 0.438-0.203-0.172 0.187-0.375 0.031-0.562-0.187-0.219-0.516 0.141-0.672 0.234-0.094 0.078-0.203 0.109-0.266 0.203-0.078 0.109-0.109 0.25-0.172 0.359-0.047-0.125-0.313-0.094-0.328-0.187 0.063 0.375 0.063 0.766 0.141 1.141 0.047 0.219 0 0.578-0.187 0.75s-0.422 0.359-0.453 0.625c-0.031 0.187 0.016 0.359 0.187 0.406 0.016 0.234-0.25 0.406-0.234 0.656 0 0.016 0.016 0.172 0.031 0.25z" />
        </symbol>
      </svg>
    </div>
  </body>
</html>
