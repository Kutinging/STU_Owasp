# admin.php  
缺少驗證機制，無法判定是否登入的使用者確實為admin，有可能是其他使用者，但也可以進到此頁面  
需要增加以下驗證機制
```
if( $_SESSION['login'] != 'admin' ){        //當啟動的session 值非 admin   
  header('Location: ./unsafe.php');         //跳轉到 unsafe.php  
}  
```  
# login.php  
### php程式碼解釋
```
nfixed:
if( $_GET['login'] == 'user' ){             //從網址中GET 'login' 數值 == 'user'時  
    $_SESSION['login'] = 'user';            //給予其 session 值為 user  
    $url = 'user.php';                      //定義 $url 變數為 user.php  
}else{  
    $_SESSION['login'] = 'admin';           //其他的值皆給予 session 值為 admin  
    $url = 'admin.php';                     //定義 $url 變數為 admin.php
}  
```
  
```
fixed:
if( $_GET['login'] == 'user' ){             //從網址中GET 'login' 數值 == 'user'時
    $_SESSION['login'] = 'user';            //給予其 session 值為 user
    $url = 'user.php';                      //定義 $url 變數為 user.php
}else if( $_GET['login'] == 'admin' ){      //從網址中GET 'login' 數值 == 'admin'時
    $_SESSION['login'] = 'admin';           //給予其 session 值為 admin
    $url = 'admin.php';                     //定義 $url 變數為 admin.php
}else{
    $url = './';                            //其他值定義 $url 為此檔案目錄首頁檔(Web Server的域設首頁檔為 index.html、index.php或index.*)
}
```
### 差異性
假如今天有個網址如下  
```
http://www.youtube.kttsite.com/login.php?login='user'  
```
nfixed 的會從網址中取得 login 值為 user 並給予 session 值為 user  
fixed 也跟 nfixed 一樣  
但如果將網址改成如下
```
http://www.youtube.kttsite.com/login.php?login='112233'
```
nfixed 的會將 session 值給予 admin 的值，這樣就可以使用管理員權限進入後台  
但 fixed 的會將網頁導向首頁，並不給予任何 session 值，抵檔非正當登入  
# user.php
```
if( $_SESSION['login'] != 'user' ){         //當 session != 'user' 時
    header('Location: ./unsafe.php');       //將網頁導向到 unsafe.php
}
```
