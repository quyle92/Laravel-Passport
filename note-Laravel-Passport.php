<?php
1/ đoạn code Vue gắn ở home.blade.php  "<passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens>"
Fix:  run "npm run dev"

2/ if Vue script for login section does not show up, run "npm install" and "npm run watch", error after running "npm run watch", then run "npm runn dev". Nếu "npm runn dev" chạy ok rồi mà Vue compenents vẫn ko show up, xóa cache hoặc open private mode on browser.

3/ Requesting Tokens flow explanation:
- phải indicate "'redirect_uri' " tại Route::get('/redirect'...) nếu ko thì sau khi user bấm "Authorize" button, làm sao app của mình biết mà redirect về trang /callback của API consuming app (3rd party app)?
- khi send param lên server mình tới link: http://laravel.passport/oauth/authorize?... 3rd party app phải chỉ định "state" vì để khi mình xử lí xong rồi, đưa notification qua hỏi user "client (3rd party app) is requesting permission to access your account. Authozise or Cancel?" và khi bấm Authorise thì info sẽ đc transfer qua 3rd party app, khi đó 3rd party app sẽ đối chiếu xem "state" mà nó generate lúc đầu khớp với state mà nó hiện đang nhận đc ko, nếu khớp thì chuyển qua bước tiếp theo.

- authorization code is only generated when user click "Authorize" button, it is sth like "ok! I give authorization to that 3rd party app to access my personal info at gmail". authorization code sau đó sẽ đc đem qua chỗ 3rd party app rồi 3rd party app sẽ đem nó send nó về server mình dưới dạng POST cùng với client_id và client_secret để chứng minh "thằng user đã authorise cho tao rồi, đưa tao access token đi!". Rồi server mình sẽ xử lý và issue access token cho nó (3rd party app).

