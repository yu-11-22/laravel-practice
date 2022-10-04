<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文件上傳</title>
</head>

<body>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        <p>姓名：<input type="text" name="name" value="" placeholder="請輸入姓名 "></p>
        <p>年齡：<input type="text" name="age" value="" placeholder="請輸入年齡"></p>
        <p>信箱：<input type="email" name="email" value="" placeholder="請輸入信箱"></p>
        <p>頭貼：<input type="file" name="avatar"></p>
        @csrf
        <input type="submit" value="送出">
    </form>
</body>

</html>
