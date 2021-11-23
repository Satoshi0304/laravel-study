<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>{{$user->user_name}}</h2>
  <span>作成日{{$user->created_at}}</span>
  <span>更新日{{$user->updated_at}}</span>
</body>
</html>