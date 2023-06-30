---
title: API Reference

language_tabs:
    - bash
    - javascript
    - php

includes:

search: true

toc_footers:
    - <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---

<!-- START_INFO -->

# Info

Welcome to the generated API reference.
[Get Postman Collection](http://my-first-laravel-app.lndo.site/docs/collection.json)

<!-- END_INFO -->

#Authentication\Login

<!-- START_c435963e390587f9a7a22c57baac4bad -->

## Login // reconfirm

Reconfim login

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/confirm-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/confirm-password");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/confirm-password", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET confirm-password`

<!-- END_c435963e390587f9a7a22c57baac4bad -->

<!-- START_c76fea3abe10c7023b22659c01fd2505 -->

## Login // reconfirm

Reconfim login

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/confirm-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/confirm-password");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/confirm-password", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST confirm-password`

<!-- END_c76fea3abe10c7023b22659c01fd2505 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->

## Login // standard

Login via username &amp; password

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/login");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/login", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET login`

<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->

## Login // standard

Login via username &amp; password

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/login");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/login", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST login`

<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

#Authentication\Logout

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->

## Logout // current device

Destroy an authenticated session for the current device

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/logout");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/logout", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST logout`

<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

#Authentication\Recovery

<!-- START_60efc9f5157c5ed604f4a3f83ee14d6b -->

## Recovery // standard

Recovery account by email

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/forgot-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/forgot-password");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/forgot-password", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET forgot-password`

<!-- END_60efc9f5157c5ed604f4a3f83ee14d6b -->

<!-- START_d5020378cd80c7734cbcbc4581b4305d -->

## Recovery // standard

Recovery account by email

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/forgot-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/forgot-password");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/forgot-password", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST forgot-password`

<!-- END_d5020378cd80c7734cbcbc4581b4305d -->

<!-- START_856bd8380492b7fc22b1eb521848e3e1 -->

## Recovery // reset

Recovery account by email

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/reset-password/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/reset-password/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/reset-password/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET reset-password/{token}`

<!-- END_856bd8380492b7fc22b1eb521848e3e1 -->

<!-- START_67aa407477fb6372fe1de3f61b0780e2 -->

## Recovery // reset

Recovery account by email

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/reset-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/reset-password");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/reset-password", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST reset-password`

<!-- END_67aa407477fb6372fe1de3f61b0780e2 -->

#Authentication\Registration

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

## Registration

Register a user account

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/register");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/register", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET register`

<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->

## Registration

Register a user account

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/register");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/register", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST register`

<!-- END_d7aad7b5ac127700500280d511a3db01 -->

#User authentication

<!-- START_2778b23c2784805a3c7601ea763a361d -->

## Verify

Prompt user to verify email

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/verify-email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"book":{"name":"voluptas","author_id":19}}'

```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/verify-email");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

let body = {
    book: {
        name: "voluptas",
        author_id: 19,
    },
};

fetch(url, {
    method: "GET",
    headers: headers,
    body: body,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/verify-email", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
    "json" => [
        "book" => [
            "name" => "voluptas",
            "author_id" => 19,
        ],
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (200):

```json
{
    "id": 4,
    "name": "Jessica Jones",
    "roles": ["admin"]
}
```

> Example response (404):

```json
null
```

### HTTP Request

`GET verify-email`

#### Body Parameters

| Parameter        | Type    | Status   | Description    |
| ---------------- | ------- | -------- | -------------- |
| `book.name`      | string  | optional |
| `book.author_id` | integer | required | Blah blah blah |

<!-- END_2778b23c2784805a3c7601ea763a361d -->

<!-- START_bc73062d8c76972f199f53a4bdde2a7b -->

## Verify

Prompt user to verify email

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/verify-email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"book":{"name":"cupiditate","author_id":9}}'

```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/verify-email");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

let body = {
    book: {
        name: "cupiditate",
        author_id: 9,
    },
};

fetch(url, {
    method: "POST",
    headers: headers,
    body: body,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/verify-email", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
    "json" => [
        "book" => [
            "name" => "cupiditate",
            "author_id" => 9,
        ],
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (200):

```json
{
    "id": 4,
    "name": "Jessica Jones",
    "roles": ["admin"]
}
```

> Example response (404):

```json
null
```

### HTTP Request

`POST verify-email`

#### Body Parameters

| Parameter        | Type    | Status   | Description    |
| ---------------- | ------- | -------- | -------------- |
| `book.name`      | string  | optional |
| `book.author_id` | integer | required | Blah blah blah |

<!-- END_bc73062d8c76972f199f53a4bdde2a7b -->

<!-- START_12066b69dfb2d5632aaf58f37392653c -->

## Verify

Prompt user to verify email

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/verify-email/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"book":{"name":"delectus","author_id":10}}'

```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/verify-email/1/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

let body = {
    book: {
        name: "delectus",
        author_id: 10,
    },
};

fetch(url, {
    method: "GET",
    headers: headers,
    body: body,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/verify-email/1/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
    "json" => [
        "book" => [
            "name" => "delectus",
            "author_id" => 10,
        ],
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (200):

```json
{
    "id": 4,
    "name": "Jessica Jones",
    "roles": ["admin"]
}
```

> Example response (404):

```json
null
```

### HTTP Request

`GET verify-email/{id}/{hash}`

#### Body Parameters

| Parameter        | Type    | Status   | Description    |
| ---------------- | ------- | -------- | -------------- |
| `book.name`      | string  | optional |
| `book.author_id` | integer | required | Blah blah blah |

<!-- END_12066b69dfb2d5632aaf58f37392653c -->

#general

<!-- START_4b6c59c47310c4e56b37ffaea8757ce0 -->

## signed-storage-url

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/signed-storage-url" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/signed-storage-url");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/signed-storage-url", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET signed-storage-url`

<!-- END_4b6c59c47310c4e56b37ffaea8757ce0 -->

<!-- START_c483cf986376ac53e8e320fba428aa85 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/1/suspend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1/suspend");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/1/suspend", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/{tenant}/suspend`

`POST tenants/{tenant}/suspend`

`DELETE tenants/{tenant}/suspend`

<!-- END_c483cf986376ac53e8e320fba428aa85 -->

<!-- START_c0b7b0f39b025c04de56dae30fce1a51 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/1/maintenance" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1/maintenance");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/1/maintenance", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/{tenant}/maintenance`

`POST tenants/{tenant}/maintenance`

`DELETE tenants/{tenant}/maintenance`

<!-- END_c0b7b0f39b025c04de56dae30fce1a51 -->

<!-- START_c69cff72e994c784e75639478e23e915 -->

## Database access

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/1/database_access" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1/database_access");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/1/database_access", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/{tenant}/database_access`

<!-- END_c69cff72e994c784e75639478e23e915 -->

<!-- START_f33b93013e537e7e9df39bf0816c23d4 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/1/destroy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1/destroy");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/1/destroy", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/{tenant}/destroy`

`DELETE tenants/{tenant}/destroy`

<!-- END_f33b93013e537e7e9df39bf0816c23d4 -->

<!-- START_52e301af6c95550a97f91978b433a605 -->

## Restore the specified resource from storage.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1/restore");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/1/restore", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/{tenant}/restore`

`RESTORE tenants/{tenant}/restore`

<!-- END_52e301af6c95550a97f91978b433a605 -->

<!-- START_73afcfff1d0ce70ea0bb10d596d80946 -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants`

<!-- END_73afcfff1d0ce70ea0bb10d596d80946 -->

<!-- START_5fe38e58093a2f56dff28aebf11f6981 -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/create`

<!-- END_5fe38e58093a2f56dff28aebf11f6981 -->

<!-- START_2c23783119bec37d09e9d990f64e4c33 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/tenants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/tenants", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST tenants`

<!-- END_2c23783119bec37d09e9d990f64e4c33 -->

<!-- START_b5613d384eda1eeb0503b5e979b78bb3 -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/{tenant}`

<!-- END_b5613d384eda1eeb0503b5e979b78bb3 -->

<!-- START_b25cfc83bf8eaed3ccbcd418bcd8fa7b -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/tenants/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/tenants/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET tenants/{tenant}/edit`

<!-- END_b25cfc83bf8eaed3ccbcd418bcd8fa7b -->

<!-- START_92cf271ce13b955e578b25d8cda4eed4 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/tenants/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT tenants/{tenant}`

`PATCH tenants/{tenant}`

<!-- END_92cf271ce13b955e578b25d8cda4eed4 -->

<!-- START_7852eac0cbc95c4848c41bfeda453f12 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/tenants/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/tenants/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE tenants/{tenant}`

<!-- END_7852eac0cbc95c4848c41bfeda453f12 -->

<!-- START_03fee2c84e86ce4bc91ffff2a5b1488b -->

## Create a new signed URL.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/vapor/signed-storage-url" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/vapor/signed-storage-url");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/vapor/signed-storage-url", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST vapor/signed-storage-url`

<!-- END_03fee2c84e86ce4bc91ffff2a5b1488b -->

<!-- START_11af843ce622fe876a7e2a780ab58797 -->

## livewire/message/{name}

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/livewire/message/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/livewire/message/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/livewire/message/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST livewire/message/{name}`

<!-- END_11af843ce622fe876a7e2a780ab58797 -->

<!-- START_0c0d72339270a088ad33d6d2dfb0c525 -->

## livewire/upload-file

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/livewire/upload-file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/livewire/upload-file");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/livewire/upload-file", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST livewire/upload-file`

<!-- END_0c0d72339270a088ad33d6d2dfb0c525 -->

<!-- START_ccc6592d7fe84c3220047c56f21a3869 -->

## livewire/preview-file/{filename}

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/livewire/preview-file/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/livewire/preview-file/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/livewire/preview-file/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET livewire/preview-file/{filename}`

<!-- END_ccc6592d7fe84c3220047c56f21a3869 -->

<!-- START_b4eec1e6a6b013b2ad4c1eac731e26ef -->

## livewire/livewire.js

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/livewire/livewire.js" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/livewire/livewire.js");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/livewire/livewire.js", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET livewire/livewire.js`

<!-- END_b4eec1e6a6b013b2ad4c1eac731e26ef -->

<!-- START_3019b12652067fe81a20774174205153 -->

## livewire/livewire.js.map

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/livewire/livewire.js.map" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/livewire/livewire.js.map");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/livewire/livewire.js.map", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET livewire/livewire.js.map`

<!-- END_3019b12652067fe81a20774174205153 -->

<!-- START_50bc1ec7ad747cb5a92b20f1e3a28abf -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies`

<!-- END_50bc1ec7ad747cb5a92b20f1e3a28abf -->

<!-- START_a71d71bcd2f3568fd0442cbaf967a379 -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies/create`

<!-- END_a71d71bcd2f3568fd0442cbaf967a379 -->

<!-- START_760b4e92595b16c77251ce042b991792 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/companies", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST companies`

<!-- END_760b4e92595b16c77251ce042b991792 -->

<!-- START_599169efd42a06d8d88b2dd502095efd -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies/{company}`

<!-- END_599169efd42a06d8d88b2dd502095efd -->

<!-- START_b872ed75fde6ab1f31c4922fc4b3a2fe -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies/{company}/edit`

<!-- END_b872ed75fde6ab1f31c4922fc4b3a2fe -->

<!-- START_a7a39a4c50b302abf64bc9a5facc2445 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/companies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/companies/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT companies/{company}`

`PATCH companies/{company}`

<!-- END_a7a39a4c50b302abf64bc9a5facc2445 -->

<!-- START_7e19f6460759d15e9ce50dadab429d94 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/companies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/companies/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE companies/{company}`

<!-- END_7e19f6460759d15e9ce50dadab429d94 -->

<!-- START_aefdc6885c34a2c0783a19f3e41afd18 -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies/1/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1/projects");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies/1/projects", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies/{company}/projects`

<!-- END_aefdc6885c34a2c0783a19f3e41afd18 -->

<!-- START_6ff2c42cce51de80b572dae59b8f6213 -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies/1/projects/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1/projects/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies/1/projects/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies/{company}/projects/create`

<!-- END_6ff2c42cce51de80b572dae59b8f6213 -->

<!-- START_5571ec17584b0e3d01642928063913cb -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies/1/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1/projects/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies/1/projects/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies/{company}/projects/{project}`

<!-- END_5571ec17584b0e3d01642928063913cb -->

<!-- START_090e14aec77daa4996feaae9d73ff742 -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/companies/1/projects/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/companies/1/projects/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/companies/1/projects/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET companies/{company}/projects/{project}/edit`

<!-- END_090e14aec77daa4996feaae9d73ff742 -->

<!-- START_3b175ebfb4fc164502f7ce21d35d70c0 -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/jobs");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/jobs", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET jobs`

<!-- END_3b175ebfb4fc164502f7ce21d35d70c0 -->

<!-- START_87b362413a6d8b6a3c552324e9e4edcb -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/jobs/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/jobs/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/jobs/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET jobs/create`

<!-- END_87b362413a6d8b6a3c552324e9e4edcb -->

<!-- START_02b6e7d7eec275039b3abf4aa068f039 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/jobs");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/jobs", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST jobs`

<!-- END_02b6e7d7eec275039b3abf4aa068f039 -->

<!-- START_29b9d43929af7503139957237485c77d -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/jobs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/jobs/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/jobs/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET jobs/{job}`

<!-- END_29b9d43929af7503139957237485c77d -->

<!-- START_50c38a9fa0d29caedb3426abd1f77ab6 -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/jobs/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/jobs/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/jobs/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET jobs/{job}/edit`

<!-- END_50c38a9fa0d29caedb3426abd1f77ab6 -->

<!-- START_da33dbf4eade676a0a827bcaf1b1cb17 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/jobs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/jobs/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/jobs/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT jobs/{job}`

`PATCH jobs/{job}`

<!-- END_da33dbf4eade676a0a827bcaf1b1cb17 -->

<!-- START_659417913ac141dbcf59cd04426a45b0 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/jobs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/jobs/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/jobs/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE jobs/{job}`

<!-- END_659417913ac141dbcf59cd04426a45b0 -->

<!-- START_ba05cb3a11667fbd2926fcfc72905d8a -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/projects");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/projects", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET projects`

<!-- END_ba05cb3a11667fbd2926fcfc72905d8a -->

<!-- START_8f546be87408a19565ba4bfccdb9bc46 -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/projects/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/projects/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/projects/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET projects/create`

<!-- END_8f546be87408a19565ba4bfccdb9bc46 -->

<!-- START_6457c064807333898638aaa8f41ba1ab -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/projects");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/projects", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST projects`

<!-- END_6457c064807333898638aaa8f41ba1ab -->

<!-- START_559ca32d29b9eee92470ea6238f2e491 -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/projects/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/projects/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET projects/{project}`

<!-- END_559ca32d29b9eee92470ea6238f2e491 -->

<!-- START_c67226e65a6121c577cf821d15168dc8 -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/projects/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/projects/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/projects/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET projects/{project}/edit`

<!-- END_c67226e65a6121c577cf821d15168dc8 -->

<!-- START_d0e574164f37de9866bf98e489a3b5d0 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/projects/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/projects/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT projects/{project}`

`PATCH projects/{project}`

<!-- END_d0e574164f37de9866bf98e489a3b5d0 -->

<!-- START_7cb1e494fdd6b6708f75dbf4b815c552 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/projects/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/projects/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE projects/{project}`

<!-- END_7cb1e494fdd6b6708f75dbf4b815c552 -->

<!-- START_d3b246817d61e14e2a39ce5561f83577 -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/claims" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/claims");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/claims", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET claims`

<!-- END_d3b246817d61e14e2a39ce5561f83577 -->

<!-- START_4c5c1edcf21762e9c285b7ee43a3b55e -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/claims/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/claims/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/claims/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET claims/create`

<!-- END_4c5c1edcf21762e9c285b7ee43a3b55e -->

<!-- START_c3f16f872364f028f4960aceb35984e1 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/claims" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/claims");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/claims", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST claims`

<!-- END_c3f16f872364f028f4960aceb35984e1 -->

<!-- START_020ab03083fb208b02e612077625eb73 -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/claims/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/claims/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/claims/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET claims/{claim}`

<!-- END_020ab03083fb208b02e612077625eb73 -->

<!-- START_75b922d99104f8ae2e200b873b99b9a1 -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/claims/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/claims/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/claims/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET claims/{claim}/edit`

<!-- END_75b922d99104f8ae2e200b873b99b9a1 -->

<!-- START_e97dd2869efa21b3424db15be2715a54 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/claims/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/claims/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/claims/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT claims/{claim}`

`PATCH claims/{claim}`

<!-- END_e97dd2869efa21b3424db15be2715a54 -->

<!-- START_c4473f89ca280ed05d0edb6b97b3eca8 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/claims/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/claims/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/claims/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE claims/{claim}`

<!-- END_c4473f89ca280ed05d0edb6b97b3eca8 -->

<!-- START_4b5a0a74b176c4be543b343e011294df -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/records" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/records");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/records", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET records`

<!-- END_4b5a0a74b176c4be543b343e011294df -->

<!-- START_33d7029cab96272b6b9d7f24df1b018a -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/records/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/records/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/records/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET records/create`

<!-- END_33d7029cab96272b6b9d7f24df1b018a -->

<!-- START_9da6105bc431eb271b5832d7d9172693 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/records" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/records");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/records", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST records`

<!-- END_9da6105bc431eb271b5832d7d9172693 -->

<!-- START_81fe03a08e59a5d3eadd3d3bbbb0e2bb -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/records/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/records/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/records/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET records/{record}`

<!-- END_81fe03a08e59a5d3eadd3d3bbbb0e2bb -->

<!-- START_2158c521f50fc781b44a8769919d2dba -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/records/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/records/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/records/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET records/{record}/edit`

<!-- END_2158c521f50fc781b44a8769919d2dba -->

<!-- START_812c6a8310823e432c2935732bd271de -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/records/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/records/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/records/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT records/{record}`

`PATCH records/{record}`

<!-- END_812c6a8310823e432c2935732bd271de -->

<!-- START_81ce445c5266b2d74c3d2b52f84f5725 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/records/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/records/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/records/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE records/{record}`

<!-- END_81ce445c5266b2d74c3d2b52f84f5725 -->

<!-- START_0be341c4e613f05df862511a128dad5d -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/assets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/assets");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/assets", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET assets`

<!-- END_0be341c4e613f05df862511a128dad5d -->

<!-- START_07a779d9efc6bc314ec38e6835c8b0b8 -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/assets/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/assets/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/assets/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET assets/create`

<!-- END_07a779d9efc6bc314ec38e6835c8b0b8 -->

<!-- START_4c3391122b546ac176380aea7a02559d -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/assets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/assets");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/assets", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST assets`

<!-- END_4c3391122b546ac176380aea7a02559d -->

<!-- START_958a87658e982d1883acbbd921d15c22 -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/assets/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/assets/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/assets/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET assets/{asset}`

<!-- END_958a87658e982d1883acbbd921d15c22 -->

<!-- START_f4186a1c0dbf2342de175541b40ce84b -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/assets/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/assets/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/assets/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET assets/{asset}/edit`

<!-- END_f4186a1c0dbf2342de175541b40ce84b -->

<!-- START_fa59309adac50182d242e1c98c5bd305 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/assets/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/assets/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/assets/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT assets/{asset}`

`PATCH assets/{asset}`

<!-- END_fa59309adac50182d242e1c98c5bd305 -->

<!-- START_be602666731144bb15d0621b2ff2247a -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/assets/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/assets/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/assets/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE assets/{asset}`

<!-- END_be602666731144bb15d0621b2ff2247a -->

<!-- START_894dc227a1aa6e82ed701d71376e6119 -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/groups");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/groups", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET groups`

<!-- END_894dc227a1aa6e82ed701d71376e6119 -->

<!-- START_ba2881c4d6a4e6f99de5937c8ed6da3e -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/groups/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/groups/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/groups/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET groups/create`

<!-- END_ba2881c4d6a4e6f99de5937c8ed6da3e -->

<!-- START_96fba94c1d4aba1e5b36355f578b7ab8 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/groups");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/groups", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST groups`

<!-- END_96fba94c1d4aba1e5b36355f578b7ab8 -->

<!-- START_6dc27373a42b5b5caa7925c3959aaccc -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/groups/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/groups/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET groups/{group}`

<!-- END_6dc27373a42b5b5caa7925c3959aaccc -->

<!-- START_e01343a86180bf12de5a9be3512c61b3 -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/groups/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/groups/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/groups/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET groups/{group}/edit`

<!-- END_e01343a86180bf12de5a9be3512c61b3 -->

<!-- START_2419a8363fd3e7924c8c5b10a232584f -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/groups/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/groups/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT groups/{group}`

`PATCH groups/{group}`

<!-- END_2419a8363fd3e7924c8c5b10a232584f -->

<!-- START_04b303eeab6dbc1b21f6a2f9e098b89a -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/groups/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/groups/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE groups/{group}`

<!-- END_04b303eeab6dbc1b21f6a2f9e098b89a -->

<!-- START_6a107a131f853e92450ac742beba0e7f -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/categories");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/categories", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET categories`

<!-- END_6a107a131f853e92450ac742beba0e7f -->

<!-- START_6a2ad9b453d77d03400b055f92e9426f -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/categories/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/categories/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/categories/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET categories/create`

<!-- END_6a2ad9b453d77d03400b055f92e9426f -->

<!-- START_cb37a009c57f6e054e721aada4d9664b -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/categories");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/categories", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST categories`

<!-- END_cb37a009c57f6e054e721aada4d9664b -->

<!-- START_1038e1f50fce16240ff593d39167770f -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/categories/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/categories/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET categories/{category}`

<!-- END_1038e1f50fce16240ff593d39167770f -->

<!-- START_bd3c894d3ea5ccd46778dcf41ef0ff3c -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/categories/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/categories/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/categories/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET categories/{category}/edit`

<!-- END_bd3c894d3ea5ccd46778dcf41ef0ff3c -->

<!-- START_5c7692955c3e2542b25146f0d77e3767 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/categories/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/categories/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT categories/{category}`

`PATCH categories/{category}`

<!-- END_5c7692955c3e2542b25146f0d77e3767 -->

<!-- START_c595e22ac497b4ace0ad442feffe7712 -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/categories/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/categories/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE categories/{category}`

<!-- END_c595e22ac497b4ace0ad442feffe7712 -->

<!-- START_7920d7e05110e2781e6711e3efdd7546 -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/items");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/items", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET items`

<!-- END_7920d7e05110e2781e6711e3efdd7546 -->

<!-- START_7cd896c3d5744a9c61914a8280b9f770 -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/items/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/items/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/items/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET items/create`

<!-- END_7cd896c3d5744a9c61914a8280b9f770 -->

<!-- START_ee6bf4fbbca3ac567825d03d28fd3c89 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/items");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/items", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST items`

<!-- END_ee6bf4fbbca3ac567825d03d28fd3c89 -->

<!-- START_6621ade156e8914c767261f8c7de5eac -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/items/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/items/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET items/{item}`

<!-- END_6621ade156e8914c767261f8c7de5eac -->

<!-- START_b14dad9e75736258d1095b7154677147 -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/items/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/items/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/items/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET items/{item}/edit`

<!-- END_b14dad9e75736258d1095b7154677147 -->

<!-- START_a66ac1964ff152bcdfb15fef1ac78487 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/items/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/items/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT items/{item}`

`PATCH items/{item}`

<!-- END_a66ac1964ff152bcdfb15fef1ac78487 -->

<!-- START_75db279e13f9963474f3b06a62b7c52e -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/items/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/items/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE items/{item}`

<!-- END_75db279e13f9963474f3b06a62b7c52e -->

<!-- START_461e05e31f5e42e67a286d122c276139 -->

## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/entries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/entries");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/entries", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET entries`

<!-- END_461e05e31f5e42e67a286d122c276139 -->

<!-- START_a87c9e41a01fe07abe58ed83b19864ff -->

## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/entries/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/entries/create");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/entries/create", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET entries/create`

<!-- END_a87c9e41a01fe07abe58ed83b19864ff -->

<!-- START_06c8a145a635a9b7c8aa40188c1a7b74 -->

## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://my-first-laravel-app.lndo.site/entries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/entries");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->post("http://my-first-laravel-app.lndo.site/entries", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`POST entries`

<!-- END_06c8a145a635a9b7c8aa40188c1a7b74 -->

<!-- START_d19f35cc80dfce8c1626fa254176a7c3 -->

## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/entries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/entries/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/entries/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET entries/{entry}`

<!-- END_d19f35cc80dfce8c1626fa254176a7c3 -->

<!-- START_54e1551215cdab2b30b0006243ff318b -->

## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://my-first-laravel-app.lndo.site/entries/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/entries/1/edit");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->get("http://my-first-laravel-app.lndo.site/entries/1/edit", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request

`GET entries/{entry}/edit`

<!-- END_54e1551215cdab2b30b0006243ff318b -->

<!-- START_8e11c513c5c2c3217888e288f1070d89 -->

## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://my-first-laravel-app.lndo.site/entries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/entries/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->put("http://my-first-laravel-app.lndo.site/entries/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`PUT entries/{entry}`

`PATCH entries/{entry}`

<!-- END_8e11c513c5c2c3217888e288f1070d89 -->

<!-- START_0b120be946d620690da3563913b4003c -->

## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://my-first-laravel-app.lndo.site/entries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://my-first-laravel-app.lndo.site/entries/1");

let headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then((response) => response.json())
    .then((json) => console.log(json));
```

```php
$client = new \GuzzleHttp\Client();
$response = $client->delete("http://my-first-laravel-app.lndo.site/entries/1", [
    "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

### HTTP Request

`DELETE entries/{entry}`

<!-- END_0b120be946d620690da3563913b4003c -->
