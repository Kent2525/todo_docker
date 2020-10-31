# docker-laravel 🐳


## Introduction

このアプリは海外在住者向けの一時帰国した際の予定を立てるTodoです。

これは私が実際に海外在住時に毎回帰国の予定を立てて記録するのが大変だったのでこのような便利なアプリがあればいいという想いで作りました。

TOP画面からは同じような一時帰国者がよく行う予定をデフォルトタグとしてクリックしたら即座に自分のリストに組み込む事ができます。

もちろん自分のオリジナルの予定も入力して入れる事ができます。

但し登録をしていないユーザはmypageでリストを管理する事はできません。

mypageではユーザーの登録したTodoが表示されます。

内容はシンプルで操作が容易なCRUD機能が備わっております。

それぞれのタイトルの中に見出しがあり、見出しの中にさらにメモを保存できる機能があります。

レスポンシブに関しても、CSSをモバイルファーストの記述構造になっておりPC、タブレット、モバイル画面それぞれで自然に表示できるようにこだわりました。

開発環境はDocker, AWS, CircleCIを使用しておりできるだけ開発現場で使われている技術を積極的に使って、

## Usage

Auth認証機能、基本CRUD機能、モーダル、onckickイベント、レスポンシブ対応

http://127.0.0.1

Read this [Makefile](https://github.com/ucan-lab/docker-laravel/blob/master/Makefile).

## 使用している技術

HTML&CSS, PHP, Javescript, jQuery, MySQL, bootstrap, AWSデプロイ, Docker, CircleCI,

## Container structure

```bash
├── app
├── web
└── db
```

### app container

- Base image
  - [php](https://hub.docker.com/_/php):7.4-fpm-buster
  - [composer](https://hub.docker.com/_/composer):2.0

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.18-alpine
  - [node](https://hub.docker.com/_/node):14.2-alpine

### db container

- Base image
  - [mysql](https://hub.docker.com/_/mysql):8.0

#### Persistent MySQL Storage

By default, the [named volume](https://docs.docker.com/compose/compose-file/#volumes) is mounted, so MySQL data remains even if the container is destroyed.
If you want to delete MySQL data intentionally, execute the following command.

```bash
$ docker-compose down -v && docker-compose up
```
