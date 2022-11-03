<h1>Tölts ki a mezőket</h1>

@if(session()->has("sucess"))
    <h3>{{ session("success") }}</h3>
@endif

<form action="update-student" method="post">
    @csrf
    <p>
        <label for="">Név:</label>
        <input type="text" name="name" value="{{$student->name}}">
    </p>
    <p>
        <label for="">Email:</label>
        <input type="text" name="email" value="{{$student->email}}">
    </p>
    <p>
        <label for="">Kurzus:</label>
        <input type="text" name="course" value="{{$student->course}}">
    </p>
    <button type="submit">Frissítés</button>
</form>