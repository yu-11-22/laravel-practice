<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #pull_right {
            text-align: center;
        }

        .pull-right {
            /*float: left!important;*/
        }

        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }

        .pagination li {
            display: inline;
        }

        .pagination li a,
        .pagination li span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .pagination li:first-child a,
        .pagination li:first-child span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination li:last-child a,
        .pagination li:last-child span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .pagination li a:hover,
        .pagination li span:hover,
        .pagination li a:focus,
        .pagination li span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }

        .pagination .active a,
        .pagination .active span,
        .pagination .active a:hover,
        .pagination .active span:hover,
        .pagination .active a:focus,
        .pagination .active span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }

        .pagination .disabled span,
        .pagination .disabled span:hover,
        .pagination .disabled span:focus,
        .pagination .disabled a,
        .pagination .disabled a:hover,
        .pagination .disabled a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }

        .clear {
            clear: both;
        }
    </style>
    <title>數據分頁</title>
</head>

<body>
    <table style="border: 1px solid #f55">
        <thead>
            <tr>
                <th>id</th>
                <th>名字</th>
                <th>年齡</th>
                <th>信箱</th>
                <th>頭貼</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->age }}</td>
                    <td>{{ $value->email }}</td>
                    <td><img style="width: 100px; height: 80px;" src="{{ ltrim($value->avatar, '.') }}" alt=""></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</body>

</html>
