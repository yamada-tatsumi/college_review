
        <x-app-layout>
            <x-slot name="header">
                大学のサークル・部活口コミサイト
        </x-slot>
        <div class='select'>
           <p>ジャンル</p>
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
    
        </x-app-layout>
    