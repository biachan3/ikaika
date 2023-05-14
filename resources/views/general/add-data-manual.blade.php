<html>
    <h1>Input Data Manual</h1>
    <form action="{{route('postadddatamanual')}}" method="post" target="_blank">
        @csrf
        <select class="" name="fakultas">
            <option selected="selected" disabled>&nbsp; &nbsp; &nbsp; Alumni Fakultas</option>
            <option value="farmasi">&nbsp; &nbsp; &nbsp; Farmasi</option>
            <option value="hukum">&nbsp; &nbsp; &nbsp; Hukum</option>
            <option value="fbe">&nbsp; &nbsp; &nbsp; Bisnis Ekonomi</option>
            <option value="politeknik">&nbsp; &nbsp; &nbsp; Politeknik</option>
            <option value="psikologi">&nbsp; &nbsp; &nbsp; Psikologi</option>
            <option value="teknik">&nbsp; &nbsp; &nbsp; Teknik</option>
            <option value="industri">&nbsp; &nbsp; &nbsp; Industri Kreatif</option>
            <option value="teknobiologi">&nbsp; &nbsp; &nbsp; Teknobiologi</option>
            <option value="kedokteran">&nbsp; &nbsp; &nbsp; Kedokteran</option>
        </select>
        <br>
        <label for="">Nama : </label>
        <input type="text" name="nama" id="">
        <br>
        <label for="">Nomer Telpon : </label>
        <input type="text" name="no_hp" id="">
        <br>
        <button type="submit">Submit</button>
    </form>
</html>
