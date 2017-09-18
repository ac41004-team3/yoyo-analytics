<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="/scripts/jquery-migrate-3.0.0.min.js"></script>--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js" charset="utf-8"></script>--}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {{--<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>--}}
    {{--<script src="/scripts/jtable.2.4.0/themes/metro/blue/jtable.min.css" type="text/css"> </script>--}}
    {{--<script src="/scripts/jtable.2.4.0/jquery.jtable.js"></script>--}}

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container">
<div class="title m-b-md flex-center">
    Admin
</div>
    <div class="content">


    {{--<div id="app">--}}
        {{--<my-vuetable></my-vuetable>--}}
    {{--</div>--}}
        <table class=" center table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>


            </tr>
        @foreach($users as $user)
           <tr>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <form method="POST" action = "{{ route('updateUser') }}">
               <td>
                   <select value="{{ $user->role }}" name="role" id="role">
                        <option></option>
                       <option>admin</option>
                       <option>manager</option>
                       <option>basic user</option>
                   </select>
               </td>

                   @if ( $user->is_active ===1)
                       <td> <input type="checkbox" name="is_active" checked></td>
                   @else
                       <td> <input type="checkbox" name="is_active" ></td>
                   @endif
             <td><button type="submit" value ='{{ $user->id }}' name="userid" > Update </button></td>
                   {{ csrf_field() }}
               </form>

           </tr>
        @endforeach
        </table>
    </div>

</div>


    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>

<style>
    tr:nth-child(even) {background-color: #f2f2f2}
    table, th, td {
        padding: 10px;
    }
    /*table {*/
        /*border-collapse: collapse;*/
    /*}*/

    table.center {
        margin-left:auto;
        margin-right:auto;

    }

</style>

<script type="text/javascript">


</script>