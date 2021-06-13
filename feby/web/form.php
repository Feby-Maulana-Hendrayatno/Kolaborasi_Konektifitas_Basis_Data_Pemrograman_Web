<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
    <link rel="stylesheet" href="css/style-form.css">
</head>
<body>
    <div class="container">
  <form action="action_page.php">

    <label for="">Nama Pemesan</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="jumlah">Jumlah</label>
    <select id="jumlah" name="jumlah">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>

    <label for="nama_makanan">Nama Makanan</label>
    <select id="jumlah" name="jumlah">
      <option value="nasi_kucing">nasi kucinggg</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>

    <label for="pesan">Pesn</label>
    <textarea id="pesan" name="pesan" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
</body>
</html>