<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <title>deneme</title>
</head>
<body>

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form action="create2" method="post">
    @csrf
{{--    <div class="mb-3 mt-3">--}}
{{--        <label for="İsim" class="form-label">ID:</label>--}}
{{--        <input type="text" class="form-control" id="user_id" placeholder="Kullanıcı ID gir" name="user_id">--}}
{{--    </div>--}}
    <div class="mb-3">
        <label for="mission" class="form-label">Görev:</label>
        <input type="text" class="form-control" id="mission" placeholder="Görevi gir" name="mission">
    </div>
    <div class="mb-3">
        <label for="mission" class="form-label">Açıklama:</label>
        <input type="text" class="form-control" id="mission" placeholder="Açıklama gir" name="comment">
    </div>
    <div class="mb-3">
        <label for="mission" class="form-label">Öncelik:</label>
        <input type="text" class="form-control" id="mission" placeholder="Öncelik gir" name="priorty">
    </div>
    <div class="mb-3">
        <label for="mission" class="form-label">Aktiflik:</label>
        <input type="text" class="form-control" id="mission" placeholder="Aktiflik gir" name="active">
    </div>

    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>

@foreach($users as $todo=>$user)
    <div class="card" style="width: 18rem;">

        <div class="card-body row">
            <div class="col-end-1"> </div>
            <h5 class="card-title row">{{$user->id}}</h5>
            <h5 class="card-title row">{{$user->name}}</h5>
            <p class="card-text col">Email: {{$user->email}}</p>
            <a href="#" class="btn btn-primary">Açıklama: {{$user->todolar->comment}}</a>
            <hr>@foreach($user->todolarr as $todo)
            <a href="#" class="btn btn-primary">Görevler: {{$todo->mission}}</a>
            <hr> @endforeach
{{--            <a href="#" class="btn btn-primary">Öncelik: {{$user->todolar->priorty}}</a>--}}
{{--            <hr>--}}
{{--            <a href="#" class="btn btn-primary">Aktiflik: {{$user->todolar->active}}</a>--}}
{{--            <hr>--}}
{{--            <a href="#" class="btn btn-primary">User_id: {{$user->todolar->user_id}}</a>--}}
            <hr>

        </div>
    </div>
    @endforeach



</form>
</body>
</html>
