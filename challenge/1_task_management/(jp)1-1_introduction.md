# はじめに
まずは、Laravelの処理の流れを理解するためにTodoアプリを作成しましょう。  
この章では下記を体験します。
1. Migration作成
2. Model(Eloquent)作成
3. Routing作成
4. Request作成
5. Controller作成
6. View作成

# データ構造
今回は最小限のタスク管理を目的とするため、Tableは一つのみ作成します。  
![er図](./images/er.png)

テーブルは、Eloquent Modelの効果を最大限に発揮するため、Active Recordパターンに沿って作成します。  
