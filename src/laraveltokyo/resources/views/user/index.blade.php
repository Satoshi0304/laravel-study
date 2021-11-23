
<table>

    <tr>
        <th>ユーザー名</th>
        <th>メールアドレス</th>
        <th>ステータスナンバー</th>
        <th>作成日時</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>


    </tr>

    @foreach ($users as $user)
    <tr>
        <td>{{$user->user_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->status_num}}</td>
        <td>{{$user->created_at}}</td>
        <td><a href="user/{{$user->id}}">詳細</a></td>
        <td>編集</td>
        <td>削除</td>
    </tr>
    @endforeach


</table>