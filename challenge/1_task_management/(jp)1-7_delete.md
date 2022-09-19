# はじめに  
この章では、Delete処理として、destroyメソッドを作成していきましょう。  
これらは単一リソースの削除を目的として実装します。  

# Routingの実装
Restfull設計に沿って、ルーティングを定義します。  
```
Route::put('tasks/{task}', [\App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
```

# Controllerの実装
## destroy 
ここの記載方法も基本的に、先ほどのupdateやpatchと同等処理になります。  
`delete()`メソッドで削除を行うことができます。  

自身の手で実装してみましょう。  
もし上手く動かない場合、srcの実装例を確認してください。  

# viewの実装
下記が該当箇所になります。  
form部分を修正して、`destroy`処理を実行してみましょう。
``` 
<form>
    @csrf
    @method('DELETE')
    <span class="icon">
        <button type="submit" class="has-text-link is-clickable"
                style="background: none; border: unset">
            <i class="fa-solid fa-trash"></i>
        </button>
    </span>
</form>
```

# 最後の仕上げ
以上で、deleteメソッドの実装は終了です。  
正しく削除処理が動作している事を確認したら最後の仕上げを行います。  

ルーティングを記載する際、今回は個別にルーティングを設定していましたが、Restfull設計に乗っ取っているルーティングはまとめて定義する事が可能です。  
complete, yet_complete以外のルートを削除して代わりに下記を利用できます。  
``` 
Route::resource('tasks', \App\Http\Controllers\TaskController::class);
```

また、Laravel9.xから、Controller単位でルーティングをまとめることが可能です。  
下記により、Controller名を都度記載する必要がなくなります。  
またprefixとasを指定する事で、`path`と`name`の共通部分も短縮することができます。  
``` 
Route::controller(\App\Http\Controllers\TaskController::class)
    ->prefix('tasks/{task}')
    ->as('tasks.')
    ->group(function () {
        Route::patch('complete', 'complete')->name('complete');
        Route::patch('yet_complete', 'yetComplete')->name('yet_complete');
});
```

こちらを変更したら一通りの操作を試して問題なく動作することを確認してください。  

# おわりに
いかがだったでしょうか？  
まだまだ、Laravelを触る上で不安なことはあると思いますが、今回の実装で基本的なCRUD処理の実装は可能になったでしょう!  
わからない部分があれば繰り返し挑戦して理解を深めてください。  

次の課題では、API実装や、モデルの少し複雑なリレーション関係を理解できるようにしたいと思います。  
より理解を深めるため、是非挑戦して見てください。  
