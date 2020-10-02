<?php
// src/Hook/RealEstateHook.php
namespace App\Hook;

class RealEstateHook
{
    public function formatAd(array $ad): array
    {
        $formatted_ad = array();
        $formatted_ad["id"] = $ad["id"];
        $formatted_ad["title"] = $ad["titre"];
        $formatted_ad["body"] = $ad["description"];
        $formatted_ad["vertical"] = "real_estate";
        $formatted_ad["price"] = intval($ad["prix"]);
        $formatted_ad["city"] = $ad["ville"];
        $formatted_ad["zip_code"] = $ad["code_postal"];
        $formatted_ad["pro_ad"] = true;
        $formatted_ad["images"] = $ad["photos"];

        $category = null;
        switch ($ad["categorie"]) {
            case 'vente':
                $category = 1;
                break;
            case 'location':
                $category = 2;
                break;
            case 'colocation':
                $category = 3;
                break;
            case 'bureaux et commerces':
                $category = 4;
                break;
        }

        $formatted_ad["category"] = $category;

        return $formatted_ad;
    }

    public function buildDescription()
    {
        // ...
    }
}
