<!DOCTYPE html>
<html>

<head>
    <title>Secant</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>PROJECT IIR </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css"> -->

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="style/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="style/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="style/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="style/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="style/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link rel="stylesheet" href="css/sl-slide.css">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" class="login100-form validate-form" id="calculate">
                    <span class="login100-form-title p-b-26">
                        FINDING ROOT - SECANT METHOD
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Masukkan Nomor">
                        <input class="input100" type="text" name="x0">
                        <span class="focus-input100" data-placeholder="x0"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Masukkan Nomor">
                        <input class="input100" type="text" name="x1">
                        <span class="focus-input100" data-placeholder="x1"></span>
                    </div>

                    <div class="wrap-input100 input100-select bg1">
                        <span class="label-input100" data-placeholder="Kriteria Berhenti"></span>
                        <div>
                            <select class="js-select2" name="kriteria_berhenti">
                                <option disabled="disabled" selected="selected">Kriteria Berhenti</option>
                                <option value="εa">εa (%)</option>
                                <option value="f⟮x⟯">f⟮x⟯</option>
                                <option value="max_iter">Maksimum Iterasi</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Masukkan Nomor">
                        <input class="input100" type="text" name="tol">
                        <span class="focus-input100" data-placeholder="nilai kriteria berhenti"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="calculate">
                                Calculate
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            εa (%) = Program berhenti jika kesalahan pendekatan relatif kurang dari nilai yang ditentukan dalam satuan persen.
                        </span> <br>
                        <span class="txt1">
                            f⟮x⟯ = Program berhenti jika absolut fungsi x kurang dari nilai yang ditentukan.
                        </span> <br>
                        <span class="txt1">
                            Maksimum Iterasi = Program berhenti jika iterasi mencapai nilai yang ditentukan.
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once __DIR__ . '/vendor/autoload.php';

    use MathPHP\NumericalAnalysis\RootFinding;

    if (isset($_POST['calculate'])) {

        $x0 = $_POST['x0'];
        $x1 = $_POST['x1'];
        $kriteria_berhenti = $_POST['kriteria_berhenti'];
        $tol = $_POST['tol']; // Tolerance; how close to the actual solution we would like

        // echo $x0." text ".$x1;
        // Root-finding methods solve for a root of a polynomial.

        // f(x) = x⁴ + 8x³ -13x² -92x + 96
        $f⟮x⟯ = function ($x) {
            // return $x**3 + 5 * $x**2 - 10;
            return pow(exp(1), -1 * $x) - $x;
        };

        // Secant Method
        $p₀  = $x0;      // First initial approximation
        $p₁  = $x1;       // Second initial approximation
        if ($kriteria_berhenti == "εa") {
            $x   = RootFinding\SecantMethod::solve_εa($f⟮x⟯, $p₀, $p₁, $tol); // Solve for x where f(x) = 0
        } else if ($kriteria_berhenti == "f⟮x⟯") {
            $x   = RootFinding\SecantMethod::solve_f⟮x⟯($f⟮x⟯, $p₀, $p₁, $tol); // Solve for x where f(x) = 0
        } else {
            $x   = RootFinding\SecantMethod::solve_max_iter($f⟮x⟯, $p₀, $p₁, $tol); // Solve for x where f(x) = 0
        }
        // echo $x[0][0]."<br>";
        // echo $x[0][1];
        // $array = RootFinding\SecantMethod::$array1;
        //echo $array1;
        // }
    ?>
        <!-- <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <h5>Result</h2>
                                <p>nilai kriteria berhenti = <?= $tol ?></p>
                                <table class="table table-hover">
                                    <thead class="text-wrap">
                                        <tr>
                                            <th scope="col">Iterasi ke-</th>
                                            <th scope="col">x1</th>
                                            <th scope="col">f(x1)</th>
                                            <th scope="col">abs(ea)%</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">
                                        <?php
                                        // $jum = count($x);
                                        // for ($i = 0; $i < $jum - 1; $i++) {
                                        //     $n = $i + 0;
                                        //     echo "<tr>";
                                        //     echo "<th scope='row'>" . $n . "</th>";
                                        //     for ($j = 0; $j < 3; $j++) {
                                        //         echo "<td>" . $x[$i][$j] . "</td>";
                                        //     }
                                        //     echo "</tr>";
                                        // }
                                        ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="card text-center">
            <div class="card-header">
                Hasil
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <div class="card-body">

                        <h5>Result</h2>
                            <p>nilai kriteria berhenti = <?= $tol ?></p>
                            <table class="table table-hover">
                                <thead class="text-wrap">
                                    <tr>
                                        <th scope="col">Iterasi ke-</th>
                                        <th scope="col">x1</th>
                                        <th scope="col">f(x1)</th>
                                        <th scope="col">abs(ea)%</th>
                                    </tr>
                                </thead>
                                <tbody class="table">
                                    <?php
                                    $jum = count($x);
                                    for ($i = 0; $i < $jum - 1; $i++) {
                                        $n = $i + 0;
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $n . "</th>";
                                        for ($j = 0; $j < 3; $j++) {
                                            echo "<td>" . $x[$i][$j] . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <script>
        $(window).load(function() {
            $('#exampleModalCenter').modal('show');
        });
    </script>





    <script src="style/jquery/jquery-3.2.1.min.js"></script>
    <script src="style/animsition/js/animsition.min.js"></script>
    <script src="style/bootstrap/js/popper.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>
    <script src="style/select2/select2.min.js"></script>
    <script src="style/daterangepicker/moment.min.js"></script>
    <script src="style/daterangepicker/daterangepicker.js"></script>
    <script src="style/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
</body>

</html>