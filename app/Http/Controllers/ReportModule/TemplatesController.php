<?php

namespace App\Http\Controllers\ReportModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ibnuhalimm\LaravelPdfToHtml\Facades\PdfToHtml;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Models\ReportMaker\TemplateMaker;
Use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\ReportMaker\templatefolder;
use Illuminate\Support\Facades\Validator;
class TemplatesController extends Controller
{
    
   public function templates($id)
   {
    $folder=templatefolder::find($id);
    $templates=TemplateMaker::where("TemplateFolder_id",$id)->orderBy('created_at', 'desc')->get();
    return view("ReportMaker.TemplateFolder.templates",compact(["templates","folder"]));
   }
  public function index($id)
  {
    $folder=templatefolder::find($id);
   return view("ReportMaker.TemplateMaker",compact("folder"));
  }

  public function TemplateFolders()
  {
    $folders=templatefolder::all();
    return view("ReportMaker.TemplateFolder.templatefolders",compact('folders'));
  }
  public function TemplateFoldersCreate()
  {
    return view("ReportMaker.TemplateFolder.createtemplatefolder");
  }

  public function storeTemplate(Request $request)
  {      
      // Check if the URL exists
      $url = $request->get('url');
      // Assuming you want to store it as a JSON file
      $name = $request->get('name');
      $pageName = $request->get('pageName');
      // Store in the database
      $template=new templatefolder();
      $template->Name=$name;
      $template->url=$url;
      $template->PageName=$pageName;
      $template->save();
       return redirect()->back()->with('success', 'Template stored successfully.');
    }
      //return redirect()->route('form')->with('success', 'Template stored successfully.');
  

  public function IdCard($folderid,$id=null)
  {
    $template_code=null;
    $templatename=null;
      $Tablecolumns = array(
        'labour' => array(array
        (
        'name' => 'string',
        'father_name' => 'string',
        'father_date_of_birth' => 'string',
        "mother_name"=>"string",
        "mother_date_of_birth"=>"string",
        "spouse_name"=>"string",
        "spouse_date_of_birth" =>"string",
        "designation"=>"string",
        "work_location"=>"string",
        "designation_work_profile_location"=>"string",
        "mobile_no"=>"string",
        "appointment_date"=>"string",
        "esci_no"=>"string",
        "aadhar_card_no"=>"string",
        "date_of_birth"=>"string",
        "age"=>"string",
        "height"=>"string",
        "weight"=>"string",
        "blood_group"=>"string",
        "swimmer"=>"string",
        "address"=>"string",
        "bank_name"=>"string",
        "account_no"=>"string",
        "ifsc_code"=>"string",
        "gmb_no"=>"string",
        "gmb_expiry_date"=>"string",
        "resigned"=>"string",
        "remarks"=>"string",
        "marital_status"=>"string",
        "driving_license"=>"string",
        "gas_cutter_training"=>"string",
        "uan_no"=>"string",
        "pan_no"=>"string",
        "address_pin_code"=>"string",

    ),'id'),
    'labour_neccessities' => array(array
        (
        'type' => 'string',
       ' name_of_training'=> 'string',
       'remarks'=> 'string',
       'expiry_date'=> 'string',
       

    ),'labour_id'),
    'labour_son_daughters'=> array(array
    (
      '  child1'=> 'string',
       ' child1_age'=> 'string',
        'child2'=> 'string',
        'child2_age'=> 'string',
        'child3'=> 'string',
       ' child3_age'=> 'string',
        'child4'=> 'string',
       ' child4_age'=> 'string',
        'child5'=> 'string',
        'child5_age'=> 'string',
       ' child6'=> 'string',
        'child6_age'=> 'string',
   

),'	labour_id '),

'companies'=> array(array
(
 'name'=> 'string'


),'	id '),

    );
    $folder=templatefolder::find($folderid);
    $templateedit=TemplateMaker::find($id);
    if($templateedit){
    $template_code=$templateedit->Html_Code;
    $templatename=$templateedit->name;
    }
    return view("ReportMaker.TemplateMaker",compact(["Tablecolumns","folder","template_code","templatename"]));
  }
  public function AdmissionForm($folderid,$id=null)
  {
    $template_code=null;
    $templatename=null;
    $Tablecolumns = array(
        'labour' => array(array('age', 'name', 'address'),'user_id')
    );
    $folder=templatefolder::find($folderid);
    $is24h_Restricted=$folder->is_Restricated;
   
    if ($is24h_Restricted == true) {
        $StartDate = $template->StartDate;
    
        if ($StartDate) {
            $currentTimestamp = time();
            $startDateTimestamp = strtotime($StartDate);
    
            // Check if the start date is more than 24 hours ago from the current time
            if ($currentTimestamp - $startDateTimestamp >= 24 * 3600) {
                $templateedit=TemplateMaker::find($id);
                if($templateedit){
                $template_code=$templateedit->Html_Code;
                $templatename=$templateedit->name;
                }
            }
            else{
                return redirect()->back()->with('error', 'Please edit the template after 24hrs ! ');
            }
        }
    }
   
    return view("ReportMaker.TemplateMaker",compact(["Tablecolumns","folder","template_code","templatename"]));
  }
  public function deletetemplate($id)
  {

    $template=TemplateMaker::find($id);
    $folderid=$template->TemplateFolder_id;
    $folder=templatefolder::find($folderid);
    $is24h_Restricted=$folder->is_Restricated;
   
    if ($is24h_Restricted == true) {
        $StartDate = $template->StartDate;
    
        if ($StartDate) {
            $currentTimestamp = time();
            $startDateTimestamp = strtotime($StartDate);
    
            // Check if the start date is more than 24 hours ago from the current time
            if ($currentTimestamp - $startDateTimestamp >= 24 * 3600) {
                if($template->IsActive!="Active")
                {
              $template->delete();
                }
                else{
                    return redirect()->back()->with('error', 'This is an Active Template! ');
                }
            }
            else{
                return redirect()->back()->with('error', 'Please delete the template after 24hrs ! ');
            }
        }
    }
    return redirect()->back()->with('success', 'Template Deleted Successfully !');

  }
 
  private function urlExists($url)
  {
      $headers = @get_headers($url);
      dd($headers);
      return $headers && strpos($headers[0], '200');
  }

  public function downloadPDF() 
  {
      $show="hello";
      $pdf = PDF::loadView('pdf', compact('show'));
      
      return $pdf->download('disney.pdf');
  }

  public function store(Request $request)
  {
      try {
          // Validate the incoming request data
          $validatedData = $request->validate([
              'htmlcode' => 'required', // Add any other validation rules as needed
          ]);

         
          $latestTemplate = TemplateMaker::where('TemplateFolder_id', 1)->latest()->first();

          if ($latestTemplate) {
              // Update the EndDate column (assuming EndDate is the column you want to update)
              $latestTemplate->update(['EndDate' => now(),'IsActive'=>"Deactivated"]); // Use the appropriate value for the EndDate
          }
          // Create a new instance of TemplateMaker
          $templatedata = new TemplateMaker();
  
          // Assign values from the validated data
          $templatedata->Html_Code = $validatedData['htmlcode'];
          $templatedata->name = $request->templatename;
          $templatedata->StartDate=Carbon::today();
          $templatedata->tablewithcolumn = json_encode($request->tablecolumn);
          $templatedata->TemplateFolder_id=$request->folderid;
          $templatedata->cover=json_encode($request->cover);
          $templatedata->IsActive="Active";
          // Save the data
          $templatedata->save();
  
          // Optionally, you can redirect the user or return a success response
          return response()->json(['message' => 'Data stored successfully'], 200);
      } catch (ValidationException $e) {
          // Handle validation errors
          return response()->json(['errors' => $e->errors()], 422);
      } catch (\Exception $e) {
          // Handle other types of exceptions or errors
          return response()->json(['error' => $e->getMessage()], 500);
      }
  }
  public function viewtemplate($id,$templateID)
  {
    $data=TemplateMaker::where('id',$templateID)->first();
     $Tablecolumns=$data->tablewithcolumn;
     $html=$data->Html_Code;
     $tableColumns = json_decode( $Tablecolumns, true);
     $arrcol=array();
     $arrans=array();
     $htmlcode="";
     $coloumns=array();

// Iterate through each table and fetch the specified columns
            foreach ($tableColumns as $table => $columns) {
                $allcols=array();
                // Check if the table exists in the database

                if (DB::getSchemaBuilder()->hasTable($table)) {
                    // Filter out only valid columns that exist in the table
                   foreach($columns[0] as $key=>$value)
                   {
                    array_push($allcols,$key);
                    
                   }
                   
                   $validColumns = array_intersect($allcols, DB::getSchemaBuilder()->getColumnListing($table));

                    // Fetch data only if valid columns are specified
                    if (!empty($validColumns)) {
                        $tableData = DB::table($table)->select($validColumns)->where($columns[1],$id)->first();
                        foreach($columns[0] as $col=>$val)
                        {
                           if($val=="boolean")
                           {
                             $colnameyes=$col."-yes";
                             $colnameno=$col."-no";
                          
                            $colans=$tableData->$col;
                            $empty="";
                            if($colans==1)
                            {
                                $colans="<i class='bi bi-check'></i>";
                                array_push($arrcol,$colnameyes);
                                array_push($arrans,$colans);
                                array_push($arrcol,$colnameno);
                                array_push($arrans,$empty);
                               
                            }
                            else{
                                $colans="<i class='bi bi-check'></i>"; 
                                array_push($arrcol,$colnameyes);
                                array_push($arrans,$empty);
                                array_push($arrcol,$colnameno);
                                array_push($arrans,$colans);
                            }
                           }
                           else{
                            $colname="%".$table."-".$col."%";
                            $colans=$tableData->$col;
                            array_push($arrans,$colans);
                            array_push($arrcol,$colname);

                           }
                        }
                        
                        $htmlcode = str_replace(
                        $arrcol,
                        $arrans,
                        $html
                        );
                        // Process $tableData as needed
                        // $validColumns will contain only columns that exist in the table
                    } else {
                       // dd("firsterror");
                       
                    }
                } else {
                   // dd("seconderror");
                    // Handle the case where the table does not exist
                    // You might want to log an error or take appropriate action
                }
            }

     return view("ReportMaker.pdf",compact("htmlcode"));

  }


}
