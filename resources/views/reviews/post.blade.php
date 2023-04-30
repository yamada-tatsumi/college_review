
        <x-app-layout>
        <x-slot name="header">
                大学のサークル・部活口コミサイト
        </x-slot>
        <style>
            form{
                text-align:center;
            }
            
            .evaluation{
                border:solid 1px black;
                display:inline-block;
                padding:10px;
                border-radius: 5px;
            }
            .submit{
                border:solid 1px black;
                display:inline-block;
                border-radius: 5px;
                padding:5px;
            }
            .return{
                text-align:center;
                border:solid 1px black;
                display:inline-block;
                border-radius: 5px;
                padding:5px;
                margin-left:100px;
                margin-bottom:200px;
            }
    
        </style>
        <form action="/reviews" method="POST">
            @csrf
            
            <br>
            <br>
            <br>
            <div class="college">
                <label for "college.name">大学名</label>
                <input type="text" name="college[name]" id="college_name">
            </div>
            <br>
            <div class="club">
                <label for "club.name">サークル・部活名</label>
                <input type="text" name="club[name]" id ="club_name">
            </div>
            <br>
            <div class = "genre">
             <label for "genre.option">ジャンル</label>
             <select name="genre[id]" id = genre.option>
                      @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                      @endforeach 
             </select>
            </div>
            <br>
            <br>
            <div class="evaluation">
                <div class="review.enjoyment">
                    <p>楽しさ</p>
                    <input type="radio" name="review[enjoyment]" value="1">楽しくない
                    <input type="radio" name="review[enjoyment]" value="2">あまり楽しくない
                    <input type="radio" name="review[enjoyment]" value="3">どちらともいえない
                    <input type="radio" name="review[enjoyment]" value="4">楽しい
                    <input type="radio" name="review[enjoyment]" value="5">かなり楽しい
                </div>
                <br>
                <div class="review.cost">
                    <p>費用の少なさ</p>
                    <input type="radio" name="review[cost]" value="1">多い
                    <input type="radio" name="review[cost]" value="2">少し多い
                    <input type="radio" name="review[cost]"value="3">普通
                    <input type="radio" name="review[cost]" value="4">少ない
                    <input type="radio" name="review[cost]" value="5">ない
                </div>
                <br>
                <div class="review.connection">
                    <p>先輩とのつながり</p>
                    <input type="radio" name="review[connection]" value="1">ない
                    <input type="radio" name="review[connection]" value="2">少ない
                    <input type="radio" name="review[connection]"value="3">普通
                    <input type="radio" name="review[connection]" value="4">少し多い
                    <input type="radio" name="review[connection]" value="5">多い
                </div>
                <br>
                <div class="review.strict">
                    <p>厳しさ</p>
                    <input type="radio" name="review[strict]" value="1">厳しい
                    <input type="radio" name="review[strict]" value="2">少し厳しい
                    <input type="radio" name="review[strict]" value="3">普通
                    <input type="radio" name="review[strict]" value="4">少し緩い
                    <input type="radio" name="review[strict]" value="5">緩い
                </div>
                <br>
                <div class="review.often">
                    <p>活動頻度</p>
                    <input type="radio" name="review[often]" value="1">週6以上
                    <input type="radio" name="review[often]" value="2">週4.5
                    <input type="radio" name="review[often]" value="3">週2.3
                    <input type="radio" name="review[often]" value="4">週1~月1
                    <input type="radio" name="review[often]" value="5">活動していない                    
                </div>
                <br>
                 <div class="review.scale">
                    <p>規模</p>
                    <input type="radio" name="review[scale]" value="1">5人以下
                    <input type="radio" name="review[scale]" value="2">6~10人
                    <input type="radio" name="review[scale]" value="3">11~30人
                    <input type="radio" name="review[scale]" value="4">31~60人
                    <input type="radio" name="review[scale]" value="5">61人以上
                </div>
            </div>
            <br>
            <br>
            <div class="free_comment">
                <p>自由コメント</p>
                <textarea name="review[body]"  rows="10" cols="80" id="review.comment"></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="投稿する">
            </div>
        </form>
        <br>
        <br>
        <div class="return">
            <a href='/reviews/select'>戻る</a>
        </div>
        　
           
        </x-app-layout>
 