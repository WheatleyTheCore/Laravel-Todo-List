<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .todoItemContainer {
                display:flex;
                flex-direction: row;
                align-items: center;
            }

        </style>
    </head>
    <body>
       <div style="display: flex; flex-direction: column; align-items: center;">
           <h1>Todo List in Laravel!</h1>

            @foreach ($listItems as $listItem)
            <div class="todoItemContainer" >
                <p style="width: max-content; background-color: {{$listItem->isFinished ? 'green' : 'red'}}">{{$listItem->name}}</p>
                <form method="post" action="{{route('markComplete', $listItem->id)}}" accept-charset="UTF-8">
                    {{csrf_field()}}  
                    <button type="submit" style="height: 30px; margin-left: 20px;">Complete</button> 
                </form>
                
            </div>
            @endforeach

           <form method="post" action="{{route('saveItem')}}" accept-charset="UTF-8">
               {{csrf_field()}}
               <label for="todoItem">New Item</label>
                </br>
                <input type="text" name="todoItem">
                </br>
                <button type="submit">Add Item</button>
           </form>
       </div>
    </body>
</html>
