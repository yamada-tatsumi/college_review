
        <x-app-layout>
            <x-slot name="header">
                大学のサークル・部活口コミサイト
        </x-slot>
        <style>
            .message{
                margin-top:100px;
                font-size:24px;
            }
            
            .return{
                margin-top:150px;
                margin-left:50px;
                border:solid 1px black;
                display:inline-block;
                padding:10px;
                border-radius: 5px;
            }
        </style>
        <div class="message">
            <b>投稿が完了しました</b>
        </div>
        <div class="return">
            <a href='reviews/select'>戻る</a>
        </div>
        </x-app-layout>
    