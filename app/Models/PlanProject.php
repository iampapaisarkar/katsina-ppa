<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PlanProject extends Model
{
    use HasFactory;

    protected $casts = [
        'date_of_accounting_officer_approval' => 'date',
        'project_commencement_date' => 'date',
        'date_of_psst_approval' => 'date',
        'advertisement_date' => 'date',
        'bid_closing_opening_date' => 'date',
        'award_notification_date' => 'date',
        'contract_signing_date' => 'date',
        'completion_date' => 'date',
    ];

    protected $fillable = [
        'plan_id',
        'user_id',
        'name', 
        'description', 
        'process_type', 
        'category', 
        'procurement_method',
        'estimate_cost',
        'gl_code',
        'programme',
        'sub_programme',
        'quantities',
        'source_of_funds',
        'asset_location',
        'justification',
        'feasibility_studies',
        'awarding_authority',
        'budgetary_provision_in_naira',
        'preparation_of_designs',
        'preparation_of_tender_documents',
        'issued_no_objection_certificate',
        'date_of_accounting_officer_approval',
        'contract_type',
        'project_commencement_date',
        'date_of_psst_approval',
        'advertisement_date',
        'bid_closing_opening_date',
        'approval_of_evaluation_report',
        'award_notification_date',
        'contract_signing_date',
        'completion_date'
    ];

    public function setDateOfAccountingOfficerApprovalAttribute( $value ) {
        if($value){
            $this->attributes['date_of_accounting_officer_approval'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    public function setProjectCommencementDateAttribute( $value ) {
        if($value){
            $this->attributes['project_commencement_date'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    public function setDateOfPsstApprovalAttribute( $value ) {
        if($value){
            $this->attributes['date_of_psst_approval'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    public function setAdvertisementDateAttribute( $value ) {
        if($value){
            $this->attributes['advertisement_date'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    public function setBidClosingOpeningDateAttribute( $value ) {
        if($value){
            $this->attributes['bid_closing_opening_date'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    public function setAwardNotificationDateAttribute( $value ) {
        if($value){
            $this->attributes['award_notification_date'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    public function setContractSigningDateAttribute( $value ) {
        if($value){
            $this->attributes['contract_signing_date'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    public function setCompletionDateAttribute( $value ) {
        if($value){
            $this->attributes['completion_date'] = Carbon::parse(str_replace('/', '-', $value))->format('Y-m-d');
        }
        return $value;
    }

    

    public function getDateOfAccountingOfficerApprovalAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return $value;
    }

    public function getProjectCommencementDateAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function getDateOfPsstApprovalAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function getAdvertisementDateAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function getBidClosingOpeningDateAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function getAwardNotificationDateAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function getContractSigningDateAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function getCompletionDateAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

}
