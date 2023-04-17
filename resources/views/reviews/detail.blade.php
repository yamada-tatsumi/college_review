
        <x-app-layout>
            <x-slot name="header">
                大学のサークル・部活口コミサイト
        </x-slot>
        <div class='body'>
            <div class="title">投稿詳細</div>
            <div class="review">
                <h2 class="user">ユーザーID：{{ $reviews->user->id}}</h2>
                <h2 class="college">大学名：{{ $reviews->club->college->name }}</h2>
                <h2 class="genre">ジャンル：{{ $reviews->club->genre->name }}</h2>
                <h2 class="club">サークル・部活名：{{ $reviews->club->name }}</h2>
                <h2 class="review_body">自由投稿欄<br>{{ $reviews->body }}</h2>
                
                <div class="table">
                <table id="evaluation" border="2" layout="fixed">
                    <div class="th">
                     <tr>
                     <th>楽しさ</th>
                     <th>費用</th>
                     <th>先輩とのつながり</th>
                     <th>厳しさ</th>
                     <th>活動頻度</th>
                     <th>規模</th>
                     </tr>
                    </div>
            
                    <div class="td">
                     <tr>
                     <td>{{ $reviews->enjoyment }}</td>
                     <td>{{ $reviews->cost }}</td>
                     <td>{{ $reviews->connection }}</td>
                     <td>{{ $reviews->strict }}</td>
                     <td>{{ $reviews->often }}</td>
                     <td>{{ $reviews->scale }}</td>
                     </tr>
                    </div>
                </table>
                </div>
               
                <div class="submit">
                <input type="submit" value="コメントする">
                <div class="return">
                 <a href="/reviews/both">戻る</a>
                </div>
                @foreach($comments as $comment)
                <div class="comment_view">
                    {{$comment->content}}
                </div>
                @endforeach
                
            <form action="/reviews/{{$reviews->id}}/comment" method="POST">
                @csrf
               
                
                <div class="comment">
                    <textarea name="comment[content]"  rows="10" cols="80" id="comment.content"></textarea>
                </div>
                <div class="submit">
                <input type="submit" value="コメントする">
                </div>
            </form>    
            
            
           
        </div>
        </x-app-layout>
    