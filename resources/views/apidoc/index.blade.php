<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>Auth management</h1>
<p>APIs for authenticate users</p>
<!-- START_a925a8d22b3615f12fca79456d286859 -->
<h2>Authenticate an user</h2>
<p>Authenticate a user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"impedit","password":"atque"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "impedit",
    "password": "atque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>The email address of the user</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>The password of the user</td>
</tr>
</tbody>
</table>
<!-- END_a925a8d22b3615f12fca79456d286859 -->
<h1>Task management</h1>
<p>APIs for managing task</p>
<!-- START_4227b9e5e54912af051e8dd5472afbce -->
<h2>Get all tasks</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get all registered tasks</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/tasks</code></p>
<!-- END_4227b9e5e54912af051e8dd5472afbce -->
<!-- START_7de0405fed5cd5226f5960f19b6ca3cd -->
<h2>Get an task</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get an task by id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/tasks/temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tasks/temporibus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/tasks/{id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>The ID of the task</td>
</tr>
</tbody>
</table>
<!-- END_7de0405fed5cd5226f5960f19b6ca3cd -->
<!-- START_4da0d9b378428dcc89ced395d4a806e7 -->
<h2>Create an task</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Register a new task</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"atque","userId":"sit","date":"est"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "atque",
    "userId": "sit",
    "date": "est"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/tasks</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>string</td>
<td>required</td>
<td>Title for the task</td>
</tr>
<tr>
<td><code>userId</code></td>
<td>string</td>
<td>required</td>
<td>Task owner user ID</td>
</tr>
<tr>
<td><code>date</code></td>
<td>datetime</td>
<td>required</td>
<td>Occurrence date for the task</td>
</tr>
</tbody>
</table>
<!-- END_4da0d9b378428dcc89ced395d4a806e7 -->
<!-- START_64a33c367c5cefce2d1f64abcd08d2e9 -->
<h2>Destroy an task</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Destroy an task by id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/tasks/asperiores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tasks/asperiores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/tasks/{id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>The ID of the task</td>
</tr>
</tbody>
</table>
<!-- END_64a33c367c5cefce2d1f64abcd08d2e9 -->
<h1>User management</h1>
<p>APIs for managing users</p>
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
<h2>Get all users</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get all registered users</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users</code></p>
<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->
<!-- START_01075f2107bd5c278b05766440915f79 -->
<h2>Get an user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get an user by id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/users/esse" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/esse"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/{id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>The ID of the user</td>
</tr>
</tbody>
</table>
<!-- END_01075f2107bd5c278b05766440915f79 -->
<!-- START_12e37982cc5398c7100e59625ebb5514 -->
<h2>Create an user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Register a new user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"aut","password":"error","phoneNumber":"autem","cpf":"beatae"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "aut",
    "password": "error",
    "phoneNumber": "autem",
    "cpf": "beatae"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/users</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>The email address of the user</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>The password of the user</td>
</tr>
<tr>
<td><code>phoneNumber</code></td>
<td>string</td>
<td>required</td>
<td>The phone number of the user</td>
</tr>
<tr>
<td><code>cpf</code></td>
<td>string</td>
<td>required</td>
<td>string The number of CPF document of the user</td>
</tr>
</tbody>
</table>
<!-- END_12e37982cc5398c7100e59625ebb5514 -->
<!-- START_fceddd82d8c88376fcee403bd01f165a -->
<h2>Destroy an user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Destroy an user by id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/users/ad" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/ad"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/users/{id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>The ID of the user</td>
</tr>
</tbody>
</table>
<!-- END_fceddd82d8c88376fcee403bd01f165a -->
<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
<h2>Create an user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Register a new user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quisquam","password":"sit","phoneNumber":"dolorem","cpf":"rem"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quisquam",
    "password": "sit",
    "phoneNumber": "dolorem",
    "cpf": "rem"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/register</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>The email address of the user</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>The password of the user</td>
</tr>
<tr>
<td><code>phoneNumber</code></td>
<td>string</td>
<td>required</td>
<td>The phone number of the user</td>
</tr>
<tr>
<td><code>cpf</code></td>
<td>string</td>
<td>required</td>
<td>string The number of CPF document of the user</td>
</tr>
</tbody>
</table>
<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->
<h1>general</h1>
<!-- START_cd4a874127cd23508641c63b640ee838 -->
<h2>doc.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "variables": [],
    "info": {
        "name": "Laravel API",
        "_postman_id": "dabf9406-3958-4aae-9e63-69adcc16126c",
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
                            "raw": "{\n    \"email\": \"quis\",\n    \"password\": \"enim\"\n}"
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
                                    "value": "sit",
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
                            "raw": "{\n    \"title\": \"a\",\n    \"userId\": \"in\",\n    \"date\": \"quam\"\n}"
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
                                    "value": "et",
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
                                    "value": "expedita",
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
                            "raw": "{\n    \"email\": \"magnam\",\n    \"password\": \"nulla\",\n    \"phoneNumber\": \"neque\",\n    \"cpf\": \"ipsa\"\n}"
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
                                    "value": "consequatur",
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
                            "raw": "{\n    \"email\": \"et\",\n    \"password\": \"voluptate\",\n    \"phoneNumber\": \"praesentium\",\n    \"cpf\": \"molestias\"\n}"
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET doc.json</code></p>
<!-- END_cd4a874127cd23508641c63b640ee838 -->
<!-- START_5a85a90ea1cccae3b5e4744330f59350 -->
<h2>api/tasks/import</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/tasks/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tasks/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/tasks/import</code></p>
<!-- END_5a85a90ea1cccae3b5e4744330f59350 -->
<!-- START_2d698b6d6bc7441f9c1a9cf11aec4059 -->
<h2>Show the email verification notice.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/email/verify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/email/verify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/email/verify</code></p>
<!-- END_2d698b6d6bc7441f9c1a9cf11aec4059 -->
<!-- START_d83e982c7c8172810ed08568400567aa -->
<h2>api/email/verify/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/email/verify/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/email/verify/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Too Many Attempts."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/email/verify/{id}</code></p>
<!-- END_d83e982c7c8172810ed08568400567aa -->
<!-- START_31f430322462abe3fc3e4ba369b8f77d -->
<h2>api/email/resend</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/email/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Too Many Attempts."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/email/resend</code></p>
<!-- END_31f430322462abe3fc3e4ba369b8f77d -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>