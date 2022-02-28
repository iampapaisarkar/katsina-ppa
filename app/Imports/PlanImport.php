<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PlanImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    // , WithValidation
    /**
    * @param Collection $collection
    */
    private $data = [];

    public function collection(Collection $rows)
    {
        $this->data = $rows;
    }

    public function getImportedData()
    {
        return $this->data;
    }

    public function rules(): array
    {
        return [
            '*.project_name' => 'required',
            '*.description' => 'nullable',
            '*.process_type' => 'required',
            '*.category' => 'required',
            '*.procurement_disposal_method' => 'required',
            '*.estimated_cost_reserve_price' => 'required',
            '*.gl_code' => 'nullable',
            '*.programme' => 'nullable',
            '*.sub_programme' => 'nullable',
            '*.quantities' => 'nullable',
            '*.source_of_funds' => 'nullable',
            '*.asset_location' => 'nullable',
            '*.justification' => 'required',
            '*.feasibility_studiescondition_survey' => 'nullable',
            '*.awarding_authority' => 'required',
            '*.budgetary_provision_in_naira' => 'required',
            '*.preparation_of_designs_drawings_and_specifications' => 'nullable',
            '*.preparation_of_tender_documents' => 'required',
            '*.issued_no_objection_certificate' => 'required',
            '*.date_of_accounting_officer_approval' => 'nullable',
            '*.contract_type' => 'nullable',
            '*.project_commencement_date' => 'nullable',
            '*.if_strategic_asset_date_of_psst_approval' => 'nullable',
            '*.advertisement_date' => 'nullable',
            '*.bid_closing_opening_date' => 'nullable',
            '*.approval_of_evaluation_report' => 'nullable',
            '*.award_notification_date' => 'nullable',
            '*.contract_signing_date' => 'nullable',
            '*.completion_date' => 'nullable'
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
