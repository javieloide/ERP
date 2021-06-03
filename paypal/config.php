<?php
define('ProPayPal', 0);
if(ProPayPal){
 define("PayPalClientId", "AbaDXqqvpWIEF1GemCVSB0ISidTr4-WW5TyQ5gFDnoUVjTHp_33Kx5EOXhj0lf2Qp7wUpl216wKUYYs3");
 define("PayPalSecret", "EH_8VOq8GEH-N5jE9ay6p9km5d1WPlAJR3DAYimI6teCIkZ0k4maAXQ3x82ln1XsaVMdHCPWw3Gz_lVb");
 define("PayPalBaseUrl", "https://api.paypal.com/v1/");
 define("PayPalENV", "production");
} else {
 define("PayPalClientId", "AbaDXqqvpWIEF1GemCVSB0ISidTr4-WW5TyQ5gFDnoUVjTHp_33Kx5EOXhj0lf2Qp7wUpl216wKUYYs3");
 define("PayPalSecret", "EH_8VOq8GEH-N5jE9ay6p9km5d1WPlAJR3DAYimI6teCIkZ0k4maAXQ3x82ln1XsaVMdHCPWw3Gz_lVb");
 define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
 define("PayPalENV", "sandbox");
}
?>
