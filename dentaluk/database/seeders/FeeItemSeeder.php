<?php

namespace Database\Seeders;

use App\Models\FeeItem;
use Illuminate\Database\Seeder;

class FeeItemSeeder extends Seeder
{
    public function run(): void
    {
        $fees = [
            ['treatment_item' => 'New Patient Consultation', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £45.00', 'denplan_fee' => 'To Be Started', 'sort_order' => 1],
            ['treatment_item' => 'Routine Examination', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £40.00', 'denplan_fee' => 'To Be Started', 'sort_order' => 2],
            ['treatment_item' => 'Xrays', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £15 each', 'denplan_fee' => 'To Be Started', 'sort_order' => 3],
            ['treatment_item' => 'Fillings', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £140**', 'denplan_fee' => 'To Be Started', 'sort_order' => 4],
            ['treatment_item' => 'Veneers', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £900**', 'denplan_fee' => 'To Be Started', 'sort_order' => 5],
            ['treatment_item' => 'Root Canal Therapy', 'nhs_fee' => 'N/A', 'private_fee' => 'from £350**', 'denplan_fee' => 'To Be Started', 'sort_order' => 6],
            ['treatment_item' => 'Crowns and Bridges', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £600**', 'denplan_fee' => 'To Be Started', 'sort_order' => 7],
            ['treatment_item' => 'Inlays', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £700**', 'denplan_fee' => 'To Be Started', 'sort_order' => 8],
            ['treatment_item' => 'Extraction appointment', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £250**', 'denplan_fee' => 'To Be Started', 'sort_order' => 9],
            ['treatment_item' => 'Gumshields', 'nhs_fee' => 'N/A', 'private_fee' => '£120', 'denplan_fee' => 'To Be Started', 'sort_order' => 10],
            ['treatment_item' => 'Dentures – per arch', 'nhs_fee' => 'NHS Fees Apply', 'private_fee' => 'from £800', 'denplan_fee' => 'To Be Started', 'sort_order' => 11],
            ['treatment_item' => 'Implant', 'nhs_fee' => 'N/A', 'private_fee' => 'from £2000**', 'denplan_fee' => 'To Be Started', 'sort_order' => 12],
            ['treatment_item' => 'Hygienist Consultation', 'nhs_fee' => 'N/A', 'private_fee' => '£70', 'denplan_fee' => 'To Be Started', 'sort_order' => 13],
        ];

        foreach ($fees as $fee) {
            FeeItem::updateOrCreate(['treatment_item' => $fee['treatment_item']], $fee);
        }
    }
}
