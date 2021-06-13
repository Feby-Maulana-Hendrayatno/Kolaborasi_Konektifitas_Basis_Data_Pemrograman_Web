<table>
    <input type="hidden" id="id_kategori">
    <tr>
        <th>Nama Kategori</th>
        <th>
            <input type="text" id="nama_kategori">
        </th>
    </tr>

            <button id="btn" onclick="insert()" style="background-color: green;">
                Tambah
            </button>
            <button id="btn_update" onclick="update()" hidden style="background-color: yellow;">
                Update
            </button>
</table>

<hr>

<table id="data" border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori </th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    
    </tbody>
</table>

<script>
        load();
        function load() {
            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", "http://localhost/feby/admin/page/kategori/ajaxFile.php?request=1", true);

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
                            let aksi_cell = NewRow.insertCell(2);

                            nomer.innerHTML = val['nomer'];
                            nama_kategori_cell.innerHTML = val['nama_kategori'];
                            aksi_cell.innerHTML = '<button onclick="edit('+ val['id_kategori'] +')" id="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id_kategori'] +')">Hapus</button>'; 
                            
                        }
                    } 

                }
            };

            xhttp.send();

            
        }

        function insert() {

            let nama_kategori = document.getElementById('nama_kategori').value;
            
            if(nama_kategori != ''){

                let data = { nama_kategori: nama_kategori};
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", "http://localhost/feby/admin/page/kategori/ajaxFile.php?request=2", true);

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        let response = this.responseText;
                        if(response == 1){
                            alert("Insert successfully.");

                            load();
                        }
                    }
                };

            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send(JSON.stringify(data));
            }

        }

        function edit(id_kategori) {
		let nama_kategori = document.getElementById('nama_kategori');
		var btn = document.getElementById('btn');
		var btn_edit = document.getElementById('btn_edit');
		var btn_update = document.getElementById('btn_update');

		btn.hidden = true;
		btn_update.hidden = false;

		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "http://localhost/feby/admin/page/kategori/ajaxFile.php?request=4&id_kategori="+id_kategori, true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				var response = JSON.parse(this.responseText);

				for (var key in response) {
					if (response.hasOwnProperty(key)) {
						var val = response[key];

						nama_kategori.value = val['nama_kategori'];
						document.getElementById("id_kategori").value = val['id_kategori'];

					}
				} 

			}
		};

		xhttp.send();
	}

        function hapus(id_kategori) {
            let xhttp = new XMLHttpRequest();
            let konfirmasi = confirm(" Hapus  Pesanan?");

            if (konfirmasi) {
                xhttp.open("GET", "http://localhost/feby/admin/page/kategori/ajaxFile.php?request=3&id_kategori="+id_kategori, true);

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

        let id_kategori = document.getElementById('id_kategori').value;
        let nama_kategori = document.getElementById('nama_kategori').value;


if(nama_kategori != '' ){

    var data = { id_kategori : id_kategori, nama_kategori : nama_kategori };
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://localhost/feby/admin/page/kategori/ajaxFile.php?request=5", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var response = this.responseText;
            if(response == 1){
                alert("Update successfully.");

                load();
            }
        }
    };

    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.send(JSON.stringify(data));
}
}

    </script>