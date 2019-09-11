<?php

    class views
    {

        public function impPhoto($marca,$modelo,$valor,$foto)
        {
            echo "<div class=\"grid-item\">";
            echo "<figure class=\"effect-bubba\">";
            echo "    <img src=\"$foto\" alt=\"Image\" class=\"img-fluid tm-img\">";
            echo "    <figcaption>";
            echo "        <h2 class=\"tm-figure-title\">$modelo</h2>";
            echo "        <p class=\"tm-figure-description\"><strong> - R$ $valor - </strong></p>";
            echo "        <a href=\"img/tm-img-01.jpg\"></a>";
            echo "    </figcaption>";           
            echo "</figure>";
            echo "</div>";
        }

        public function r_carros()
        {
            $Exxit="";

            //for

            $Exxit=$Exxit. "<div class=\"grid-item\">";
            $Exxit=$Exxit. "<figure class=\"effect-bubba\">";
            $Exxit=$Exxit. "    <img src=\"foto\" alt=\"Image\" class=\"img-fluid tm-img\">";
            $Exxit=$Exxit. "    <figcaption>";
            $Exxit=$Exxit. "        <h2 class=\"tm-figure-title\">modelo - marca</h2>";
            $Exxit=$Exxit. "        <p class=\"tm-figure-description\"><strong> - R$ valor - </strong></p>";
            $Exxit=$Exxit. "        <a href=\"img/tm-img-01.jpg\"></a>";
            $Exxit=$Exxit. "    </figcaption>";
            $Exxit=$Exxit. "</figure>";
            $Exxit=$Exxit. "</div>";

            return "LISTA";
        }

    }
?>