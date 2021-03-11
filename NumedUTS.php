<?php
require_once __DIR__ . '/vendor/autoload.php';

use MathPHP\NumericalAnalysis\RootFinding;

// Root-finding methods solve for a root of a polynomial.

// f(x) = x⁴ + 8x³ -13x² -92x + 96
$f⟮x⟯ = function($x) {
    return $x**3 + 5 * $x**2 - 10;
};

// Secant Method
$p₀  = 1;      // First initial approximation
$p₁  = 2;       // Second initial approximation
$tol = 0.0005; // Tolerance; how close to the actual solution we would like
$x   = RootFinding\SecantMethod::solve($f⟮x⟯, $p₀, $p₁, $tol); // Solve for x where f(x) = 0
echo $x;