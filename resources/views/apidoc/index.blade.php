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
<!-- START_20f2ce9440ac1c2d392c5261f4483eba -->
<h2>Change password of the user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/auth/password-change" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"password":"culpa","newPassword":"culpa","newPasswordConfirm":"culpa"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/auth/password-change</code></p>
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
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>The actual password of the user</td>
</tr>
<tr>
<td><code>newPassword</code></td>
<td>string</td>
<td>required</td>
<td>The new password</td>
</tr>
<tr>
<td><code>newPasswordConfirm</code></td>
<td>string</td>
<td>required</td>
<td>The new password confirmation</td>
</tr>
</tbody>
</table>
<!-- END_20f2ce9440ac1c2d392c5261f4483eba -->
<!-- START_a925a8d22b3615f12fca79456d286859 -->
<h2>Authenticate an user</h2>
<p>Authenticate a user and returns the fields accessToken, tokenType, expiresIn and an object containing information of the logged in user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"email":"culpa","password":"culpa"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{
    "error": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}</code></pre>
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
<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
<h2>Logout</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/logout</code></p>
<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->
<h1>Task management</h1>
<p>APIs for managing task</p>
<!-- START_4227b9e5e54912af051e8dd5472afbce -->
<h2>Get all tasks</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get all registered tasks for authenticated user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    -G "http://localhost:8000/api/tasks/3c8e83c5-f535-11ea-8572-5cc9d37d7d78" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
<td>The UUID of the task</td>
</tr>
</tbody>
</table>
<!-- END_7de0405fed5cd5226f5960f19b6ca3cd -->
<!-- START_4da0d9b378428dcc89ced395d4a806e7 -->
<h2>Create an task</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Create a new task and returns the id, title, date, createdAt, updatedAt, description, done fields of the newly created task</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"title":"culpa","description":"culpa","date":"culpa","with":"culpa"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
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
<td><code>description</code></td>
<td>string</td>
<td>optional</td>
<td>Description for the task</td>
</tr>
<tr>
<td><code>date</code></td>
<td>datetime</td>
<td>required</td>
<td>Occurrence date (in 'Y-m-d H:i' format) for the task</td>
</tr>
<tr>
<td><code>with</code></td>
<td>string[]</td>
<td>optional</td>
<td>e-mail array for shared task</td>
</tr>
</tbody>
</table>
<!-- END_4da0d9b378428dcc89ced395d4a806e7 -->
<!-- START_69075358732d924d06bc0709e0be43f6 -->
<h2>Update a task</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Update a task by id and return updated task info</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/tasks/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"title":"culpa","description":"culpa","date":"culpa"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/tasks/{id}</code></p>
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
<td>The UUID of the task</td>
</tr>
</tbody>
</table>
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
<td>optional</td>
<td>Title for the task</td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>optional</td>
<td>Description for the task</td>
</tr>
<tr>
<td><code>date</code></td>
<td>datetime</td>
<td>optional</td>
<td>Occurrence date for the task in 'Y-m-d H:i' format</td>
</tr>
</tbody>
</table>
<!-- END_69075358732d924d06bc0709e0be43f6 -->
<!-- START_64a33c367c5cefce2d1f64abcd08d2e9 -->
<h2>Destroy an task</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Destroy an task by id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/tasks/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
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
<td>The UUID of the task</td>
</tr>
</tbody>
</table>
<!-- END_64a33c367c5cefce2d1f64abcd08d2e9 -->
<!-- START_5a85a90ea1cccae3b5e4744330f59350 -->
<h2>Import tasks from .xlsx file</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/tasks/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"file":"culpa"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/tasks/import</code></p>
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
<td><code>file</code></td>
<td>*.xlsx</td>
<td>required</td>
<td>Excel file containing the tasks. The file must contain a header with the title (required), description, date (required), and done {yes, no} columns</td>
</tr>
</tbody>
</table>
<!-- END_5a85a90ea1cccae3b5e4744330f59350 -->
<h1>User management</h1>
<p>APIs for managing users</p>
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
<h2>Get all users</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Returns all registered users</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    -G "http://localhost:8000/api/users/2e55ba0a-f524-11ea-8572-5cc9d37d7d78" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
<td>The UUID of the user</td>
</tr>
</tbody>
</table>
<!-- END_01075f2107bd5c278b05766440915f79 -->
<!-- START_9332edb67641ad6a0c477285396a59e6 -->
<h2>Update an user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Update an user by id and return a JSON containing updated user information</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/users/2e55ba0a-f524-11ea-8572-5cc9d37d7d78" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"email":"joao@gmail.com","phoneNumber":"culpa","cpf":"culpa"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/users/{id}</code></p>
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
<td>optional</td>
<td>The email address of the user. When updating the email, you will need to resend a confirmation email</td>
</tr>
<tr>
<td><code>phoneNumber</code></td>
<td>string</td>
<td>optional</td>
<td>The phone number of the user in '(XX) XXXXX-XXXX' format</td>
</tr>
<tr>
<td><code>cpf</code></td>
<td>strin</td>
<td>optional</td>
<td>string The number of CPF document of the user in 'XXX.XXX.XXX-XX' format</td>
</tr>
</tbody>
</table>
<!-- END_9332edb67641ad6a0c477285396a59e6 -->
<!-- START_fceddd82d8c88376fcee403bd01f165a -->
<h2>Destroy an user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Destroy an user by id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/users/culpa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Authorization Token not Found."
}</code></pre>
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
<!-- START_12e37982cc5398c7100e59625ebb5514 -->
<h2>Create an user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Create an user, returns  id, email, cpf, phoneNumber, emailVerifiedAt, createdAt, UpdatedAt fields of the newly created user and sends an email to the address informed to confirm the registration.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU" \
    -d '{"email":"culpa","password":"culpa","confirmPassword":"culpa","phoneNumber":"culpa","cpf":"culpa"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
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
<td>The e-mail address of the user</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>The password of the user (minLength: 6, maxLength:25)</td>
</tr>
<tr>
<td><code>confirmPassword</code></td>
<td>string</td>
<td>required</td>
<td>The password confirmation of the user</td>
</tr>
<tr>
<td><code>phoneNumber</code></td>
<td>string</td>
<td>required</td>
<td>The phone number of the user in '(XX) XXXXX-XXXX' format</td>
</tr>
<tr>
<td><code>cpf</code></td>
<td>string</td>
<td>required</td>
<td>string The number of CPF document of the user in 'XXX.XXX.XXX-XX' format</td>
</tr>
</tbody>
</table>
<!-- END_12e37982cc5398c7100e59625ebb5514 -->
<h1>general</h1>
<!-- START_cd4a874127cd23508641c63b640ee838 -->
<h2>doc.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5OTkzNTMwNywiZXhwIjoxNjAwMTUxMzA3LCJuYmYiOjE1OTk5MzUzMDcsImp0aSI6IjBDUFNRRXY4c253SmdBMHQiLCJzdWIiOiIyZTU1YmEwYS1mNTI0LTExZWEtODU3Mi01Y2M5ZDM3ZDdkNzgiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.5nGyW1gVUr4Yj-W31ArveXp0iMwDqDJTXJ10LAU-qVU"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "variables": [],
    "info": {
        "name": "VilaTaskReminder",
        "_postman_id": "b40326c0-91e1-4c91-bc34-410f98769d73",
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
                        "description": "Update a task by id and return updated task info",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET doc.json</code></p>
<!-- END_cd4a874127cd23508641c63b640ee838 -->
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