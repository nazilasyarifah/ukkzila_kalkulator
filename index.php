<!DOCTYPE html>
<html lang="id">
    <head>
    <link rel="stylesheet" href="style.css">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kalkulator | UKK RPL 2025</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <style type="text/css">
            
             .logo {
                width: 150px; 
                max-width: 100%; 
                height: auto;
                margin: 0 auto;  
            }
        </style>
    </head>
    <body> 
        <?php session_start(); 
        
        if (isset($_POST['resetmemory'])) {
            unset($_SESSION['memory']);
        }
        ?>
        
        <div class="container mt-5">
            <div class="text-center mb-4">
                <img src="kalkulator.jpg" alt="logo" class="logo">
            </div>
            <h2 class="text-center">Mari Berhitung</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form method="POST" class="p-4 border rounded bg-light">
                        <label class="form-label">Masukan Angka</label> 
                        <input type="TextBox" name="angka1" class="form-control" value="<?php echo isset($_SESSION['memory']) ? $_SESSION['memory'] : ''; ?>" required>
                        <label class="form-label">Masukan Angka</label>
                        <input type="Tex" name="angka2" class="form-control" required> 
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            <button type="submit" class="btn btn-primary" name="operator" value="+" title="Tambah"><i class="fas fa-plus"></i></button>
                            <button type="submit" class="btn btn-secondary" name="operator" value="-" title="Kurang"><i class="fas fa-minus"></i></button>
                            <button type="submit" class="btn btn-dark" name="operator" value="*" title="Kali"><i class="fas fa-xmark"></i></button>
                            <button type="submit" class="btn btn-success" name="operator" value="/" title="Bagi"><i class="fas fa-divide"></i></button>
                            
                            <button type="reset" class="btn btn-warning" title="Clear Entry">CE</button>
                        </div>
                    </form> 
                    
                    <div class="p-1 border rounded bg-light">
                        <h4 class="text-center">
                            <?php
                           if (isset($_POST['operator'])) {
                                $angka1 = $_POST['angka1'];
                                $angka2 = $_POST['angka2'];
                                $operator = $_POST['operator'];
                             
                                if (!preg_match('/^-?\d+([,]\d+)?$/', $angka1) || !preg_match('/^-?\d+([,]\d+)?$/', $angka2)) {
                                    echo "<script>alert('Input harus berupa angka dengan koma sebagai desimal')</script>";
                                } if ($operator == '/' && $angka2 == '0') {
                                    echo "<script>alert('Tidak dapat membagi dengan nol')</script>";
                                } else {
                                    $angka1 = floatval(str_replace(',', '.', $angka1));
                                    $angka2 = floatval(str_replace(',', '.', $angka2));
                             
                                    switch ($operator) {
                                        case '+':
                                            $hasil = $angka1 + $angka2;
                                            break;
                                        case '-':
                                            $hasil = $angka1 - $angka2;
                                            break;
                                        case '*':
                                            $hasil = $angka1 * $angka2;
                                            break;
                                        case '/': 
                                            $hasil = $angka1 / $angka2;
                                            break;
                                        default:
                                            echo "Operator tidak valid";
                                            break;
                                    }
                                   
                                    echo "$angka1 $operator $angka2 = " . str_replace('.', ',', $hasil);
                                    $_SESSION['memory'] = str_replace('.', ',', $hasil);
                                }
                            } else {
                                echo "Taraaa: ";
                            }
                            ?>
                        </h4>

                        <div class="row mt-2">
                            <div class="col-6 text-end">
                                <form method="POST">
                                    <button type="submit" name="memory" class="btn btn-info" title="Memory Entry">ME</button>
                                </form>
                            </div>
                            <div class="col-6 text-start">
                                <form method="POST">
                                    <button type="submit" name="resetmemory" class="btn btn-danger" title="Memory Clear">MC</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center">&copy; UKK RPL 2025 | Nazila Syarifah | XII PPLG</p>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
