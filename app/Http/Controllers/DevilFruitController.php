<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevilFruitController extends Controller
{
    public function generateFruit(Request $request) {
        $fruitConcept = ucfirst($request->name);
        $types = ['Paramecia', 'Zoan', 'Logia'];
        $randomType = $types[array_rand($types)];

        $description = match($randomType) {
            'Paramecia' => "Grants the user the ability to control or manipulate $fruitConcept.",
            'Zoan' => "Allows the user to transform into a $fruitConcept-based creature.",
            'Logia' => "Turns the user into an element of $fruitConcept, making them almost untouchable.",
            default => "A mysterious power related to $fruitConcept."
        };

        $weaknesses = ['Seastone', 'Haki', 'Water', 'Extreme Temperature', 'Mental Fatigue'];
        $randomWeakness = $weaknesses[array_rand($weaknesses)];

        $fruit = [
            "name" => $fruitConcept . " Fruit",
            "type" => $randomType,
            "description" => $description,
            "weakness" => $randomWeakness
        ];

        // Save fruit in database
        DB::table('devil_fruits')->insert($fruit);

        return response()->json($fruit);
    }

    public function getFruits() {
        $fruits = DB::table('devil_fruits')->orderBy('id', 'desc')->get();
        return response()->json($fruits);
    }
}
