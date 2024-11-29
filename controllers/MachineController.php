<?php

namespace Controllers;

class MachineController
{

    public static function index()
    {
        // $headTitle = "Machine";
        require_once ROOT . "/views/machine.php";
        require_once ROOT . "/templates/global.php";
    }

    public static function play()
    {
        header('Content-Type: application/json');
        // Symboles et leurs poids (proba d'apparition)
        // Chaque symbole a une probabilité spécifique d’apparaître. Les symboles avec des gains élevés sont rendus plus rares.
        $symbols_with_weights = [
            '🍋' => 40,
            '🍒' => 30,
            '⭐' => 15,
            '🔔' => 10,
            '💎' => 5,
        ];
        // Table des gains (combinaison => gain)
        $paytable = [
            '🍋🍋🍋' => 40,
            '🍒🍒🍒' => 50,
            '⭐⭐⭐' => 100,
            '🔔🔔🔔' => 150,
            '💎💎💎' => 200,
        ];

        // Générer 3 symboles
        $reel1 = self::getRandomSymbol($symbols_with_weights);
        $reel2 = self::getRandomSymbol($symbols_with_weights);
        $reel3 = self::getRandomSymbol($symbols_with_weights);

        // Résultat de la machine à sous
        $combination = $reel1 . $reel2 . $reel3;
        // Calculer le gain
        $gain = isset($paytable[$combination]) ? $paytable[$combination] : 0;
        // Réponse JSON
        echo json_encode([
            'success' => true,
            'reels' => [$reel1, $reel2, $reel3],
            'gain' => $gain,
        ]);
        exit;
    }

    private static function getRandomSymbol(array $symbols_with_weights)
    {
        $rand = mt_rand(1, array_sum($symbols_with_weights));

        foreach ($symbols_with_weights as $symbol => $weight) {
            if ($rand <= $weight) {
                return $symbol;
            }
            $rand -= $weight;
        }

        return null;
    }
}
