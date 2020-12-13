<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
 
    <div class="container mt-5 mb-5 text-center">
    <a href="<?= base_url('mahasiswa');?>" class="btn btn-secondary mb-2">Kembali</a>
    </div>
    <div class="container">
        <h4>Form Tambah Mahasiswa</h4>
        <hr>
        <form method="post" action="<?= base_url('mahasiswa/add');?>">
            <div class="form-group">
                <label for="">NIM Mahasiswa</label>
                <input type="text" name="nim" class="form-control" placeholder="Nim Mahasiswa">
            </div>
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa">
            </div>
            <div class="form-group">
                <label for="">Foto Mahasiswa</label>
                <input type="file" name="file_upload" class="form-control" > 
            </div>
            <div class="form-group">
                <label for="">Umur Mahasiswa</label>
                <input type="number"name="umur" class="form-control" placeholder="Umur Mahasiswa"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
     
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 


<?= $this->endSection() ?>