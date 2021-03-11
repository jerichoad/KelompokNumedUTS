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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.php"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li class="active"><a href="index.php">FINDING ROOT - SECANT METHOD</a></li>
                    </ul>        
                </div>
            </div>
        </div>
    </header>

    <section id="services">
        <div class="container">
            <div class="center gap">
                <h3>Input Initial Values</h3>
                <form method="POST" action="">
				<p class="lead">Input x1 <input type="text" name="x0"> </p>
                <p class="lead">Input x2 <input type="text" name="x1"> 
				</p>
                <input type="submit" name="calculate" value="CALCULATE">
				</form>
            </div>
        </div>
        <div class="container">
        <?php
            require_once __DIR__ . '/vendor/autoload.php';

            use MathPHP\NumericalAnalysis\RootFinding;

            if (isset($_POST['calculate'])){

                $x0 = $_POST['x0'];
                $x1 = $_POST['x1'];
                // echo $x0." text ".$x1;
                // Root-finding methods solve for a root of a polynomial.

                // f(x) = x⁴ + 8x³ -13x² -92x + 96
                $f⟮x⟯ = function($x) {
                    // return $x**3 + 5 * $x**2 - 10;
                    return pow(exp(1),-1*$x) - $x;
                };

                // Secant Method
                $p₀  = $x0;      // First initial approximation
                $p₁  = $x1;       // Second initial approximation
                $tol = 0.0005; // Tolerance; how close to the actual solution we would like
                $x   = RootFinding\SecantMethod::solve($f⟮x⟯, $p₀, $p₁, $tol); // Solve for x where f(x) = 0
                // echo $x[0][0]."<br>";
                // echo $x[0][1];
                // $array = RootFinding\SecantMethod::$array1;
                //echo $array1;
            // }

            
        ?>
        </div>
        <div class="container">
            <h2>Result</h2>
            <p>es: blabla %</p>            
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Iterasi ke-</th>
                    <th>x1</th>
                    <!-- <th>f(x0)</th> -->
                    <th>f(x1)</th>
                    <th>abs(ea)%</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $jum = count($x);
                for ($i = 0; $i < $jum - 1; $i++){
                    $n = $i+0;
                    echo "<tr>";
                    echo "<td>".$n."</td>";
                    for ($j = 0; $j < 3; $j++){
                        echo "<td>".$x[$i][$j]."</td>";
                    }
                    echo "</tr>";
                }
                ?>
                    <!-- <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                        <td>john@example.com</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <?php 
            
            }
            //tutup if isset
                    
        ?>
    </section>
</body>
</html>

