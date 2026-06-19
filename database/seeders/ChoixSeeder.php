<?php

namespace Database\Seeders;

use App\Models\Choix;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Choix::insert([
            // CATEGORIE 1 \\

            // Question 1
            ["id_choix" => 1,  "nom_choix" => "En pleine forme !",                                          "valeur_choix" => 0, "id_question" => 1, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 2,  "nom_choix" => "Ca va je me suis réveillé tranquillement",                   "valeur_choix" => 1, "id_question" => 1, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 3,  "nom_choix" => "Un peu dur, j'ai dû repousser le réveil",                    "valeur_choix" => 2, "id_question" => 1, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 4,  "nom_choix" => "Très difficile, je n'avais pas du tout envie de me lever",   "valeur_choix" => 3, "id_question" => 1, "created_at" => now(), "updated_at" => now()],

            // Question 2
            ["id_choix" => 5,  "nom_choix" => "Au top, j'ai beaucoup d'énergie !",                          "valeur_choix" => 0, "id_question" => 2, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 6,  "nom_choix" => "Correct, je tiens le rythme sans trop de soucis",            "valeur_choix" => 1, "id_question" => 2, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 7,  "nom_choix" => "Un peu bas, je me sens vite fatigué(e)",                     "valeur_choix" => 2, "id_question" => 2, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 8,  "nom_choix" => "À plat, je traîne un peu toute la journée",                  "valeur_choix" => 3, "id_question" => 2, "created_at" => now(), "updated_at" => now()],

            // Question 3
            ["id_choix" => 9,   "nom_choix" => "Super, je dors comme un bébé et je me réveille reposé(e).",   "valeur_choix" => 0, "id_question" => 3, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 10,  "nom_choix" => "Plutôt bonne, je dors assez bien dans l'ensemble.",            "valeur_choix" => 1, "id_question" => 3, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 11,  "nom_choix" => "Agité(e), je me réveille souvent ou j'ai du mal à m'endormir.",  "valeur_choix" => 2, "id_question" => 3, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 12,  "nom_choix" => "Très mauvaise, mes nuits sont courtes et je n’arrive pas à dormir.", "valeur_choix" => 3, "id_question" => 3, "created_at" => now(), "updated_at" => now()],

            // Question 4
            ["id_choix" => 13,  "nom_choix" => "Super motivé(e), j'ai hâte de faire plein de choses.",   "valeur_choix" => 0, "id_question" => 4, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 14,  "nom_choix" => "Prêt(e), je fais ce que j'ai à faire efficacement.",            "valeur_choix" => 1, "id_question" => 4, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 15,  "nom_choix" => "Un peu démotivé(e), j'ai tendance à tout repousser au lendemain.",  "valeur_choix" => 2, "id_question" => 4, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 16,  "nom_choix" => "Complètement bloqué(e), je n'arrive à avancer sur rien.", "valeur_choix" => 3, "id_question" => 4, "created_at" => now(), "updated_at" => now()],

            // Question 5
            ["id_choix" => 17,  "nom_choix" => "Satisfait(e) et détendu(e), j'ai passé une bonne journée.",   "valeur_choix" => 0, "id_question" => 5, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 18,  "nom_choix" => "Un peu fatigué(e) mais content(e) de ma journée.",            "valeur_choix" => 1, "id_question" => 5, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 19,  "nom_choix" => "Épuisé(e), j'ai juste envie que la journée se termine.",      "valeur_choix" => 2, "id_question" => 5, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 20,  "nom_choix" => "Tendu(e) ou anxieux(se) en pensant à la journée du lendemain.", "valeur_choix" => 3, "id_question" => 5, "created_at" => now(), "updated_at" => now()],

            // CATEGORIE 2 \\

            // Question 1   
            ["id_choix" => 21,  "nom_choix" => "Oui, à fond ! J'ai pris beaucoup de temps pour moi.",        "valeur_choix" => 0, "id_question" => 6, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 22,  "nom_choix" => "Oui, j'ai réussi à me caler quelques moments sympas.",       "valeur_choix" => 1, "id_question" => 6, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 23,  "nom_choix" => "Très peu, mon emploi du temps était trop chargé.",           "valeur_choix" => 2, "id_question" => 6, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 24,  "nom_choix" => "Pas du tout, je n'ai pas eu le temps ou la motivation.",     "valeur_choix" => 3, "id_question" => 6, "created_at" => now(), "updated_at" => now()],

            // Question 2
            ["id_choix" => 25,  "nom_choix" => "Super chill, je prends mon temps.",                          "valeur_choix" => 0, "id_question" => 7, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 26,  "nom_choix" => "Équilibré, je gère bien mes journées.",                      "valeur_choix" => 1, "id_question" => 7, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 27,  "nom_choix" => "Intense, je cours un peu après le temps",                    "valeur_choix" => 2, "id_question" => 7, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 28,  "nom_choix" => "Surchargé, je me sens complètement débordé(e).",             "valeur_choix" => 3, "id_question" => 7, "created_at" => now(), "updated_at" => now()],

            // Question 3
            ["id_choix" => 29,  "nom_choix" => "Oui, très facilement, je sais couper quand il le faut.",    "valeur_choix" => 0, "id_question" => 8, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 30,  "nom_choix" => "Oui, de temps en temps quand j'ai un moment de libre",      "valeur_choix" => 1, "id_question" => 8, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 31,  "nom_choix" => "Rarement, j'ai toujours un truc en tête qui me stresse",    "valeur_choix" => 2, "id_question" => 8, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 32,  "nom_choix" => "Jamais, je suis constamment sous pression.",                "valeur_choix" => 3, "id_question" => 8, "created_at" => now(), "updated_at" => now()],

            // Question 4
            ["id_choix" => 33,  "nom_choix" => "Parfait, j'ai un excellent équilibre.",                             "valeur_choix" => 0, "id_question" => 9, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 34,  "nom_choix" => "Plutôt bon, même si certaines semaines sont plus dures",            "valeur_choix" => 1, "id_question" => 9, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 35,  "nom_choix" => "Instable, le travail ou les cours prennent trop le dessus.",        "valeur_choix" => 2, "id_question" => 9, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 36,  "nom_choix" => "Inexistant, je me sens totalement submergé(e).",                    "valeur_choix" => 3, "id_question" => 9, "created_at" => now(), "updated_at" => now()],

            // Question 5
            ["id_choix" => 37,  "nom_choix" => "Oui, dès que j'en ressens le besoin.",                         "valeur_choix" => 0, "id_question" => 10, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 38,  "nom_choix" => "Oui, j'essaie de m'en caler au moins une ou deux.",            "valeur_choix" => 1, "id_question" => 10, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 39,  "nom_choix" => "Pas assez, j'enchaîne souvent tout d'un coup.",                "valeur_choix" => 2, "id_question" => 10, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 40,  "nom_choix" => "Jamais, je reste focus ou non-stop toute la journée.",         "valeur_choix" => 3, "id_question" => 10, "created_at" => now(), "updated_at" => now()],

            // CATEGORIE 3 \\

            // Question 1
            ["id_choix" => 41,  "nom_choix" => "Oui, j'ai un super entourage qui est toujours là pour moi.",   "valeur_choix" => 0, "id_question" => 11, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 42,  "nom_choix" => "Oui, j'ai quelques personnes de confiance à qui parler.",      "valeur_choix" => 1, "id_question" => 11, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 43,  "nom_choix" => "Rarement, c'est parfois difficile de trouver quelqu'un.",      "valeur_choix" => 2, "id_question" => 11, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 44,  "nom_choix" => "Non, je me sens plutôt isolé(e) en ce moment",                 "valeur_choix" => 3, "id_question" => 11, "created_at" => now(), "updated_at" => now()],

            // Question 2
            ["id_choix" => 45,  "nom_choix" => "Super bien, je me sens entouré(e) et soutenu(e).",          "valeur_choix" => 0, "id_question" => 12, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 46,  "nom_choix" => "Ça va globalement, les relations sont plutôt bonnes.",      "valeur_choix" => 1, "id_question" => 12, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 47,  "nom_choix" => "Moyen, il y a quelques tensions ou de la distance.",        "valeur_choix" => 2, "id_question" => 12, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 48,  "nom_choix" => "Pas très bien, je ne me sens pas forcément à ma place.",    "valeur_choix" => 3, "id_question" => 12, "created_at" => now(), "updated_at" => now()],

            // Question 3
            ["id_choix" => 49,  "nom_choix" => "Tous les jours, j'ai plein de moments fun.",                   "valeur_choix" => 0, "id_question" => 13, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 50,  "nom_choix" => "Souvent, plusieurs fois par semaine.",                         "valeur_choix" => 1, "id_question" => 13, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 51,  "nom_choix" => "Rarement, les journées sont plutôt sérieuses ou solitaires.",  "valeur_choix" => 2, "id_question" => 13, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 52,  "nom_choix" => "Presque jamais en ce moment.",                                 "valeur_choix" => 3, "id_question" => 13, "created_at" => now(), "updated_at" => now()],

            // Question 4
            ["id_choix" => 53,  "nom_choix" => "Très à l'aise, j'adore interagir avec les autres.",         "valeur_choix" => 0, "id_question" => 14, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 54,  "nom_choix" => "Plutôt bien, je m'intègre sans trop de soucis.",            "valeur_choix" => 1, "id_question" => 14, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 55,  "nom_choix" => "Un peu en retrait, je préfère rester discret(e).",          "valeur_choix" => 2, "id_question" => 14, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 56,  "nom_choix" => "Mal à l'aise ou invisible, je me sens à l'écart.",          "valeur_choix" => 3, "id_question" => 14, "created_at" => now(), "updated_at" => now()],

            // Question 5
            ["id_choix" => 57,  "nom_choix" => "Oui tout à fait, je n'ai aucun filtre avec eux.",              "valeur_choix" => 0, "id_question" => 15, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 58,  "nom_choix" => "Oui avec la plupart, ou du moins mes amis proches",            "valeur_choix" => 1, "id_question" => 15, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 59,  "nom_choix" => "Pas totalement, je cache parfois ce que je pense vraiment.",   "valeur_choix" => 2, "id_question" => 15, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 60,  "nom_choix" => "Non pas du tout, j'ai l'impression de jouer un rôle.",         "valeur_choix" => 3, "id_question" => 15, "created_at" => now(), "updated_at" => now()],

            // CATEGORIE 4 \\

            // Question 1
            ["id_choix" => 61,  "nom_choix" => "☀️ Grand soleil (Tout va super bien)",                           "valeur_choix" => 0, "id_question" => 16, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 62,  "nom_choix" => "⛅ Éclaircies (Ça va plutôt bien, c'est tranquille)",            "valeur_choix" => 1, "id_question" => 16, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 63,  "nom_choix" => "☁️ Nuageux (C'est très moyen, j’ai un coup de mou)",             "valeur_choix" => 2, "id_question" => 16, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 64,  "nom_choix" => "🌧️ Jour de pluie (C'est une période difficile en ce moment)",    "valeur_choix" => 3, "id_question" => 16, "created_at" => now(), "updated_at" => now()],

            // Question 2
            ["id_choix" => 65,  "nom_choix" => "Ça glisse sur moi, je reste zen.",                                      "valeur_choix" => 0, "id_question" => 17, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 66,  "nom_choix" => "Je râle un bon coup et je passe vite à autre chose.",                   "valeur_choix" => 1, "id_question" => 17, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 67,  "nom_choix" => "Ça me stresse ou m'énerve pour une bonne partie de la journée.",        "valeur_choix" => 2, "id_question" => 17, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 68,  "nom_choix" => "Le moindre petit truc me paraît insurmontable et me mine le moral.",    "valeur_choix" => 3, "id_question" => 17, "created_at" => now(), "updated_at" => now()],

            // Question 3
            ["id_choix" => 69,  "nom_choix" => "Très confiant(e), j'ai plein de projets positifs en tête.",              "valeur_choix" => 0, "id_question" => 18, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 70,  "nom_choix" => "Plutôt tranquille, je vis au jour le jour sans trop m'en faire.",        "valeur_choix" => 1, "id_question" => 18, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 71,  "nom_choix" => "Un peu inquiet(e), j'ai pas mal d'incertitudes qui sont dans ma tête.",  "valeur_choix" => 2, "id_question" => 18, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 72,  "nom_choix" => "Très anxieux(se), l'avenir me stresse beaucoup.",                        "valeur_choix" => 3, "id_question" => 18, "created_at" => now(), "updated_at" => now()],

            // Question 4
            ["id_choix" => 73,  "nom_choix" => "Oui, j'apprécie plein de petits moments simples au quotidien.",  "valeur_choix" => 0, "id_question" => 19, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 74,  "nom_choix" => "Oui, de temps en temps quand il se passe un truc sympa.",        "valeur_choix" => 1, "id_question" => 19, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 75,  "nom_choix" => "Difficilement, je retiens plutôt le négatif en ce moment.",      "valeur_choix" => 2, "id_question" => 19, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 76,  "nom_choix" => "Pas du tout, tout me semble un peu fade ou lourd.",              "valeur_choix" => 3, "id_question" => 19, "created_at" => now(), "updated_at" => now()],

            // Question 5
            ["id_choix" => 77,  "nom_choix" => "Très bon, je me sens bien dans mes baskets.",                   "valeur_choix" => 0, "id_question" => 20, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 78,  "nom_choix" => "Correct, j'ai mes moments de doute mais ça va.",                "valeur_choix" => 1, "id_question" => 20, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 79,  "nom_choix" => "Plutôt bas, j'ai tendance à beaucoup me remettre en question",  "valeur_choix" => 2, "id_question" => 20, "created_at" => now(), "updated_at" => now()],
            ["id_choix" => 80,  "nom_choix" => "Très faible, je ne me sens pas à la hauteur en ce moment.",     "valeur_choix" => 3, "id_question" => 20, "created_at" => now(), "updated_at" => now()],
        ]);
    }
}
