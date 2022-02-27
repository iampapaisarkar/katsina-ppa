<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcurementMethod;

class ProcurementMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProcurementMethods = [
            [
            'method' => 'International Selective Bidding (ISB)',
            ],
            [
            'method' => 'National Selective Bidding (NSB)',
            ],
            [
            'method' => 'International Restricted Bidding (IRB)',
            ],
            [
            'method' => 'National Restricted Bidding (NRB)',
            ],
            [
            'method' => 'International Open Bidding (IOB)',
            ],
            [
            'method' => 'National Open Bidding (NOB)',
            ],
            [
            'method' => 'Pre-Qualification (PQL)',
            ],
            [
            'method' => 'Community Purchase (CP)',
            ],
            [
            'method' => 'Quotations (QUOT)',
            ],
            [
            'method' => 'Micro Procurement (MP)',
            ],
            [
            'method' => 'Direct Procurement (DP)',
            ],
            [
            'method' => 'Direct Method (DM)',
            ],
            [
            'method' => 'Shopping Method (SM)',
            ],
            [
            'method' => 'Expresision Of Interest (EOI)',
            ],
            [
            'method' => 'Shortlisting Without Publication Of Expression Of Interest (SL)',
            ],
            [
            'method' => 'Single and Sole Source Consultants (SS)',
            ],
            [
            'method' => 'Disposal by Public Bidding (DPB)',
            ],
            [
            'method' => 'Disposal by Public Auction (DPA)',
            ],
            [
            'method' => 'Disposal by Direct Negotiations (DDN)',
            ],
            [
            'method' => 'Disposal by Sale to public officers (DSPO)',
            ],
            [
            'method' => 'Disposal by Destruction of Public Assets (DDPA)',
            ],
            [
            'method' => 'Disposal by conversion or classification of public assets into another form (DCPA)',
            ],
            [
            'method' => 'Disposal by use of trade-in (DTIN)',
            ],
            [
            'method' => 'Disposal by transfer to another procuring and disposing entity (DTR)',
            ],
            [
            'method' => 'Disposal by donation (DD)',
            ]
        ];

        ProcurementMethod::insert($ProcurementMethods);
    }
}
