# index.php
#### 程式碼差異
```
nfixed:
<h3><?php print($_GET['url']);?></h3>
<p>
  <a href="<?php print($_GET['url']);?>">確定</a>
</p>
```
```
fixed:
<h3><?php print(basename($_GET['url']));?></h3>
<p>
    <a href="<?php print(basename($_GET['url']));?>">確定</a>
</p>
```
差異點為 nfixed 中並沒有使用到 basename() 函數  
basename() 函數在這邊的作用為驗證其檔案是否存在  
假如有以下這個網址  
```
http://example.com/index.php?url=http://example2.com/virus.php
```
nfixed 的 index.php 會顯示如下
```
確認要前往該網頁嗎?
http://example2.com/virus.php

確定
```
而 fixed 的 index.php 會顯示如下
```
確認要前往該網頁嗎?
virus.php

確定
```
而這樣的差異點在於如果今天不是讓使用者手動按確定跳轉到網頁，而是  
開啟網頁並自動跳轉，那有可能會有人使用這個跳轉服務將網頁導向自己的病毒網頁  
前者是並沒有任何的驗證機制，只要 GET 取得網址有效就會跳轉  
後者使用了 basename() 函數，所以會變相找尋網址中最尾端的檔案名稱  
意思是假如我的目錄並沒有 virus.php 這個檔案，而 cracker 那邊有個名為 virus.php 的病毒網頁  
使用 basename() 就會在目錄找 virus.php ，但是找不到所以 http 會回傳 404 error  
使用此函數抵檔非自行設定的跳轉網頁
