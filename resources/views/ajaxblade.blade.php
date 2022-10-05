<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- 引入 jquery 文件 --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>ajaxblade</title>
</head>

<body>
    <input id="btn" type="button" value="送出">
</body>
<script>
    // jquery 的頁面載入事件
    $(function() {
        $('#btn').click(function() {
            // 發送 ajax 請求
            $.get('ajax', function(data) {
                console.log(data);
            }, 'json')
        })
    })
</script>

</html>
