# はじめに  
Laravelには、データベースとの対話を楽しくするオブジェクトリレーショナルマッパー(ORM)であるEloquentが含まれています。  
Eloquentを使用する場合、各データベーステーブルには対応する「モデル」があり、そのテーブルとの対話に使用します。  
Eloquentモデルでは、データベーステーブルからレコードを取得するだけでなく、テーブルへのレコード挿入、更新、削除も可能です。  
https://readouble.com/laravel/9.x/ja/eloquent.html

# Modelの作成
先ほど作成した、tasksテーブルのために、Task Modelを作成しましょう。  
Eloquent Modelは、テーブルの１レコード単位を表現しているため単数となるように命名しましょう。  

```
./vendor/bin/sail exec laravel.test php artisan make:model Task
```

./app/Models/を確認して見ましょう。  
正常に作成が成功していれば、Task Modelが作成されています。  

# Modelの編集
今回はテーブルを1つしか作成しないためあまり設定することがありません。  
今回は、`$fillable`を設定しましょう。  
これに設定されたカラム名は変更可能となります。  
言い方を変えると記載の無いカラムは変更ができません。  
もしも作成や更新時に値が設定されないのであれば、まずはこちらを確認しましょう。  

こちらをModelのプロパティとして設定してください。  
今回自身で追加したDB項目のみ変更可能となります。  
```
protected $fillable = [
    'title',
    'description',
    'is_complete',
];
```
完全な構成は、./src/app/Models/Task.php を参照してください。

`$guarded`を設定すれば保護するカラムのみ指定することもできます。  
案件や開発チームのルールによっては、そちらを利用してください。  


# おわりに
モデルの作成はこれにて終了です。  
次は実際に、Modelに値を登録するためにCreate機能を作成しましょう。  