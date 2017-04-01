# cost.php
#### 程式碼差異
```
nfixed:
if( $_SESSION['login'] == 'admin' ){                                                              
//當 session 值為 admin 時執行下方程式
     file_put_contents('money.csv', $money-$_GET['cost']);
    $url = 'admin.php';
}
```

```
fixed1:
if( $_SESSION['login'] != 'admin' || !preg_match('/admin.php/', $_SERVER['HTTP_REFERER']) ){      
//當 session != admin 或 $_SERVER['HTTP_REFERER'] 的值與 /admin.php/ 回傳為 false 時導向網頁到首頁 *註1
    $url = './';
}
```

```
fixed2:
if( $_SESSION['login'] != 'admin' || $_SESSION['token'] != $_GET['token'] ){ *註2
//當 session != admin 或 $_SESSION['token'] != 從網址取得的 token 導向網頁到首頁
    $url = './';
}
```
註1:  
```
$_SERVER['HTTP_REFERER'] 完全來源於瀏覽器。並不是所有的用戶代理（瀏覽器）都會設置這個變量，
而且有的還可以手工修改 HTTP_REFERER。因此，$_SERVER['HTTP_REFERER'] 不總是真實正確的。
通常下面的一些方式，$_SERVER['HTTP_REFERER'] 會無效：
1.直接輸入網址訪問該網頁。
2.Javascript 打開的網址。
3.Javascript 重定向（window.location）網址。
4.使用 meta refresh 重定向的網址。
5.使用 PHP header 重定向的網址。
6.flash 中的鏈接。
7.瀏覽器未加設置或被用戶修改。
所以一般來說，只有通過 <a></a> 超鏈接以及 POST 或 GET 表單訪問的頁面，
$_SERVER['HTTP_REFERER'] 才有效。

在 fixed1 中的 !preg_match('/admin.php/', $_SERVER['HTTP_REFERER']
當 preg_match 正規表示式回傳 true 時加上最前方的 '!' 轉換成 false
true -> false
false -> true
```
註2:  
```
在fixed2 中 token 的值在 login.php 登入後轉向 admin.php 中的 

$token = sha1(microtime());
$_SESSION['token'] = $token;

給予其值 microtime() 函數返回當前 Unix 時間戳的微秒數，並使用 sha1 加密法加密
並在 admin.php 中

<input type="hidden" name="token" value="<?php print($token);?>"></p>

利用input type 隱藏 input 輸入框 並給予其 token 值，且此 input 的 name 是 token (接收端網頁一定要用的)
在 cost.php 中取得網址中的 token 值並與 session 比對(在admin.php 中使用 GET 傳送就要用 GET 接收)
```
在 cost.php 中的建議修改:  
將價錢的部分設定成使用 POST 傳輸，不使用 GET 傳輸，避免從網址中修改金額  
或者使用資料庫的方式，直接從資料庫中抓取金額進行後續處理  
