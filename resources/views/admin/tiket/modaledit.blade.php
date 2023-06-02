<div>
    <form action="{{route('admin.posteditdata')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$ticket->id}}">
    <h4>ID TX : {{$ticket->id}}</h4>
    <label for="">Nama Lengkap :</label><input type="text" name="nama_lengkap" class="form-control" value="{{$ticket->nama_lengkap}}" id="">
    <br>
    <label for="">Nomor Hp :</label><input type="text" name="no_hp" class="form-control" value="{{$ticket->no_hp}}" id="">
    <br>
    <label for="">Email :</label><input type="email" name="email" class="form-control" value="{{$ticket->email}}" id="">
    <hr>
    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
