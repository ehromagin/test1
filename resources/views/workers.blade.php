<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <!-- Bootstrap CSS (jsDelivr CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <!-- Styles -->
    <style>
    </style>
</head>
<body>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h1 class="text-center">Test Telenorma AG</h1>
    <form id="user-form" method="POST" action="{{route('contact-form')}}" class="col-md-6">
        @csrf
        <div class="mb-3">
            <label for="first" class="form-label">First</label>
            <input type="text" name="first" placeholder="Enter your name" class="form-control" id="first">
        </div>
        <div class="mb-3">
            <label for="last" class="form-label">Last</label>
            <input type="text" name="last" placeholder="Enter last name" class="form-control" id="last">
        </div>
        <div class="mb-3">
            <label for="function" class="form-label">Function</label>
            <select class="form-select" name="function" aria-label="Default select example" id="function">
                <option selected>Choose a position</option>
                <option value="1">Programmer</option>
                <option value="2">Manager</option>
                <option value="3">Tester</option>
            </select>
        </div>

        <button id="btnSubmit" class="btn btn-primary">Submit</button>
    </form>

    <div id="table-container">
        @include('workers-table', ['datas' => $datas])
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#btnSubmit").click(function(e){
            e.preventDefault();
            const data = $("#user-form").serialize();
            console.log(data);
            $.ajax({
                type : "post",
                url  : "{{route('contact-form')}}",
                data : data,
                success : function(data){
                    console.info(data);
                    $("#table-container").html(data);
                },
                error: function(xhr){
                    console.error("Error: " + xhr.status + " " + xhr.statusText);
                }
            });
        });
    });
</script>
</body>
</html>

