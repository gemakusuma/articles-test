### Introduction

saya sudah membuat problem solving dari ketentuan yang tertera menggunakan PHP Native dan Mysql

dan disini saya membuat migration dan seedingnya menjadi satu di file migration.php

#### How to Run Program in Local?
1. silahkan buka file databaseConnection.php dan ganti sesuai koneksi local Anda
2. jalankan `php migration.php`
3. jalankan `php seeding.php`
3. jalankan `php articles.php` untuk get all articles dan disini sudah di sort by position dan limit max 5 data
4. lalu untuk endpointnya yang tersedia ada dibawah ini

## POST /api/posts

Request:

- body:

```json
{
  "title": "string (required)",
  "summary": "string (required)",
  "position": "integer (required)",
  "author": "string (required)"
}
```

_Response (200 - OK)_

```json
"success"
```


_Response (4xx/5xx - Error Handling)_

```json
"Title is required."
```

```json
"Summary is required."
```

```json
"Position is required."
```

```json
"Author is required."
```

<b>and another validation<b>



## PUT /api/posts

Request:

- body:

```json
{
  "title": "string (required)",
  "summary": "string (required)",
  "position": "integer (required)",
  "author": "string (required)",
  "article_id": "integer (required)"
}
```

_Response (200 - OK)_

```json
"success"
```


_Response (4xx/5xx - Error Handling)_

```json
"Title is required."
```

```json
"Summary is required."
```

```json
"Position is required."
```

```json
"Author is required."
```

```json
"Article Id is required."
```

<b>and another validation<b>


### any question/feedback? please contact me
- [Whatsapp](https://wa.me/0811182210)
- [Linkedin](https://www.linkedin.com/in/gema-akbar-kusuma/)