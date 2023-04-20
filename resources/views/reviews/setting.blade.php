
        <x-app-layout>
            <x-slot name="header">
                大学のサークル・部活口コミサイト
        </x-slot>
        <style>
            input[type="search"] {
              width: 200px; 
              padding: 10px; 
              font-size: 16px; 
              border: solid 2px #cccccc; 
              border-radius: 5px;
              text-align:center;
            }
            
            input[type="submit"] {
            	width: 20%;
                font-size: 15px;
                color: #fff;
            	display: inline-block;
                padding: 15px 0px;
                text-align: center;
            	background-color: #5c87a6;
                border: 1px solid #5c87a6;
                border-radius: 5px;
                text-decoration: none;
                cursor: pointer;
                transition: background-color 1s;
                text-align:center;
            }
            
            input[type="submit"]:hover {
                color: #5c87a6;
                background-color: #ffffff;
                border: 1px solid #5c87a6;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 1s;
              
            }
            
            .all{
                text-align:center;
                margin-top:50px;
            }
            
            .return{
                width: 20%;
                font-size: 15px;
            	display: inline-block;
            	border: solid 2px black; 
                border-radius: 5px;
                width:100px;
            	
            }
            
            .genre{
                margin-top:30px;
            }
        
        
            
        </style>
        <div class="all">
        <form action="/reviews/both" method="GET">
            @csrf
                <div class="college">
                    <label for "college_name">大学名</label>
                    <input type="search" name="collegeSearch" id="collge_name" placeholder="大学名を入力"> 
                </div>
                <div class="genre">
                    <label for "genre_select">ジャンル</label>
                    <select name="genreSelect" id ="genre_select">
                        <option value="" selected>指定しない</option>
                        <option value="運動系サークル">運動系サークル</option>
                        <option value="文化系サークル">文化系サークル</option>
                        <option value="運動部">運動部</option>
                        <option value="文化部">文化部</option>
                        <option value="その他">その他</option>
                        
                    </select>
                </div>
                <br>
                <div class="search">
                <input type="submit" value="検索する">
                </div>
        </form>
        <br>
        <div class="return">
            <a href="/reviews/select">戻る</a>
        </div>
        </div>     
        </x-app-layout>
   