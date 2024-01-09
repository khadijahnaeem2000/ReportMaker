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
    $templates=TemplateMaker::where("TemplateFolder_id",$id)->get();
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
  

  public function IdCard($id)
  {
    $Tablecolumns = array(
        'labour' => array(array('age', 'name', 'address'),'user_id')
    );
    $folder=templatefolder::find($id);
    return view("ReportMaker.TemplateMaker",compact(["Tablecolumns","folder"]));
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

         
    
          // Create a new instance of TemplateMaker
          $templatedata = new TemplateMaker();
  
          // Assign values from the validated data
          $templatedata->Html_Code = $validatedData['htmlcode'];
          $templatedata->name = $request->templatename;
          $templatedata->StartDate=Carbon::today();
          $templatedata->tablewithcolumn = json_encode($request->tablecolumn);
          $templatedata->TemplateFolder_id=$request->folderid;
          $templatedata->cover=json_encode($request->cover);
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

// Iterate through each table and fetch the specified columns
            foreach ($tableColumns as $table => $columns) {
                // Check if the table exists in the database

                if (DB::getSchemaBuilder()->hasTable($table)) {
                    // Filter out only valid columns that exist in the table
                    $validColumns = array_intersect($columns[0], DB::getSchemaBuilder()->getColumnListing($table));

                    // Fetch data only if valid columns are specified
                    if (!empty($validColumns)) {
                        $tableData = DB::table($table)->select($validColumns)->where($columns[1],$id)->first();
                        foreach($columns[0] as $col)
                        {
                            $colname="%".$table."-".$col."%";
                            $colans=$tableData->$col;
                            array_push($arrans,$colans);
                            array_push($arrcol,$colname);
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
