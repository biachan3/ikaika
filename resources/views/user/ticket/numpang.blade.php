<form id='contactform' action="{{ route('regis') }}" method="POST">
    @csrf
    <h5 class="text-aja">Data Diri</h5>
    <ul class="form-cover">
        <li class="inp-cover inp-name"><input id="name" type="text" name="nama"
                placeholder="Nama Lengkap" required></li>
        <li class="inp-cover inp-email"><input id="email" type="email" name="email"
                placeholder="E-mail" required></li>
        <li class="inp-cover inp-name"><input id="alamat" type="text" name="alamat"
                placeholder="Alamat Domisili" required></li>
        <li class="inp-cover inp-name"><input id="kota" type="text" name="provinsi"
                placeholder="Provinsi" required></li>
        <li class="inp-cover inp-name"><input id="no_hp" type="text" name="no_hp"
                placeholder="Nomor HP" required></li>

        {{-- <li class="inp-cover inp-name"><input id="angkatan" type="text" name="angkatan"
                placeholder="Angakatan" required>
            </li> --}}
        <li class="inp-cover inp-profession">
            <select class="nice-select" id="angkatan" name="angkatan">
                <option selected="selected" disabled>Alumni Fakultas</option>
                <option value="farmasi">Farmasi</option>
                <option value="hukum">Hukum</option>
                <option value="fbe">Bisnis Ekonomi</option>
                <option value="politeknik">Politeknik</option>
                <option value="psikologi">Psikologi</option>
                <option value="teknik">Teknik</option>
                <option value="teknobiologi">Teknobiologi</option>
                <option value="kedokteran">Kedokteran</option>
                <option value="kedokteran">Kedokteran</option>
            </select>
        </li>
        <li class="pay-method">
            <h5>Dengan donasi</h5>
            <div class="pay-item">
                <input type="radio" name="pay-1" checked value="Ya">
                <span></span>
                <p>Ya</p>
            </div>
            <div>
                <input id="nominal" type="text" name="nominal" placeholder="Nominal"
                    onkeypress="return isNumber(event)" onkeyup="getamount(event)">
            </div>
            <br>
            <div class="pay-item">
                <input type="radio" name="pay-1" value="Tidak">
                <span></span>
                <p>Tidak</p>
            </div>
        </li>
        <li class="inp-cover inp-profession">
            <select class="nice-select" name="fakultas">
                <option selected="selected" disabled>Alumni Fakultas</option>
                <option value="farmasi">Farmasi</option>
                <option value="hukum">Hukum</option>
                <option value="fbe">Bisnis Ekonomi</option>
                <option value="politeknik">Politeknik</option>
                <option value="psikologi">Psikologi</option>
                <option value="teknik">Teknik</option>
                <option value="teknobiologi">Teknobiologi</option>
                <option value="kedokteran">Kedokteran</option>
            </select>
        </li>
        <li class="pay-method">
            <h5>Dengan donasi</h5>
            <div class="pay-item">
                <input type="radio" name="pay-1" checked value="Ya">
                <span></span>
                <p>Ya</p>
            </div>
            <div>
                <input id="nominal" type="text" name="nominal" placeholder="Nominal"
                    onkeypress="return isNumber(event)" onkeyup="getamount(event)">
            </div>
            <br>
            <div class="pay-item">
                <input type="radio" name="pay-1" value="Tidak">
                <span></span>
                <p>Tidak</p>
            </div>
        </li>
        <li class="inp-cover inp-name"></li>
    </ul>
    <div class="checkbox-wrap">
        <div class="checkbox-cover">
            <input type="checkbox">
            <p>By using this form you agree with the storage and handling of your data by this
                website.</p>
        </div>
    </div>
    <div class="price-final">
        <span>price:</span>
        <div class="price-final-text" id="final_price">Rp. 100000</div>
    </div>
    <div class="btn-form-cover">
        <button type="submit" class="btn"><span>Buy now</span></button>
    </div>
</form>