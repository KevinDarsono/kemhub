<form action="{{route('import.kendaraan-angkutan')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Submit</button>
</form>
