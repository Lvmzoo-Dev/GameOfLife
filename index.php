<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conway's Game of Life</title>
    <style>
        td {
            width: 20px;
            height: 20px;
            background-color: whitesmoke;
            border: 1px solid black;
        }

        .alive {
            background-color: gold;
        }
    </style>
</head>

<body>

    <table border="3">
        <?php
        // Taille de la grille
        $rows = 20;
        $cols = 20;

        // Fonction pour initialiser la grille avec des cellules aléatoires

        $grid = array();

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $grid[$i][$j] = rand(0, 1);
            }
        }
        ?>
        <?php
        for ($i = 0; $i < count($grid); $i++) { ?>
            <tr>
                <?php
                for ($j = 0; $j < count($grid[$i]); $j++) {
                    $cellClass = ($grid[$i][$j] == 1) ? 'alive' : ''; ?>
                    <td class=" <?php echo $cellClass ?>"><?php echo $i . "," . $j; ?></td>
                <?php
                } ?>
            </tr>
        <?php }

        function updateCell($grid, $i, $j)
        {
            $family = array();
            $cell = $grid[$i][$j];
            for ($i = 0; $i < count($grid); $i++) {
                for ($j = 0; $j < count($grid[$i]); $j++) {
                    do {
                        array_push(
                            $family,
                            $grid[$i - 1][$j - 1],
                            $grid[$i - 1][$j],
                            $grid[$i - 1][$j + 1],
                            $grid[$i][$j - 1],
                            $grid[$i][$j + 1],
                            $grid[$i + 1][$j - 1],
                            $grid[$i + 1][$j],
                            $grid[$i + 1][$j + 1]
                        );
                    } while (
                        $i - 1 >= 0 && $j - 1 >= 0
                        && $i + 1 < count($grid)
                        && $j + 1 < count($grid[$i])
                    );
                }
            }
        }
        ?>
    </table>


</body>

</html>