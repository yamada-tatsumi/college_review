
        <x-app-layout>
        <x-slot name="header">
                大学のサークル・部活口コミサイト
        </x-slot>
        <style>
            form{
                text-align:center;
            }
            .genre{
                border:solid 1px black;
                display:inline-block;
                padding:10px;
                border-radius: 5px;
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
                <label for "college_name">大学名</label>
                <input type="text" name="college_name" id="college_name" formaction="/colleges">
            </div>
            <br>
            <div class="club">
                <label for "club_name">サークル・部活名</label>
                <input type="text" name="club_name" id ="club_name" formaction="/clubs">
            </div>
            <br>
            <p>ジャンル<p>
            <div class="genre">
            　<input type="radio" name="genre" value="運動系サークル">運動系サークル
            　<input type="radio" name="genre" value="文化系サークル">文化系サークル
            　<input type="radio" name="genre" value="運動部">運動部
            　<input type="radio" name="genre" value="文化部">文化部
            　<input type="radio" name="genre" value="その他">その他
            </div>
            <br>
            <br>
            <div class="evaluation">
                <div class="enjoyment">
                    <p>楽しさ</p>
                    <input type="radio" name="enjoyment" value="楽しくない">楽しくない
                    <input type="radio" name="enjoyment" value="あまり楽しくない">あまり楽しくない
                    <input type="radio" name="enjoyment" value="どちらともいえない">どちらともいえない
                    <input type="radio" name="enjoyment" value="楽しい">楽しい
                    <input type="radio" name="enjoyment" value="かなり楽しい">かなり楽しい
                </div>
                <br>
                <div class="cost">
                    <p>費用の少なさ</p>
                    <input type="radio" name="cost" value="多い">多い
                    <input type="radio" name="cost" value="少し多い">少し多い
                    <input type="radio" name="cost"value="普通">普通
                    <input type="radio" name="cost" value="少ない">少ない
                    <input type="radio" name="cost" value="ない">ない
                </div>
                <br>
                <div class="connection">
                    <p>先輩とのつながり</p>
                    <input id="connection1" type="radio" name="cost" value="ない"><label for="connection1">ない</label>
                    <input id="connection2" type="radio" name="cost" value="少ない"><label for="connection2">少ない</label>
                    <input id="connection3" type="radio" name="cost" value="普通"><label for="connection3">普通</label>
                    <input id="connection4" type="radio" name="cost" value="少し多い"><label for="connection4">少し多い</label>
                    <input id="connection5" type="radio" name="cost" value="多い"><label for="connection5">多い</label>
                </div>
                <br>
                 <div class="strict">
                    <p>厳しさ</p>
                    <input id="strict1" type="radio" name="strict" value="厳しい"><label for="strict1">厳しい</label>
                    <input id="strict2" type="radio" name="strict" value="少し厳しい"><label for="strict2">少し厳しい</label>
                    <input id="strict3" type="radio" name="strict" value="普通"><label for="strict3">普通</label>
                    <input id="strict4" type="radio" name="strict" value="少し緩い"><label for="strict4">少し緩い</label></label>
                    <input id="strict5" type="radio" name="strict" value="緩い"><label for="strict5">緩い</label>
                </div>
                <br>
                <div class="often">
                    <p>活動頻度</p>
                    <input id="often1" type="radio" name="often" value="週6.7"><label for="often1">週6.7</label>
                    <input id="often2" type="radio" name="often" value="週4.5"><label for="often2">週4.5</label>
                    <input id="often3" type="radio" name="often" value="週2.3"><label for="often3">週2.3</label>
                    <input id="often4" type="radio" name="often" value="週1~月1"><label for="often4">週1~月1</label>
                    <input id="often5" type="radio" name="often" value="活動していない"><label for="often5">活動していない</label>
                </div>
                <br>
                 <div class="scale">
                    <p>規模</p>
                    <input id="scale1" type="radio" name="scale" value="5人以下"><label for="scale1">5人以下</label>
                    <input id="scale2" type="radio" name="scale" value="6~10人"><label for="scale2">6~10人</label>
                    <input id="scale3" type="radio" name="scale" value="11~30人"><label for="scale3">11~30人</label>
                    <input id="scale4" type="radio" name="scale" value="31~60人"><label for="scale4">31~60人</label>
                    <input id="scale5" type="radio" name="scale" value="61人以上"><label for="scale5">61人以上</label>
                </div>
            </div>
            <br>
            <br>
            <div class="free_comment">
                <p>自由コメント</p>
                <textarea name="message"  rows="10" cols="80" id="message"></textarea>
            </div>
            <div class="submit">
                <input type="submit" onclick='/reviews/post_complete' value="投稿する">
            </div>
        </form>
        <br>
        <br>
        <div class="return">
            <a href='/reviews/select'>戻る</a>
        </div>
        　
           
        </x-app-layout>
 