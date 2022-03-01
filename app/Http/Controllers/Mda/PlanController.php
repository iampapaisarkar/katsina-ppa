<?php

namespace App\Http\Controllers\Mda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\PlanYearCheckRule;
use App\Imports\PlanImport;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use App\Models\PlanProject;
use Carbon\Carbon;
use DB;
use Excel;

class PlanController extends Controller
{
    public function plans(Request $request){

        $authUser = Auth::user();

        $plans = Plan::with('upload_by')->where('uploaded_by', $authUser->id);

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        $plans = $plans->latest()->paginate($perPage);

        return view('mda.plans.plans', compact('plans'));
    }

    public function planTemplateDownload(){
        $template = public_path('libs'. DIRECTORY_SEPARATOR . 'Katsina_BPP_Procurement_Plan_template.xlsx');
        return response()->download($template);
    }

    public function planUpload(Request $request){

        $this->validate($request, [
            'plan_year' => [
                'required', new PlanYearCheckRule()
            ],
            'plan_mda' => [
                'required'
            ],
            'plan_attachment' => [
                'required', 
                // 'mimes:xlsx, csv, xls'
            ]
        ]);

        $authUser = Auth::user();

        try {
            DB::beginTransaction();

            $plan = Plan::create([
                'year' => $request->plan_year,
                'description' => $request->plan_year . ' ' . 'Annual Procurement Plan',
                'uploaded_by' => $authUser->id,
                'status' => 'approved',
            ]);

            $import = new PlanImport;
            Excel::import($import, $request->file('plan_attachment'));

            $results = $import->getImportedData();

            foreach($results as $result){
                PlanProject::Create([
                    'plan_id' => $plan->id,
                    'user_id' => $authUser->id,
                    'status' => 'pending',
                    'name' => $result['project_name'], 
                    'description' => $result['description'], 
                    'process_type' => $result['process_type'], 
                    'category' => $result['category'], 
                    'procurement_method' => $result['procurement_disposal_method'],
                    'estimate_cost' => $result['estimated_cost_reserve_price'],
                    'gl_code' => $result['gl_code'],
                    'programme' => $result['programme'],
                    'sub_programme' => $result['sub_programme'],
                    'quantities' => $result['quantities'],
                    'source_of_funds' => $result['source_of_funds'],
                    'asset_location' => $result['asset_location'],
                    'justification' => $result['justification'],
                    'feasibility_studies' => $result['feasibility_studiescondition_survey'],
                    'awarding_authority' => $result['awarding_authority'],
                    'budgetary_provision_in_naira' => $result['budgetary_provision_in_naira'],
                    'preparation_of_designs' => $result['preparation_of_designs_drawings_and_specifications'],
                    'preparation_of_tender_documents' => $result['preparation_of_tender_documents'],
                    'issued_no_objection_certificate' => $result['issued_no_objection_certificate'],
                    'date_of_accounting_officer_approval' => $result['date_of_accounting_officer_approval'],
                    'contract_type' => $result['contract_type'],
                    'project_commencement_date' => $result['project_commencement_date'],
                    'date_of_psst_approval' => $result['if_strategic_asset_date_of_psst_approval'],
                    'advertisement_date' => $result['advertisement_date'],
                    'bid_closing_opening_date' => $result['bid_closing_opening_date'],
                    'approval_of_evaluation_report' => $result['approval_of_evaluation_report'],
                    'award_notification_date' => $result['award_notification_date'],
                    'contract_signing_date' => $result['contract_signing_date'],
                    'completion_date' => $result['completion_date']
                ]);
            }

            DB::commit();

            return back()->withSuccess('Plans uploaded successfully done');

        }catch(Exception $e) {
            DB::rollback();
            return back()->withError('There is something error, please try after some time');
        }  
    }

    public function projects(Request $request, $planId){

        $authUser = Auth::user();

        $plan = Plan::with('upload_by')->where(['uploaded_by' => $authUser->id, 'id' => $planId])->first();

        $projects = PlanProject::with('user')->where(['user_id' => $authUser->id, 'plan_id' => $planId]);

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        $projects = $projects->latest()->paginate($perPage);

        return view('mda.plans.projects', compact('plan', 'projects'));
    }

    public function projectDetails(){
        return view('mda.plans.project-details');
    }
}
