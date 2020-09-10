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
<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Authenticate an user

Authenticate a user

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"culpa","password":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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
Get all registered tasks

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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
    "error": "Token is invalid."
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
    -G "http://localhost:8000/api/tasks/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks/culpa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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
    "error": "Token is invalid."
}
```

### HTTP Request
`GET api/tasks/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the task

<!-- END_7de0405fed5cd5226f5960f19b6ca3cd -->

<!-- START_4da0d9b378428dcc89ced395d4a806e7 -->
## Create an task

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Register a new task

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"title":"culpa","userId":"culpa","date":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "title": "culpa",
    "userId": "culpa",
    "date": "culpa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tasks`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | Title for the task
        `userId` | string |  required  | Task owner user ID
        `date` | datetime |  required  | Occurrence date for the task
    
<!-- END_4da0d9b378428dcc89ced395d4a806e7 -->

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
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks/culpa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/tasks/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the task

<!-- END_64a33c367c5cefce2d1f64abcd08d2e9 -->

#User management

APIs for managing users
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Get all users

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get all registered users

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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
    "error": "Token is invalid."
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
    -G "http://localhost:8000/api/users/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/culpa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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
    "error": "Token is invalid."
}
```

### HTTP Request
`GET api/users/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the user

<!-- END_01075f2107bd5c278b05766440915f79 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Create an user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Register a new user

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"culpa","password":"culpa","confirmPassword":"culpa","phoneNumber":"culpa","cpf":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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



### HTTP Request
`POST api/users`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email address of the user
        `password` | string |  required  | The password of the user
        `confirmPassword` | string |  required  | The password confirmation of the user
        `phoneNumber` | string |  required  | The phone number of the user
        `cpf` | string |  required  | string The number of CPF document of the user
    
<!-- END_12e37982cc5398c7100e59625ebb5514 -->

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
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/culpa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/users/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the user

<!-- END_fceddd82d8c88376fcee403bd01f165a -->

<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## Create an user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Register a new user

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"culpa","password":"culpa","confirmPassword":"culpa","phoneNumber":"culpa","cpf":"culpa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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



### HTTP Request
`POST api/auth/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email address of the user
        `password` | string |  required  | The password of the user
        `confirmPassword` | string |  required  | The password confirmation of the user
        `phoneNumber` | string |  required  | The phone number of the user
        `cpf` | string |  required  | string The number of CPF document of the user
    
<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->

#general


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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
        "name": "Laravel API",
        "_postman_id": "8be30d1d-8bd8-4f89-a837-eff39a5b5da0",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "Auth management",
            "description": "\n APIs for authenticate users",
            "item": [
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"impedit\",\n    \"password\": \"atque\"\n}"
                        },
                        "description": "Authenticate a user",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get all registered tasks",
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
                                    "value": "temporibus",
                                    "description": "The ID of the task"
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"title\": \"atque\",\n    \"userId\": \"sit\",\n    \"date\": \"est\"\n}"
                        },
                        "description": "Register a new task",
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
                                    "value": "asperiores",
                                    "description": "The ID of the task"
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Destroy an task by id",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get all registered users",
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
                                    "value": "esse",
                                    "description": "The ID of the user"
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"aut\",\n    \"password\": \"error\",\n    \"phoneNumber\": \"autem\",\n    \"cpf\": \"beatae\"\n}"
                        },
                        "description": "Register a new user",
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
                                    "value": "ad",
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
                            "path": "api\/auth\/register",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"quisquam\",\n    \"password\": \"sit\",\n    \"phoneNumber\": \"dolorem\",\n    \"cpf\": \"rem\"\n}"
                        },
                        "description": "Register a new user",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/tasks\/import",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the email verification notice.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/email\/verify",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/email\/verify\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/email\/verify\/:id",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/email\/resend",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost:8000",
                            "path": "api\/email\/resend",
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

<!-- START_5a85a90ea1cccae3b5e4744330f59350 -->
## api/tasks/import
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/tasks/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/tasks/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tasks/import`


<!-- END_5a85a90ea1cccae3b5e4744330f59350 -->

<!-- START_2d698b6d6bc7441f9c1a9cf11aec4059 -->
## Show the email verification notice.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/email/verify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/email/verify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
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
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/email/verify`


<!-- END_2d698b6d6bc7441f9c1a9cf11aec4059 -->

<!-- START_d83e982c7c8172810ed08568400567aa -->
## api/email/verify/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/email/verify/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/email/verify/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "message": "Invalid signature."
}
```

### HTTP Request
`GET api/email/verify/{id}`


<!-- END_d83e982c7c8172810ed08568400567aa -->

<!-- START_31f430322462abe3fc3e4ba369b8f77d -->
## api/email/resend
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/email/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/email/resend`


<!-- END_31f430322462abe3fc3e4ba369b8f77d -->


