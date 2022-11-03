<h1>Tölts ki a mezőket</h1>

@if(session()->has("sucess"))
    <h3>{{ session("success") }}</h3>
@endif

<form action="submit-student" method="post">
    @csrf
    <p>
        <label for="">Név:</label>
        <input type="text" name="name" placeholder="name">
    </p>
    <p>
        <label for="">Email:</label>
        <input type="text" name="email" placeholder="email">
    </p>
    <p>
        <label for="">Kurzus:</label>
        <input type="text" name="course" placeholder="kurzus">
    </p>
    <button type="submit">Submit</button>
</form>