---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#Auth management


 APIs for authenticate users
<!-- START_20f2ce9440ac1c2d392c5261f4483eba -->
## Change password of the user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/auth/password-change" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"password":"culpa","newPassword":"culpa","newPasswordConfirm":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/password-change"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

let body = {
    "password": "culpa",
    "newPassword": "culpa",
    "newPasswordConfirm": "culpa"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`PUT api/auth/password-change`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the user
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `password` | string |  required  | The actual password of the user
        `newPassword` | string |  required  | The new password
        `newPasswordConfirm` | string |  required  | The new password confirmation
    
<!-- END_20f2ce9440ac1c2d392c5261f4483eba -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Authenticate an user

Authenticate a user and returns the fields accessToken, tokenType, expiresIn and an object containing information of the logged in user

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"email":"culpa","password":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

let body = {
    "email": "culpa",
    "password": "culpa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
null
```
> Example response (400):

```json
{
    "error": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```

### HTTP Request
`POST api/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email address of the user
        `password` | string |  required  | The password of the user
    
<!-- END_a925a8d22b3615f12fca79456d286859 -->

#Task management


APIs for managing task
<!-- START_4227b9e5e54912af051e8dd5472afbce -->
## Get all tasks

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get all registered tasks for authenticated user

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`GET api/tasks`


<!-- END_4227b9e5e54912af051e8dd5472afbce -->

<!-- START_7de0405fed5cd5226f5960f19b6ca3cd -->
## Get an task

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get an task by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/tasks/3c8e83c5-f535-11ea-8572-5cc9d37d7d78" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks/3c8e83c5-f535-11ea-8572-5cc9d37d7d78"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`GET api/tasks/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The UUID of the task

<!-- END_7de0405fed5cd5226f5960f19b6ca3cd -->

<!-- START_4da0d9b378428dcc89ced395d4a806e7 -->
## Create an task

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Create a new task and returns the id, title, date, createdAt, updatedAt, description, done fields of the newly created task

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"title":"culpa","description":"culpa","date":"culpa","with":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

let body = {
    "title": "culpa",
    "description": "culpa",
    "date": "culpa",
    "with": "culpa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`POST api/tasks`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | Title for the task
        `description` | string |  optional  | Description for the task
        `date` | datetime |  required  | Occurrence date (in 'Y-m-d H:i' format) for the task
        `with` | string[] |  optional  | e-mail array for shared task
    
<!-- END_4da0d9b378428dcc89ced395d4a806e7 -->

<!-- START_69075358732d924d06bc0709e0be43f6 -->
## Update a task

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Update a task by id and return updated task info

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/tasks/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"title":"culpa","description":"culpa","date":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks/culpa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

let body = {
    "title": "culpa",
    "description": "culpa",
    "date": "culpa"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`PUT api/tasks/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The UUID of the task
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  optional  | Title for the task
        `description` | string |  optional  | Description for the task
        `date` | datetime |  optional  | Occurrence date for the task in 'Y-m-d H:i' format
    
<!-- END_69075358732d924d06bc0709e0be43f6 -->

<!-- START_64a33c367c5cefce2d1f64abcd08d2e9 -->
## Destroy an task

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Destroy an task by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/tasks/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks/culpa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`DELETE api/tasks/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The UUID of the task

<!-- END_64a33c367c5cefce2d1f64abcd08d2e9 -->

<!-- START_5a85a90ea1cccae3b5e4744330f59350 -->
## Import tasks from .xlsx file

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/tasks/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"file":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

let body = {
    "file": "culpa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`POST api/tasks/import`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `file` | *.xlsx |  required  | Excel file containing the tasks. The file must contain a header with the title (required), description, date (required), and done {yes, no} columns
    
<!-- END_5a85a90ea1cccae3b5e4744330f59350 -->

#User management

APIs for managing users
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Get all users

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Returns all registered users

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_01075f2107bd5c278b05766440915f79 -->
## Get an user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get an user by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users/2e55ba0a-f524-11ea-8572-5cc9d37d7d78" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/2e55ba0a-f524-11ea-8572-5cc9d37d7d78"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`GET api/users/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The UUID of the user

<!-- END_01075f2107bd5c278b05766440915f79 -->

<!-- START_9332edb67641ad6a0c477285396a59e6 -->
## Update an user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Update an user by id and return a JSON containing updated user information

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/users/2e55ba0a-f524-11ea-8572-5cc9d37d7d78" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"email":"joao@gmail.com","phoneNumber":"culpa","cpf":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/2e55ba0a-f524-11ea-8572-5cc9d37d7d78"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

let body = {
    "email": "joao@gmail.com",
    "phoneNumber": "culpa",
    "cpf": "culpa"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`PUT api/users/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the user
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  optional  | The email address of the user. When updating the email, you will need to resend a confirmation email
        `phoneNumber` | string |  optional  | The phone number of the user in '(XX) XXXXX-XXXX' format
        `cpf` | strin |  optional  | string The number of CPF document of the user in 'XXX.XXX.XXX-XX' format
    
<!-- END_9332edb67641ad6a0c477285396a59e6 -->

<!-- START_fceddd82d8c88376fcee403bd01f165a -->
## Destroy an user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Destroy an user by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/users/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/culpa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Authorization Token not Found."
}
```

### HTTP Request
`DELETE api/users/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the user

<!-- END_fceddd82d8c88376fcee403bd01f165a -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Create an user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Create an user, returns  id, email, cpf, phoneNumber, emailVerifiedAt, createdAt, UpdatedAt fields of the newly created user and sends an email to the address informed to confirm the registration.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"email":"culpa","password":"culpa","confirmPassword":"culpa","phoneNumber":"culpa","cpf":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

let body = {
    "email": "culpa",
    "password": "culpa",
    "confirmPassword": "culpa",
    "phoneNumber": "culpa",
    "cpf": "culpa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error": {
        "email": [
            "The email must be a valid email address."
        ],
        "password": [
            "The password must be at least 6 characters."
        ],
        "cpf": [
            "The cpf must be a valid number."
        ],
        "phoneNumber": [
            "The phone number must be valid."
        ]
    }
}
```

### HTTP Request
`POST api/users`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The e-mail address of the user
        `password` | string |  required  | The password of the user (minLength: 6, maxLength:25)
        `confirmPassword` | string |  required  | The password confirmation of the user
        `phoneNumber` | string |  required  | The phone number of the user in '(XX) XXXXX-XXXX' format
        `cpf` | string |  required  | string The number of CPF document of the user in 'XXX.XXX.XXX-XX' format
    
<!-- END_12e37982cc5398c7100e59625ebb5514 -->

#general


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
```

```javascript
const url = new URL(
    "http://localhost:8000/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "variables": [],
    "info": {
        "name": "VilaTaskReminder",
        "_postman_id": "a74d85c1-27e1-498c-995e-88917d337b13",
        "description": "An API for task schedule and reminder",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "Auth management",
            "description": "\n APIs for authenticate users",
            "item": [
                {
                    "name": "Change password of the user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/auth\/password-change",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"password\": \"culpa\",\n    \"newPassword\": \"culpa\",\n    \"newPasswordConfirm\": \"culpa\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Authenticate an user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/auth\/login",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"culpa\",\n    \"password\": \"culpa\"\n}"
                        },
                        "description": "Authenticate a user and returns the fields accessToken, tokenType, expiresIn and an object containing information of the logged in user",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Task management",
            "description": "\nAPIs for managing task",
            "item": [
                {
                    "name": "Get all tasks",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/tasks",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get all registered tasks for authenticated user",
                        "response": []
                    }
                },
                {
                    "name": "Get an task",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/tasks\/:id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "id",
                                    "key": "id",
                                    "value": "3c8e83c5-f535-11ea-8572-5cc9d37d7d78",
                                    "description": "The UUID of the task"
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get an task by id",
                        "response": []
                    }
                },
                {
                    "name": "Create an task",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/tasks",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"title\": \"culpa\",\n    \"description\": \"culpa\",\n    \"date\": \"culpa\",\n    \"with\": \"culpa\"\n}"
                        },
                        "description": "Create a new task and returns the id, title, date, createdAt, updatedAt, description, done fields of the newly created task",
                        "response": []
                    }
                },
                {
                    "name": "Update a task",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/tasks\/:id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "id",
                                    "key": "id",
                                    "value": "culpa",
                                    "description": "The UUID of the task"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"title\": \"culpa\",\n    \"description\": \"culpa\",\n    \"date\": \"culpa\"\n}"
                        },
                        "description": "Update a task by id",
                        "response": []
                    }
                },
                {
                    "name": "Destroy an task",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/tasks\/:id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "id",
                                    "key": "id",
                                    "value": "culpa",
                                    "description": "The UUID of the task"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Destroy an task by id",
                        "response": []
                    }
                },
                {
                    "name": "Import tasks from .xlsx file",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/tasks\/import",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"file\": \"culpa\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "User management",
            "description": "APIs for managing users",
            "item": [
                {
                    "name": "Get all users",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/users",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Returns all registered users",
                        "response": []
                    }
                },
                {
                    "name": "Get an user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/users\/:id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "id",
                                    "key": "id",
                                    "value": "2e55ba0a-f524-11ea-8572-5cc9d37d7d78",
                                    "description": "The UUID of the user"
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get an user by id",
                        "response": []
                    }
                },
                {
                    "name": "Update an user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/users\/:id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "id",
                                    "key": "id",
                                    "value": "2e55ba0a-f524-11ea-8572-5cc9d37d7d78",
                                    "description": "The ID of the user"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"joao@gmail.com\",\n    \"phoneNumber\": \"culpa\",\n    \"cpf\": \"culpa\"\n}"
                        },
                        "description": "Update an user by id and return a JSON containing updated user information",
                        "response": []
                    }
                },
                {
                    "name": "Destroy an user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/users\/:id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "id",
                                    "key": "id",
                                    "value": "culpa",
                                    "description": "The ID of the user"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Destroy an user by id",
                        "response": []
                    }
                },
                {
                    "name": "Create an user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/users",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"culpa\",\n    \"password\": \"culpa\",\n    \"confirmPassword\": \"culpa\",\n    \"phoneNumber\": \"culpa\",\n    \"cpf\": \"culpa\"\n}"
                        },
                        "description": "Create an user, returns  id, email, cpf, phoneNumber, emailVerifiedAt, createdAt, UpdatedAt fields of the newly created user and sends an email to the address informed to confirm the registration.",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "general",
            "description": "",
            "item": [
                {
                    "name": "doc.json",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "doc.json",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET doc.json`


<!-- END_cd4a874127cd23508641c63b640ee838 -->


