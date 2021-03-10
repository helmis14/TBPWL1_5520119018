
<a href="{{route('mbr')}}">wow, {{ $name}}</a>
<br><br><br>

<form action="/members">
    @method('put')
    @csrf
<input type="text">
<button type="submit">submit</button>
</form>