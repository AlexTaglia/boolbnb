@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
    <div class="col-md-10">

        <form class="mt-5" action="" method='post' enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="sender_name">Inserire il nome:</label>
                <input class="form-control" type="text" name="sender_name" id="sender_name" maxlength="255">
            </div>
             <div class="form-group mb-4">
                <label for="email">Inserire l email:</label>
                <input class="form-control" type="text" name="email" id="email" maxlength="255">
            </div>
            <div class="form-group mb-4">
                <label for="text">Inserire il messaggio:</label>
                <textarea class="form-control" type="text" name="text" id="text" maxlength="255"></textarea>
            </div>
            <button type="submit" >invio</button>
        </form>
    </div>
</div>

</div>
@endsection