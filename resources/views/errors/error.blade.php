@if($errors->any())
    <div class="alert alert-danger col-sm-6">
        <ul>
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </ul>
    </div>
@endif