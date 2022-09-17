# 環境の構築
LaravelではSailという、Dockerを使用してLaravelプロジェクトを実行する組み込みソリューションを提供しています。  
このプロジェクトでは、簡単にLaravelをスタートするためにSailの利用をお勧めします。

この章では、導入前提としてDockerのインストールを実施してもらいます。    
自身で確認できる環境を持っている方はそちらを利用してください。  

## Mac
インストール手順にしたがってインストールを行ってください  
https://docs.docker.jp/docker-for-mac/install.html

## Windows
Windowsでインストールする際には、2つの選択肢があります。
1. WSL2内にDockerを自身でインストールする方法
2. Hyper-V（またはWSL2）を利用してDocker for Desktopを起動する方法

インストールが簡単なのは、2ですがファイルマウントの性能等でスムーズな開発ができない場合があります。  
またHyper-Vを利用するためには、WindowsをProにアップグレードする必要があります。
可能な限り1の方法をとる事をお勧めします。  

1.のインストールガイド  
https://qiita.com/amenoyoya/items/ca9210593395dbfc8531

2.のインストールガイド  
https://docs.docker.com/desktop/install/windows-install/  

