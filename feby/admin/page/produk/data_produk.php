        <table class="tabel">
            <input type="hidden" id="gambar_lama">
            <input type="hidden" id="id_produk">
            <tr>
                <th>Nama Kategori</th>
                <th>
                    <select id="id_kategori">
                        <option value="">- Pilih -</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Harga</th>
                <th>
                    <input type="number" id="harga">
                </th>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <th>
                    <textarea id="deskripsi" rows="4"></textarea>
                </th>
            </tr>
            <tr id="tampil_gambar" hidden>
                <th>Gambar</th>
                <th>
                    <div id="gambar_tampil"></div>
                </th>
            </tr>
            <tr?>
            <th>Foto</th>
            <th>
                <input type="file" id="foto">
            </th>
        </tr?>
        <tr>
            <th>
                <button id="btn" onclick="insert()" style="background-color: green;">
                    Tambah
                </button>
                <button id="btn_update" onclick="update()" hidden>
                    Update
                </button>
            </th>
        </tr>
    </table>

    <hr>

    <table id="data" border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Nama Kategori </th>
                <th style="text-align: center;">Harga</th>
                <th style="text-align: center;">Foto</th>
                <th style="text-align: center;">Deskripsi</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


    <script>
        load();
        function load() {
            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", "http://localhost/feby/admin/page/produk/ajaxFile.php?request=1", true);

            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = JSON.parse(this.responseText);
                    let empTable = document.getElementById("data").getElementsByTagName("tbody")[0];

                    empTable.innerHTML = "";

                    for (let key in response) {
                        if (response.hasOwnProperty(key)) {
                            let val = response[key];

                            let NewRow = empTable.insertRow(-1); 
                            let nomer = NewRow.insertCell(0);
                            let nama_kategori_cell = NewRow.insertCell(1); 
                            let harga = NewRow.insertCell(2);
                            let foto = NewRow.insertCell(3);
                            let deskripsi = NewRow.insertCell(4);
                            let aksi_cell = NewRow.insertCell(5);

                            nomer.innerHTML = val['nomer'];
                            nama_kategori_cell.innerHTML = val['nama_kategori'];
                            harga.innerHTML = val['harga'];
                            foto.innerHTML = '<img width="100" src="image/'+val['foto']+'">';
                            deskripsi.innerHTML = val['deskripsi'];
                            aksi_cell.innerHTML = '<button onclick="edit('+ val['id'] +')" id="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id'] +')">Hapus</button>'; 

                        }
                    } 

                }
            };

            xhttp.send();


        }

        function tampil_kategori(){
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let data = JSON.parse(xhttp.responseText);
                    data.forEach(function(element) {
                        document.getElementById("id_kategori").innerHTML += "<option value="+element.id_kategori+">"+element.nama_kategori+"</option>";
                    });
                }
            };
            xhttp.open("GET", "http://localhost/feby/admin/page/kategori/ajaxFile.php?request=1");
            xhttp.send();
        }

        tampil_kategori();

        function insert() {
            let id_kategori = document.getElementById('id_kategori').value;
            let harga = document.getElementById('harga').value;
            let deskripsi = document.getElementById('deskripsi').value;
            let files = document.getElementById('foto').files;

            if (files.length > 0) {
                let formData = new FormData();
                formData.append("foto", files[0]);
                formData.append("id_kategori", id_kategori);
                formData.append("harga", harga);
                formData.append("deskripsi", deskripsi);
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", "http://localhost/feby/admin/page/produk/ajaxFile.php?request=2", true);
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        let response = this.responseText;
                        if (response == 1) {
                            alert("Upload Sukses");
                            load();
                            document.getElementById("id_kategori").value = "";
                            document.getElementById("harga").value = "";
                            document.getElementById("deskripsi").value = "";
                            document.getElementById("foto").value = "";
                        } else {
                            alert("Upload Gagal");
                        }
                    }
                };
                xhttp.send(formData);
            }
        }

        function edit(id) {
            let id_kategori = document.getElementById("id_kategori");
            let harga = document.getElementById("harga");
            let deskripsi = document.getElementById("deskripsi");
            let gambar_lama = document.getElementById('gambar_lama');
            let tampil_gambar = document.getElementById("tampil_gambar");
            let ambil_gambar = document.getElementById("ambil_gambar");
//let label_gambar = document.getElementById("label_gambar");
let btn = document.getElementById('btn');
let btn_edit = document.getElementById('btn_edit');
let btn_update = document.getElementById('btn_update');

btn.hidden = true;
btn_update.hidden = false;
let xhttp = new XMLHttpRequest();
xhttp.open("GET", "http://localhost/feby/admin/page/produk/ajaxFile.php?request=4&id="+id, true);
xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        let response = JSON.parse(this.responseText);
        for (let key in response) {
            if (response.hasOwnProperty(key)) {
                let val = response[key];
                id_kategori.value = val['id_kategori'];
                harga.value = val['harga'];
                deskripsi.value = val['deskripsi'];
                if (val['foto'] == "") {
                    document.getElementById("gambar_tampil").value = '1';
                } else {
                    tampil_gambar.hidden = false;
                    document.getElementById("gambar_lama").value = val['foto'];
                    document.getElementById("gambar_tampil").innerHTML = '<img width="100" src="image/'+val['foto']+'">';
                }
                document.getElementById("id_produk").value = val['id'];
            }
        } 
    }
};
xhttp.send();
}

function hapus(id) {
    let xhttp = new XMLHttpRequest();
    let konfirmasi = confirm(" Hapus  Pesanan?");

    if (konfirmasi) {
        xhttp.open("GET", "http://localhost/feby/admin/page/produk/ajaxFile.php?request=3&id="+id, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = this.responseText;
                if(response == 1){
                    alert("Delete successfully.");

                    load();
                }

            }
        };

        xhttp.send();
    }
}

function update() {
    let id_produk = document.getElementById('id_produk').value;
    let gambar_lama = document.getElementById('gambar_lama').value;
    let id_kategori = document.getElementById('id_kategori').value;
    let harga = document.getElementById('harga').value;
    let deskripsi = document.getElementById('deskripsi').value;
    let files = document.getElementById('foto').files;
    if (files.length > 0) {
        let formData = new FormData();
        formData.append("foto", files[0]);
        formData.append("id_produk", id_produk);
        formData.append("id_kategori", id_kategori);
        formData.append("harga", harga);
        formData.append("deskripsi", deskripsi);
        formData.append("gambar_lama", gambar_lama);

        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost/feby/admin/page/produk/ajaxFile.php?request=5", true);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText;
                if (response == 1) {
                    alert("Upload Sukses");
                    load();
                    btn.hidden = false;
                    btn_update.hidden = true;
                } else {
                    alert("Upload Gagal");
                }
            }
        };
        xhttp.send(formData);
    }
}

</script>