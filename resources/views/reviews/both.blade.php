
        <x-app-layout>
            <x-slot name="header">
                大学のサークル・部活口コミサイト
        </x-slot>
        <style>                
    
            table, th, td{
                border:solid 1px black;
                text-align:center;
                margin:auto;
                table-layout: fixed;
            }
            h2{
                margin-bottom:10px;
            }
            .review{
                border:solid 1px black;
                border-radius: 5px;
                padding:20px;
                width:500px;
                margin-left:250px;
                margin-top:50px;
                text-align:center;
            }
            .title{
                margin-left:900px;
                border:solid 1px black;
                width:100px;
                padding:5px;
                margin-top:50px;
                text-align:center;
                background-color:#dcdcdc;
            }
            th{
                background-color:#add8e6;
            }
            td{
                background-color:#dcdcdc;
            }
            .paginate{
                text-align:center;
            }
            .return{
                width: 20%;
                font-size: 15px;
            	display: inline-block;
            	border: solid 2px black; 
                border-radius: 5px;
                width:100px;
                text-align:center;
            	margin-bottom:150px;
            	margin-left:300px;
            }
            
            
            
        </style>
        <div class ="body">
         <h1 class ="title">投稿一覧</h1>
         <div class="image">
            <img src="{{ asset('img/evaluation.example.png')}}">
         </div>
         <div class='reviews'>
            @if($reviews->count() > 0)
            @foreach ($reviews as $review)
            <div class="review">
                <h2 class="college">大学名：{{ $review->club->college->name }}</h2>
                <h2 class="genre">ジャンル：{{ $review->club->genre->name }}</h2>
                <h2 class="club">
                    <a href="/reviews/{{ $review->id }}">サークル・部活名：{{ $review->club->name }}</a>
                </h2>
                
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
                     <td>{{ $review->enjoyment }}</td>
                     <td>{{ $review->cost }}</td>
                     <td>{{ $review->connection }}</td>
                     <td>{{ $review->strict }}</td>
                     <td>{{ $review->often }}</td>
                     <td>{{ $review->scale }}</td>
                     </tr>
                    </div>
                </table>
                </div>
            </div>
            @endforeach
            @else
            <p>データがありません。</p>
             @endif
             <div>
                 {{ $reviews->links() }}
             </div>
            <div class="return">
                 <a href="/reviews/setting">戻る</a>
            </div>
         </div>
         </div>
        </x-app-layout>
    