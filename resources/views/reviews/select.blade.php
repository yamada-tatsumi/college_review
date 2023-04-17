
        <x-app-layout>
         <style>
            .header{
                border: solid 1px black;
                background-color:#9DCCE0;
            }
            .select{
                display: flex;
                justify-content: space-around; 
                border: solid 1px white;
                padding: 200px 300px 200px 300px;
                
            }
            .box{
                border: solid 1px #5c87a6;
                vertical-align: middle;
                text-align: center;
                width: 300px;
                height: 200px;
                line-height: 200px;
                background-color: #5c87a6;
                border: 1px solid #5c87a6;
                border-radius: 5px;
                text-decoration: none;
                transition: background-color 1s;
            }    
            .box:hover{    
                color: #5c87a6;
                background-color: #ffffff;
                border: 1px solid #5c87a6;
                border-radius: 5px;
                transition: background-color 1s;
            }
        　</style>    
        <x-slot name='header'>
                大学のサークル・部活口コミサイト
        </x-slot>
       
        <div class='select'>
             <div class='box post'>
                 <a href='/reviews/post'>口コミを投稿する</a>
             </div>
             <div class='box view'>
                <a href='/reviews/setting'>口コミを閲覧する</a>
             </div>
        </div>
        </x-app-layout>
        
        