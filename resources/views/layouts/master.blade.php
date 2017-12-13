<!doctype html>
<html>
  <head>
      
    <meta charset="UTF-8">
      
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>
    <title>
        @yield('title', 'Task Manager')
    </title>
         
      @stack('head')
  </head>
    
  <body>
      
        @if(session('alert'))
            <div class='alert'>
                {{ session('alert') }}
            </div>
        @endif
      
      <h1 id='maintitle'>Task Manager</h1>
      
      <div id="topnav">
      <a href='/tasks' class='navlink'>Home</a>
      <a href='/tasks/create' class='navlink'>Add New Task</a>
      </div>
      
          <section>
          @yield('content')
          </section>
      
      @stack('body')
  </body>
    
</html>