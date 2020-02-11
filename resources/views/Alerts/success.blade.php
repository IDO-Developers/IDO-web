@if(Session::has('message'))

    <div class="alert alert-success alert-dismissible">
        <button type = "button" class="close" data-dismiss = "alert">x</button>
    {{Session::get('message')}}
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endif