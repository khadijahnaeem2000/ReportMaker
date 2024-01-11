<!DOCTYPE html>
<html lang="en-US">

@include('ReportMaker.layout.header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
  
    <style>
      
        #id-card-field{
          width:8.3in;
          height:11in;
          position:relative;
          background:#6f6969;
         
        }
        #id-card-field .field-item{
          position:absolute;
          margin: 3px 5px;
        }
        #id-card-field .field-item.focus::before{
          content:"0";
          position:relative;
          width:100%;
          height:100%;
          border: 1px pink;
        }
        #id-card-field .field-item[data-type="textfield"]{
          padding:3px 5px;
        }
        #id-card-field .field-item.img{
          width:50px;
          height:50px;
        }
        #id-card-field .field-item>img{
          width:100%;
          height:100%;
          object-fit:fill;
          object-position:center center;
        }

        #id-card-field .field-item-table{
          position:absolute;
          margin: 3px 5px;
        }
        #id-card-field .field-item-table.focus::before{
          content:"0";
          position:relative;
          width:100%;
          height:100%;
          border: 1px pink;
        }
        #id-card-field .field-item-table[data-type="textfield"]{
          padding:3px 5px;
        }
        #id-card-field .field-item-table.img{
          width:50px;
          height:50px;
        }
        #id-card-field .field-item-table>img{
          width:100%;
          height:100%;
          object-fit:fill;
          object-position:center center;
        }
        .remove_field{
          cursor:pointer;
        }
        #upload-button {
          width: 150px;
          display: block;
          margin: 20px auto;
        }
      
        #pdf-main-container {
          width: 400px;
          margin: 20px auto;
        }
      
        #pdf-contents {
          display: none;
        }
      
        #pdf-meta {
          overflow: hidden;
          margin: 0 0 20px 0;
        }
      
        #pdf-canvas {
          border: 1px solid rgba(0,0,0,0.2);
          box-sizing: border-box;
          display: none;
        }
      
        #page-loader {
          height: 100px;
          line-height: 100px;
          text-align: center;
          display: none;
          color: #999999;
          font-size: 13px;
        }
        .padding{
          margin-top:35px ;
        
        }
        .btn-lg{
          width: 80%;
         
        }
      .margin{
        margin-right:5px ;
      }
      .child {
        width: 150px;
        height: 80px;
        position: absolute;
        background-size: cover;
        
    }

    .ui-resizable-ne,
    .ui-resizable-se,
    .ui-resizable-nw,
    .ui-resizable-sw,
    .ui-resizable-n,
    .ui-resizable-s,
    .ui-resizable-w,
    .ui-resizable-e {
        background: white;
        border: 1px solid black;
        width: 9px !important;
        height: 9px !important;
    }

    .ui-resizable-se {
        background-image: none !important;
        right: -5px !important;
        bottom: -5px !important;
    }

    .ui-resizable-n,
    .ui-resizable-s {
        left: 50% !important;
        margin-left: -6px !important;
    }

    .ui-resizable-e,
    .ui-resizable-w {
        top: 50% !important;
        margin-top: -6px !important;
    }
    .delete-icon {
        position: absolute;
        top: 0;
        right: 0;
        cursor: pointer;
        color: white;
        background: red;
        padding: 3px;
        font-size: 12px;
    }
      </style>
</head>

<body id="palleon" class="backend">
    <!-- Page Loader START -->
   
    <!-- Page Loader END -->
    <!-- Top Bar START -->

    <!-- Top Bar END -->
    <!-- Icon Menu START -->
    <div id="palleon-icon-menu">
    <button  type="button" class="palleon-icon-menu-btn" >
           <a class="palleon-btn primary">Back</a>
        </button>
    <button id="palleon-btn-adjust" type="button" class="palleon-icon-menu-btn active" data-target="#palleon-adjust">
            <span class="material-icons">tune</span><span class="palleon-icon-menu-title">Home</span>
        </button>
        <button id="palleon-btn-text" type="button" class="palleon-icon-menu-btn" data-target="#palleon-text">
            <span class="material-icons">title</span><span class="palleon-icon-menu-title">Text</span>
        </button>
        <button id="palleon-btn-image" type="button" class="palleon-icon-menu-btn" data-target="#palleon-image">
            <span class="material-icons">add_photo_alternate</span><span class="palleon-icon-menu-title">Image</span>
        </button>
        <button id="palleon-btn-shapes" type="button" class="palleon-icon-menu-btn" data-target="#palleon-shapes">
            <span class="material-icons">category</span><span class="palleon-icon-menu-title">Database</span>
        </button>
        <button id="palleon-btn-draw" type="button" class="palleon-icon-menu-btn" data-target="#palleon-draw">
            <span class="material-icons">brush</span><span class="palleon-icon-menu-title">Brushes</span>
        </button>
        <button  type="button" class="palleon-icon-menu-btn">
        <button class="btn btn-sm btn-primary mr-2" id="temform">Save</button>
        <a class="btn btn-sm btn-warning mr-2" id="clear">Clear</a>
        </button>
       
        
        <button id="palleon-btn-settings" type="button" class="palleon-icon-menu-btn stick-to-bottom" data-target="#palleon-settings">
            <span class="material-icons">settings</span><span class="palleon-icon-menu-title">Settings</span>
        </button>
       
      
        
    </div>
   
    <div id="palleon-icon-panel">
        <div id="palleon-icon-panel-inner">
        <input type="hidden" name="template_image" id="template_image">
            <!-- Text START -->
            <div id="palleon-adjust" class="palleon-icon-panel-content">
                <div id="palleon-adjust" class="palleon-icon-panel-content">
                        <a class="btn zoom"><i class="fas fa-search-plus"></i></a>
                        <a class="btn zoom-out"><i class="fas fa-search-minus"></i></a>
                        <a class="btn zoom-init"><i class="fas fa-recycle"></i></a>
                </div>  
                <div class="palleon-file-field">
                    <label for="" class="control-label">TemplateName</label>
                    <input type="text" name="templatename" value="{{$templatename}}"id="templatename" class="palleon-form-field" required/>
                   
                 </div> 
                <div class="palleon-file-field">
                    <label for="" class="control-label">Background Image or Pdf</label>
                    <input type="file" name="img_src" id="file-to-upload" class="palleon-hidden-file" onchange="displayImg(this, $(this))" />
                    <label for="file-to-upload" class="palleon-btn primary palleon-lg-btn btn-full">
                        <span class="material-icons">upload</span><span>Upload from computer</span>
                    </label>
                 </div>          
            </div>
            <div id="palleon-text" class="palleon-icon-panel-content panel-hide">
                <!-- Add Text Button -->
                <div class="form-group">
                    <select id="select_field" class="custom-select custom-select-sm rounded-0" style="display:none;">
                      <option value="textfield">Text Field</option>
                    </select>
                  </div>
                  <button id="add_field" type="button" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">add_circle</span>Add Text</button>
                    </br>
                   
                  <div class="container text-center">
                    <div id="field-form"></div>
                      </div>
           
            </div>
            <!-- Text END -->
            <!-- Image START -->
            <div id="palleon-image" class="palleon-icon-panel-content panel-hide">
                
                <div class="palleon-tabs">
                   
                <div class="form-group">
                    <select id="select_image" class="custom-select custom-select-sm rounded-0" style="display:none;">
                      <option value="image">Image</option>
                    </select>
                  </div>
                  <button id="add_image" type="button" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">add_circle</span>Add Image Overlay</button>
                    </br>
                    <input type="file" name="palleon-file" id="palleon-img-upload"  accept="image/png, image/jpeg" />
                  <div class="container text-center">
                    <div id="field-form-image"></div>
                      </div>
                </div>
            </div>
            <!-- Image END -->
            <!-- Shapes START -->
            <div id="palleon-shapes" class="palleon-icon-panel-content panel-hide">
                 <!-- Select Shape -->
                <div class="palleon-select-btn-set">
                      <select id="palleon-shape-select" class="palleon-select" autocomplete="off">
                        <option value="none" disabled selected>Select Table</option>
                          @foreach($Tablecolumns as $tableName => $tableColumns)
                              <option value="{{ htmlspecialchars($tableName) }}">{{ htmlspecialchars($tableName) }}</option>
                          @endforeach
                       </select>  
                       <select id="column-values-select" class="palleon-select" autocomplete="off" disabled>
                          <option value="none" disabled selected>Select Column</option>
                      </select>                  
                        <button id="palleon-shape" class="palleon-btn primary" ><span class="material-icons">add_circle</span></button>
                   
                </div>
                <div class="container text-center">
                    <div id="field-form-table"></div>
                      </div>
               
            </div>
            <!-- Drawing START -->
            <div id="palleon-draw" class="palleon-icon-panel-content panel-hide">
                <!-- Start Drawing Button -->
                <div class="palleon-btn-set">
                    <button id="palleon-draw-btn" type="button" class="palleon-btn primary palleon-lg-btn"><span class="material-icons">edit</span>Start Drawing</button>
                    <button id="palleon-draw-undo" type="button" class="palleon-btn palleon-lg-btn" autocomplete="off" title="Undo" disabled><span class="material-icons">undo</span></button>
                </div>
                <!-- Drawing Setings -->
                <div id="palleon-draw-settings" class="palleon-sub-settings">
                    <div class="notice notice-info">You can draw a straight line by pressing the shift key.</div>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Brush Type</label>
                        <div class="palleon-control">
                            <select id="palleon-brush-select" class="palleon-select" autocomplete="off">
                                <option value="pencil" selected>Pencil</option>
                                <option value="circle">Circle</option>
                                <option value="spray">Spray</option>
                                <option value="hline">H-line Pattern</option>
                                <option value="vline">V-line Pattern</option>
                                <option value="square">Square Pattern</option>
                                <option value="erase">Erase BG Image</option>
                            </select>
                        </div>
                    </div>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Brush Width</label>
                        <div class="palleon-control">
                            <input id="brush-width" class="palleon-form-field numeric-field" type="number" value="50" autocomplete="off" data-min="1" data-max="1000" data-step="1">
                        </div>
                    </div>
                    <div id="palleon-brush-pattern-width" class="palleon-control-wrap">
                        <label class="palleon-control-label">Pattern Width</label>
                        <div class="palleon-control">
                            <input id="brush-pattern-width" class="palleon-form-field numeric-field" type="number" value="10" autocomplete="off" data-min="1" data-max="1000" data-step="1">
                        </div>
                    </div>
                    <div id="palleon-brush-pattern-distance" class="palleon-control-wrap">
                        <label class="palleon-control-label">Pattern Distance</label>
                        <div class="palleon-control">
                            <input id="brush-pattern-distance" class="palleon-form-field numeric-field" type="number" value="5" autocomplete="off" data-min="1" data-max="1000" data-step="1">
                        </div>
                    </div>
                    <div id="not-erase-brush">
                        <div class="palleon-control-wrap control-text-color">
                            <label class="palleon-control-label">Brush Color</label>
                            <div class="palleon-control">
                                <input id="brush-color" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="#ffffff" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap conditional">
                            <label class="palleon-control-label">Brush Shadow</label>
                            <div class="palleon-control palleon-toggle-control">
                                <label class="palleon-toggle">
                                    <input id="palleon-brush-shadow" class="palleon-toggle-checkbox" data-conditional="#line-shadow-settings" type="checkbox" autocomplete="off" />
                                    <div class="palleon-toggle-switch"></div>
                                </label>
                            </div>
                        </div>
                        <div id="line-shadow-settings" class="d-none conditional-settings">
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Blur</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-width" class="palleon-form-field" type="number" value="5" data-min="0" data-max="1000" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Offset X</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-shadow-offset-x" class="palleon-form-field" type="number" value="5" data-min="0" data-max="100" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Offset Y</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-shadow-offset-y" class="palleon-form-field" type="number" value="5" data-min="0" data-max="100" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap control-text-color">
                                <label class="palleon-control-label">Color</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-color" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="#000000" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Drawing END -->
            <!-- Settings START -->
            
            <!-- Settings END -->
        </div>
    </div>
    <!-- Body START -->
    <div id="palleon-body">
        <div class="palleon-wrap">
           
                    
                        <div id="mainframe" style="padding-left: 20%;">
                        @if($template_code==null)
                            <div  id="id-card-field" class='border border-dark target parent' > 
                          </div>
                          @else
                        <?php  echo $template_code;?>
                          @endif
                        </div>
                      </div>
                    <div id="palleon-canvas-wrap">
                        <!-- Canvas Loader -->
                        <div id="palleon-canvas-overlay"></div>
                        <div id="palleon-canvas-loader">
                            <div class="palleon-loader"></div>
                        </div>
                        <!-- Canvas - Don't remove canvas element! -->
                        <canvas id="pdf-canvas" width="2480"></canvas>
                    </div>
                    
                    <!-- Zoom & Pan Buttons -->
                  
               
                <!-- Canvas Content END -->
           
        </div>
    </div>
    <!-- Body END -->
    <!-- Toggle Right Button -->
    <div id="palleon-right-col">
        <h6 class="palleon-layers-title"><span class="material-icons">layers</span>History</h6>
       
        <!-- Layer list - Don't remove it! -->
        <ul id="palleon-layers" class="ui-sortable"></ul>
        <!-- Bulk delete layers -->
        
    </div>
   
    <!-- Right Column END -->
    <!-- Modal History START -->
    <div id="modal-history" class="palleon-modal" style="visibility:visible">
        <div class="palleon-modal-close" data-target="#modal-history"><span class="material-icons">close</span></div>
        <div class="palleon-modal-wrap">
            <div class="palleon-modal-inner">
                <div class="palleon-modal-bg">
                    <h3 class="palleon-history-title">History<button id="palleon-clear-history" type="button"
                            class="palleon-btn danger"><span class="material-icons">clear</span>Clear History</button>
                    </h3>
                    <!-- History List - Don't remove ul element -->
                    <ul id="palleon-history-list" class="palleon-template-list" data-max="50"></ul>
                    <p class="palleon-history-count">Showing your last <span id="palleon-history-count"></span> actions.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal History END -->
    <!-- Scripts -->
    <!-- <script src="{{asset('ReportMaker/js/jquery.min.js')}}"></script> -->
    <script src="{{asset('ReportMaker/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('ReportMaker/js/fabric.min.js')}}"></script>
    <script src="{{asset('ReportMaker/js/plugins.min.js')}}"></script>
    <script src="{{asset('ReportMaker/js/palleon.min.js')}}"></script>
     <!-- Canvas Ruler -->

   <script>

$(document).ready(function() {
    var palleonShapeSelect = $('#palleon-shape-select');
    var columnValuesSelect = $('#column-values-select');

    palleonShapeSelect.change(function() {
        var selectedTable = $(this).val();

        // Clear previous options
        columnValuesSelect.empty();

        if (selectedTable !== 'none') {
            var selectedTableColumns = {!! json_encode($Tablecolumns) !!}[selectedTable][0];

            if (selectedTableColumns && Object.keys(selectedTableColumns).length > 0) {
                Object.keys(selectedTableColumns).forEach(function(columnName) {
                    var dataType = selectedTableColumns[columnName];

                    columnValuesSelect.append($('<option>', {
                        value: selectedTable + "-" + columnName,
                        text: columnName,
                        'data-type': dataType
                    }));
                });

                // Enable the second dropdown
                columnValuesSelect.prop('disabled', false);
            } else {
                console.error('Selected table has no columns.');
            }
        } else {
            // Disable the second dropdown if "none" is chosen
            columnValuesSelect.prop('disabled', true);
        }
    });
});


</script>
    <script src="{{asset('ReportMaker/js/custom.js')}}"></script>



    
    <!-- Translation Strings -->
     <script>
       foo();
        var __PDF_DOC,
         __CURRENT_PAGE,
         __TOTAL_PAGES,
         __PAGE_RENDERING_IN_PROGRESS = 0,
         __CANVAS = $('#pdf-canvas').get(0),
         __CANVAS_CTX = __CANVAS.getContext('2d');
   
         var zoom = 1;
           
           $('.zoom').on('click', function(){
               zoom += 0.1;
               $('.target').css('transform', 'scale(' + zoom + ')');
           });
           $('.zoom-init').on('click', function(){
               zoom = 1;
               $('.target').css('transform', 'scale(' + zoom + ')');
           });
           $('.zoom-out').on('click', function(){
               zoom -= 0.1;
               $('.target').css('transform', 'scale(' + zoom + ')');
           });
   
               $(function(){
                 $('[name="height"],[name="width"]').keyup(function(){
                   var height = $('[name="height"]').val();
                   var width = $('[name="width"]').val();
                   $('#id-card-field').css({height:height+'in',width:width+'in'})
                 })
               })
   
               function displayImg(input,_this)
               {
                           if (input.files && input.files[0]) {
                           var reader = new FileReader();
                           reader.onload = function (e) {
                           var data = e.target.result;
                           var fileType = input.files[0].type;
   
                           if (fileType.includes('image')) {
                               // Handle image background
                               $('#id-card-field').css({
                                 'background': 'url(' + data + ')',
                                 'background-repeat': 'no-repeat',
                                 'background-size': 'cover'
                               });
                               $('[name="template_image"]').val(data)
                           } else if (fileType.includes('pdf')) {
                             showPDF(URL.createObjectURL($("#file-to-upload").get(0).files[0]));
                             
                           } else {
                               // Unsupported file type
                               alert('Unsupported file type.');
                           }
                         };
   
                         reader.readAsDataURL(input.files[0]);
                        
                     }
               }
               
   
               $('#template-form').submit(function(e)
               {
                 let _token = '{{csrf_token()}}';
                   e.preventDefault();
                   var _this = $(this)
                   
           
                   $('#form-field').html('')
                   var wait_until =  new Promise((resolve, reject) => {
                     $('[name="template_code"]').val($('#id-card-field').parent().html())
                       html2canvas(document.getElementById('id-card-field')).then(function(canvas) {
                         // console.log(canvas.toDataURL('image/png'))
                         $('[name="template_image"]').val(canvas.toDataURL('image/png'))
                       resolve();
                         // document.getElementById('preview').appendChild(canvas);
                       });
                     });
                       wait_until.then(function(){
                         var cardFieldContent = document.getElementById('mainframe').innerHTML;
                         console.log(cardFieldContent);
                       $.ajax({
                         url:"{{route('store')}}",
                         data: {htmlcode: cardFieldContent, _token:_token},
                         method: 'POST', 
                         error:err=>{
                             console.log(err)
                           },
                         success:function(resp){
                           alert("done");
                         }
                       })
                     })
               })
   
               $(function(){
                 $('.select2').select2()
                 $('.select2-selection').addClass('form-control form-control-sm rounded-0 rounded-0')
   
                 $('#add_field').click(function(){
                   var _ft = $('#select_field').val()
                   var _this = $(this)
                     show_form(_ft,_this)
                 })
                 $('#add_image').click(function(){
                   var _ft = $('#select_image').val()
                   var _this = $(this)
                     show_form2(_ft,_this)
                 })
                 $('#palleon-shape').click(function(){
                  var selectedOption = $('#column-values-select option:selected');
                   var _ft = $('#column-values-select').val()
                   var _this = $(this)
                   var dataType = selectedOption.data('type');
                     show_form_tables(_ft,_this,dataType)
                 })

                 $('#temform').click(function(){
                  let _token = '{{csrf_token()}}';
                  var cardFieldContent = document.getElementById('mainframe').innerHTML;
                  var templatecode = document.getElementById('id-card-field').innerHTML;
                 var coverimage=document.getElementById('template_image').value;
                         console.log(cardFieldContent);
                         var templatename = document.getElementById('templatename').value;
                         if(templatename!="")
                         {
                          if (templatecode.trim() !== "") 
                          {
                         var table = <?php echo json_encode($Tablecolumns); ?>;
                         var folderid=<?php echo $folder->id ?>;
                       $.ajax({
                         url:"{{route('store')}}",
                         data: {htmlcode: cardFieldContent,tablecolumn:table, _token:_token,templatename:templatename,folderid:folderid,cover:coverimage},
                         method: 'POST', 
                         error:err=>{
                             console.log(err)
                           },
                         success:function(resp){
                           alert("done");
                         }
                       })
                      }
                    }
                      else{
                        alert("please enter a Template Name!");
                      }
                 })
               })
   
               function show_form(_ft,_this,__id = ''){
                 if (_ft == 'textfield') {
                     var id = (__id != "" ? __id : "TextField" + ($('#id-card-field .field-item').length + 1))
                     var fg = $("<div class='form-group pb-1 mb-1 border-bottom border-dark form-item' data-id='" + id + "'>");
                     var _title = id;
                     var input;
                   
                     fg.append("<label class='control-label'>" + _title + "<a class='badge badge-danger ml-2 remove_field' data-id='" + id + "'> Remove</a></label>");
   
                     // Field ID NAME
                     input = $("<div class='row'>");
                     input.append('<input type="hidden" class="form-control form-control-sm rounded-0 col-7" name="text_value" data-id="' + id + '" value="' + id + '"/>');
                     fg.append(input);
   
                     // Text
                    //  input.append('<div class="clearfix col-12 mb-2"></div>');
                    //  input.append('<label class="col-4 col-form-label">Text</label><input class="form-control form-control-sm rounded-0 col-7" name="text_value" data-id="' + id + '"/>');
                    //  input.append('<div class="clearfix col-12 mb-2"></div>');


                     input.append('<div class="palleon-text-wrap">');
                    
                     input.append('<div class="palleon-control-wrap label-block"><div class="palleon-control"> <textarea id="palleon-text-input" class="palleon-form-field" rows="2" autocomplete="off" name="text_value" data-id="' + id + '">Enter Your Text Here</textarea></div></div>');
                     // Font Color
                     input.append('<div id="text-fill-color" class="palleon-control-wrap"><label class="palleon-control-label">Color</label><div class="palleon-control"> <input id="palleon-text-color" type="text" class="palleon-colorpicker disallow-empty colorpicker1" autocomplete="off"  name="font_color" data-id="' + id + '" /></div></div>');
                     input.append('<div class="clearfix col-12 mb-2"></div>');
                    // Width
                    input.append('<label class="palleon-control-label">FontSize</label><div class="palleon-control"><input  class="palleon-form-field" type="number" step="any" name="size[]" data-size="width" data-id="' + id + '"/></div></div>');
                     input.append('<div class="clearfix col-12 mb-2"></div>'); 
                     // Font Style
                     input.append('<div class="palleon-control-wrap"> <label class="palleon-control-label">Font Style</label><div class="palleon-control"> <label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="bold" name="style" data-id="' + id + '"/> <b>Bold</b></label><label class="palleon-control-label"> <input type="checkbox" class="palleon-form-field" value="italic" name="style" data-id="' + id + '"/> <i>Italic</i></label></div></div>');
                    
                     input.append('<div class="clearfix col-12 mb-2"></div>'); 
                     
                       // Border Color
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Border Color</label><div class="palleon-control"> <input class="palleon-form-field colorpicker1" name="border_color" data-id="' + id + '"/></div></div>');
                     input.append('<div class="clearfix col-12 mb-2"></div>');
                     // Borders
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Border</label> <div class="palleon-control"> <label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="top" name="border" data-id="' + id + '"/><b>Top</b></label><label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="bottom" name="border" data-id="' + id + '"/><b>Bottom</b></label><label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="left" name="border" data-id="' + id + '"/><b>Left</b></label><label class="palleon-control-label"> <input type="checkbox" class="palleon-form-field" value="right" name="border" data-id="' + id + '"/><b>Right</b></label> </div></div>');
                   
                     input.append('<div class="clearfix col-12 mb-2"></div>');
       
   
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Position-Right</label><div class="palleon-control"><input class="palleon-form-field" type="number" step="any" name="position[]"  data-pos="right" data-id="' + id + '"/></div></div>');
                    
                     // Element Position
                    
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Position-Left</label><div class="palleon-control"><input class="palleon-form-field" type="number" step="any" name="position[]" data-pos="left" data-id="' + id + '"/></div></div>');
                     input.append('</div>');
                     fg.append(input);
   
                     is_form_exists = $("#field-form .form-item[data-id='" + id + "']").length;
   
                     if (__id == "" || (__id != "" && is_form_exists <= 0))
                         $("#field-form").html(fg);
   
                     if (__id != "") {
                         // Additional logic for updating form fields based on existing data
                         // ...
   
                         data_func();  // Assuming this is a function to handle your data
                       }
   
                     // Field Item
                     var item = $('<div class="field-item" data-type="' + _ft + '">');
                     item.attr('id', id);
                     item.text(id);
   
                     if (__id == '') {
                         $('#id-card-field').append(item);
                         var newListItem = document.createElement("li");

                                // You can add content or attributes to the new list item if needed
                                newListItem.textContent = "-"+id+" Added"; // Replace with the desired content

                                // Get the reference to the ul element with the id "palleon-layers"
                                var layersUl = document.getElementById("palleon-layers");

                                      // Append the new list item to the ul element
                            layersUl.appendChild(newListItem);
                     }
   
                     data_func();  // Assuming this is a function to handle your data
                   }
               }
   
   
               function show_form2(_ft,_this,__id = ''){
              
                           var id = (__id != "" ? __id : "ImageField" + ($('#id-card-field .child').length + 1));
                           var fg = $("<div class='form-group pb-1 mb-1 border-bottom border-dark form-item' data-id='" + id + "'>");
                           var _title = id;
                           var input;
                           fg.append("<label class='control-label'>" + _title + "</label>");
   
                           // Field ID NAME
                           input = $("<div class='row'>");
                           input.find('input').val(id);
                           fg.append(input);
   
                           // File input
                           input.append('<label class="palleon-control-label">Select Image</label><input type="file" class="palleon-form-field" name="filename" data-id="' + id + '"/>');
                           input.append('<div class="clearfix col-12 mb-2"></div>');
   
                    //        input.append('<label class="palleon-control-label">Image Size</label><div class="row"><div class="col-4"><input class="palleon-form-field" type="number" step="any" name="size-image[]" data-size="height" data-id="' + id + '"/><label class="palleon-control-label">Height (%)</label></div><div class="col-4"><input class="palleon-form-field" type="number" step="any" name="size-image[]" data-size="width" data-id="' + id + '"/><label class="col-form-label">Width (%)</label></div></div>');
                    //        input.append('<div class="clearfix col-12 mb-2"></div>');
                    //        // Borders
                    //        input.append('<label class="palleon-control-label">Border</label><div class="col-8"><label class="form-check-label d-flex align-items-center"><input type="checkbox" class="mr-2 form-check-input" value="top" name="border-image" data-id="' + id + '"/> Top</label><label class="form-check-label d-flex align-items-center"><input type="checkbox" class="mr-2 form-check-input" value="bottom" name="border-image" data-id="' + id + '"/> Bottom</label><label class="form-check-label d-flex align-items-center"><input type="checkbox" class="mr-2 form-check-input" value="left" name="border-image" data-id="' + id + '"/> Left</label><label class="form-check-label d-flex align-items-center"><input type="checkbox" class="mr-2 form-check-input" value="right" name="border-image" data-id="' + id + '"/> Right</label></div>');
   
                    //        // Border Color
                    //        input.append('<label class="palleon-control-label">Border Color</label><input class="palleon-form-field colorpicker2" name="border_color-image" data-id="' + id + '"/>');
                    //        input.append('<div class="clearfix col-12 mb-2"></div>');
   
                    //        // Element Position
                    //        input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Position-Right</label><div class="palleon-control"><input class="palleon-form-field" type="number" step="any" name="position-image[]"  data-pos="top" data-id="' + id + '"/></div></div>');
                    
                    // // Element Position
                   
                    // input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Position-Left</label><div class="palleon-control"><input class="palleon-form-field" type="number" step="any" name="position-image[]" data-pos="left" data-id="' + id + '"/></div></div>');
                    //        input.append('<div class="clearfix col-12 mb-2"></div>');
   
                           fg.append(input);
   
                           is_form_exists = $("#field-form-image .form-item[data-id='" + id + "']").length;
   
                           if (__id == "" || (__id != "" && is_form_exists <= 0))
                               $("#field-form-image").html(fg);
   
                           if (__id != "") {
                               // Additional logic for updating form fields based on existing data
                               // ...
   
                              // data_func2();  // Assuming this is a function to handle your data
                           }
   
                           // field Item
                           var item = $('<div class="field-item img " data-type="' + id + '">');
                           item.attr('id', id);
                           item.append("<img  accept='image/*' data-id='" + id + "' src=''/>");
   
                           if (__id == '') {
                               $('#id-card-field').append(item);
                               var newListItem = document.createElement("li");
                                 // You can add content or attributes to the new list item if needed
                                 newListItem.textContent = "-"+id+" Added"; // Replace with the desired content

                                  // Get the reference to the ul element with the id "palleon-layers"
                                  var layersUl = document.getElementById("palleon-layers");

                                        // Append the new list item to the ul element
                                  layersUl.appendChild(newListItem);
                           }
   
                           data_func2();  // Assuming this is a function to handle your data
                  
               }
   
               function data_func(){
                 $('.colorpicker1').colorpicker({format: 'hex'})
                 $('[name="font_color"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var color = $(this).val()
                   $('#'+el_id).css({"color":color});
                 })
                 $('[name="border"]').change(function(){
                   var pos = $(this).val()
                   var el_id = $(this).attr('data-id');
                   var _style = "border-"+pos;
                   if($(this).is(":checked") == true){
                     $('#'+el_id).css(_style,"1px solid");
                   }else{
                     $('#'+el_id).css(_style,"none");
                   }
                 })
                 $('[name="style"]').change(function(){
                   var val = $(this).val()
                   var style = $(this).attr('name')
                   var el_id = $(this).attr('data-id');
                   if($(this).is(":checked") == true){
                     if(val == 'bold')
                       $('#'+el_id).css("font-weight","bolder");
                     else
                       $('#'+el_id).css("font-style","italic");
                   }else{
                     if(val == 'bold')
                       $('#'+el_id).css("font-weight","unset");
                     else
                       $('#'+el_id).css("font-style","unset");
                   }
                 })
                 $('[name="border_color"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var color = $(this).val()
                   $('#'+el_id).css("border-color",color);
                 })
                 $('[name="text_value"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var txt = $(this).val()
                   $('#'+el_id).text(txt);
                 })
                 $('[name="position[]"]').on('input keypress keyup change',function(){
                   var el_id = $(this).attr('data-id');
                   var pos = $(this).attr('data-pos')
                   var val = $(this).val()
                   $('#'+el_id).css(pos,val+"%");
   
                 })
                 $('[name="size[]"]').on('input keypress keyup change',function(){
                   var el_id = $(this).attr('data-id');
                   var pos = $(this).attr('font-size')
                   var val = $(this).val()
                   $('#'+el_id).css('font-size',val+"px");
   
                 })
                 $('[name="size-image[]"]').on('input keypress keyup change',function(){
                	var el_id = $(this).attr('data-id');
                  var pos = $(this).attr('data-size')
                  var val = $(this).val()
                  $('#'+el_id).css(pos,val+"%");
   
                 })
                 $('[name="text_align"]').change(function(){
                   var el_id = $(this).attr('data-id');
                   var val = $(this).val()
                   $('#'+el_id).css('text-align',val);
   
                 })
                 $('[name="filename"]').change(function(){
                   var id = $(this).attr('data-id')
                   input = document.querySelector('input[name="filename"][data-id="'+id+'"]')
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();
                       reader.onload = function (e) {
                     var _base64, type;
                     var data = e.target.result
                       data = data.split(';base64,')
                         $('img[data-id="'+id+'"]').attr("src",e.target.result);
                       }
   
                     reader.readAsDataURL(input.files[0]);
                   }
                 })
                 $('.remove_field').click(function(){
                   var id = $(this).attr('data-id')
                   $('.field-item#'+id).remove()
                   $('#field-form').html('')
                 }) 
                 $('.field-item').on('mousedown',function(){
                   var _ft = $(this).attr('data-type')
                   var _this = $(this)
                   var palleonText = document.getElementById('palleon-text');
                    // Make the #palleon-text element visible
                    palleonText.classList.remove('panel-hide');
                    var palleonImage = document.getElementById('palleon-image');
                    // Make the #palleon-text element visible
                    palleonImage.classList.add('panel-hide');
                    var palleonShapes = document.getElementById('palleon-shapes');
                    // Make the #palleon-text element visible
                    palleonShapes.classList.add('panel-hide');
                   show_form(_ft,_this,_this.attr('id'))
                 if(_this.hasClass('ui-draggable') == false){
                   _this.draggable({
                     containment: "parent",
                     stop: function( event, ui ) {
                       var id = event.target.id 
                       var parent = $('#'+id).parent()
                       var p_height = parent.height()
                       var p_width = parent.width()
                       var pos = {};
                       var nt ,nl;
                       style =$('#'+id).attr('style')
                       style = style.replace(/ /g,'')
                       style = style.split(";")
                       Object.keys(style).map(k=>{
                         if(style[k] != ''){
                           prop = style[k].split(':')
                           prop1 = prop[0];
                           prop2 = !!prop[1] ? prop[1] : '';
                           pos[prop1] = prop2
                         }
                       })
                       var left = !!pos.left ? (pos.left).replace("px",'') : 0;
                       var top = !!pos.top ? (pos.top).replace("px",'') : 0;
                       nt = ((parseFloat(top)/parseFloat(p_height)) * 100)
                       nl = ((parseFloat(left)/parseFloat(p_width)) * 100)
                       $('input[name="position[]"][data-pos="top"]').val(nt).trigger("change")
                       $('input[name="position[]"][data-pos="left"]').val(nl).trigger("change")
                     }
                   })
                 }
               })
               }

               function show_form_tables(_ft,_this,dataType,__id = ''){
                if(dataType=="boolean")      
                 {
                  var Ftname=_ft;
                    var parts = Ftname.split('-');

                    // Check if there is a part after the hyphen
                    if (parts.length > 1) {

                        var name = parts[1];
                        
                    }
                  
                    
                  var typeyes=name+"-yes";
                  var typeno=name+"-no";
                  var item1 = $('<div class="field-item-table" data-type="' + _ft + '" data-type2="'+dataType+'" >');
                     item1.attr('id', id);
                     item1.text(typeyes);
                     if (__id == '') {
                     $('#id-card-field').append(item1);
                     }
                     var id = (__id != "" ? __id : _ft  + ($('#id-card-field .field-item-table').length + 1))
                     var item2 = $('<div class="field-item-table" data-type="' + _ft + '" data-type2="'+dataType+'" >');
                     item2.attr('id', id);
                     item2.text(typeno);
                     if (__id == '') {
                     $('#id-card-field').append(item2);
                     }
                    data_func_col(); 
                 }
                 else{
             
                var colname="%"+_ft+"%";
                     var id = (__id != "" ? __id : _ft  + ($('#id-card-field .field-item-table').length + 1))
                     var fg = $("<div class='form-group pb-1 mb-1 border-bottom border-dark form-item-table' data-id='" + id + "'>");
                     var _title = id;
                     var input;
                   
   
                     fg.append("<label class='control-label'>" + _title + "<a class='badge badge-danger ml-2 remove_field_col' data-id='" + id + "'> Remove</a></label>");
   
                     // Field ID NAME
                     input = $("<div class='row'>");
                     input.append('<input type="hidden" class="form-control form-control-sm rounded-0 col-7" name="text_value" data-id="' + id + '" value="' + id + '"/>');
                     fg.append(input);

                     input.append('<div class="palleon-text-wrap">');
                     // Font Color
                     input.append('<div id="text-fill-color" class="palleon-control-wrap"><label class="palleon-control-label">Color</label><div class="palleon-control"> <input id="palleon-text-color" type="text" class="palleon-colorpicker  colorpicker4" autocomplete="off"  name="font_color_col" data-id="' + id + '" /></div></div>');
                     input.append('<div class="clearfix col-12 mb-2"></div>');
                    // Width
                    input.append('<label class="palleon-control-label">FontSize</label><div class="palleon-control"><input  class="palleon-form-field" type="number" step="any" name="size_col[]" data-size="width" data-id="' + id + '"/></div></div>');
                     input.append('<div class="clearfix col-12 mb-2"></div>'); 
                     // Font Style
                     input.append('<div class="palleon-control-wrap"> <label class="palleon-control-label">Font Style</label><div class="palleon-control"> <label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="bold" name="style_col" data-id="' + id + '"/> <b>Bold</b></label><label class="palleon-control-label"> <input type="checkbox" class="palleon-form-field" value="italic" name="style_col" data-id="' + id + '"/> <i>Italic</i></label></div></div>');
                    
                     input.append('<div class="clearfix col-12 mb-2"></div>'); 
                     
                       // Border Color
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Border Color</label><div class="palleon-control"> <input class="palleon-form-field colorpicker3" name="border_color_col" data-id="' + id + '"/></div></div>');
                     input.append('<div class="clearfix col-12 mb-2"></div>');
                     // Borders
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Border</label> <div class="palleon-control"> <label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="top" name="border_col" data-id="' + id + '"/><b>Top</b></label><label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="bottom" name="border_col" data-id="' + id + '"/><b>Bottom</b></label><label class="palleon-control-label"><input type="checkbox" class="palleon-form-field" value="left" name="border_col" data-id="' + id + '"/><b>Left</b></label><label class="palleon-control-label"> <input type="checkbox" class="palleon-form-field" value="right" name="border_col" data-id="' + id + '"/><b>Right</b></label> </div></div>');
                   
                     input.append('<div class="clearfix col-12 mb-2"></div>');
       
   
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Position-Right</label><div class="palleon-control"><input class="palleon-form-field" type="number" step="any" name="position_col[]"  data-pos="top" data-id="' + id + '"/></div></div>');
                    
                     // Element Position
                    
                     input.append('<div class="palleon-control-wrap"><label class="palleon-control-label">Position-Left</label><div class="palleon-control"><input class="palleon-form-field" type="number" step="any" name="position_col[]" data-pos="left" data-id="' + id + '"/></div></div>');
                     input.append('</div>');
                     fg.append(input);
   
                     is_form_exists = $("#field-form .form-item-table[data-id='" + id + "']").length;
   
                     if (__id == "" || (__id != "" && is_form_exists <= 0))
                         $("#field-form-table").html(fg);
   
                     if (__id != "") {
                         // Additional logic for updating form fields based on existing data
                         // ...
   
                         data_func_col();  // Assuming this is a function to handle your data
                       }
                 
                     // Field Item
                     // Field Item
                     var item = $('<div class="field-item-table"  data-type="' + _ft + '" data-type2="'+dataType+'">h</div>');
                     item.attr('id', id);
                     item.text(colname);
   
                     if (__id == '') {
                         $('#id-card-field').append(item);
                        
                         var newListItem = document.createElement("li");
                           // You can add content or attributes to the new list item if needed
                           newListItem.textContent = "-Database column Added"; // Replace with the desired content

                                  // Get the reference to the ul element with the id "palleon-layers"
                                  var layersUl = document.getElementById("palleon-layers");

                                        // Append the new list item to the ul element
                                  layersUl.appendChild(newListItem);
                     }
   
                     data_func_col(); 
                    }// Assuming this is a function to handle your data
                   
               }
               function foo() {
                        $(".child").resizable({
                            minWidth: 25,
                            minHeight: 25,
                            maxWidth: $(".parent").width(),
                            containment: "parent",
                            handles: "ne,nw,se,sw,n,w,e,s"
                        });

                        $(".child").draggable({
                            containment: "parent",
                            cursor: "move"
                        });

                        var geklikt = false;
                        $(".child").click(function () {
                            if (geklikt === false) {
                                $(".child").draggable("disable"); // Disable dragging during rotation
                                rotate($(this));
                                geklikt = true;
                            } else {
                                $(".child").draggable("enable"); // Enable dragging after rotation
                                geklikt = false;
                            }
                        });

                        function rotate(element) {
                            var degree = 0;
                            element.css('transform', 'rotate(' + degree + 'deg)');

                            element.on('click', function () {
                                degree += 45;
                                $(this).css('transform', 'rotate(' + degree + 'deg)');
                            });
                        }
                        $(".delete-icon").click(function (e) {
                            e.stopPropagation();
                            $(this).closest(".child").remove();
                        });
                    }


                  
   

               function data_func2(){
                 $('.colorpicker2').colorpicker({format: 'hex'})
                 $('[name="size-image[]"]').on('input keypress keyup change',function(){
                	var el_id = $(this).attr('data-id');
                  var pos = $(this).attr('data-size')
                  var val = $(this).val()
                  $('#'+el_id).css(pos,val+"%");
                })
                 $('[name="font_color-image"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var color = $(this).val()
                   $('#'+el_id).css({"color":color});
                 })
                 $('[name="border-image"]').change(function(){
                   var pos = $(this).val()
                   var el_id = $(this).attr('data-id');
                   var _style = "border-"+pos;
                   if($(this).is(":checked") == true){
                     $('#'+el_id).css(_style,"1px solid");
                   }else{
                     $('#'+el_id).css(_style,"none");
                   }
                 })
                 $('[name="style-image"]').change(function(){
                   var val = $(this).val()
                   var style = $(this).attr('name')
                   var el_id = $(this).attr('data-id');
                   if($(this).is(":checked") == true){
                     if(val == 'bold')
                       $('#'+el_id).css("font-weight","bolder");
                     else
                       $('#'+el_id).css("font-style","italic");
                   }else{
                     if(val == 'bold')
                       $('#'+el_id).css("font-weight","unset");
                     else
                       $('#'+el_id).css("font-style","unset");
                   }
                 })
                 $('[name="border_color-image"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var color = $(this).val()
                   $('#'+el_id).css("border-color",color);
                 })
                 $('[name="text_value-image"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var txt = $(this).val()
                   $('#'+el_id).text(txt);
                 })
                 $('[name="position-image[]"]').on('input keypress keyup change',function(){
                   var el_id = $(this).attr('data-id');
                   var pos = $(this).attr('data-pos')
                   var val = $(this).val()
                   $('#'+el_id).css(pos,val+"%");
   
                 })
                 $('[name="size-image[]"]').on('input keypress keyup change',function(){
                   var el_id = $(this).attr('data-id');
                   var pos = $(this).attr('font-size')
                   var val = $(this).val()
                   $('#'+el_id).css('font-size',val+"px");
   
                 })
                 $('[name="text_align-image"]').change(function(){
                   var el_id = $(this).attr('data-id');
                   var val = $(this).val()
                   $('#'+el_id).css('text-align',val);
   
                 })
                 $('[name="filename"]').change(function(){
                 
                   var id = $(this).attr('data-id')
                   input = document.querySelector('input[name="filename"][data-id="'+id+'"]')
                   var fileSize = input.files[0].size;
                   if (fileSize > 2097152) {
                    alert("Image is bigger then 2mb!");
                   }
                   else{
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();
                       reader.onload = function (e) {
                     var _base64, type;
                     var data = e.target.result
                       data = data.split(';base64,')
                       dataType="image";
                       var elementsToRemove = document.querySelectorAll('[data-type="' + id + '"]');
                        elementsToRemove.forEach(function(element) {
                            element.parentNode.removeChild(element);
                        });
                        var elementToRemove = document.querySelector('img[data-id="'+id+'"]');
                          if (elementToRemove) {
                              elementToRemove.parentNode.removeChild(elementToRemove);
                          }
                          alert(id);
                          // $('img[data-id="'+id+'"]').attr("src",e.target.result);
                         var newDiv = $('<div class="child" data-id="'+id+'" id="'+id+'"  data-type="image"></div>').css('background-image', 'url(' + e.target.result + ')');
                          // Add a delete icon to the new div
                            var deleteIcon = $('<span class="delete-icon">&#10006;</span>');
                            newDiv.append(deleteIcon);
                         $('#id-card-field').append(newDiv);
                        foo();
                       }
   
                     reader.readAsDataURL(input.files[0]);
                   }
                  }
                 })
                 $('.remove_field_image').click(function(){
                   var id = $(this).attr('data-id')
                   $('.field-item#'+id).remove()
                   $('#field-form-image').html('')
                 }) 
                 $('.field-item').on('mousedown',function(){
                   var _ft = $(this).attr('data-type')
                   var _this = $(this)
                   show_form2(_ft,_this,_this.attr('id'))
                   var palleonText = document.getElementById('palleon-text');
                    // Make the #palleon-text element visible
                    palleonText.classList.add('panel-hide');
                    var palleonImage = document.getElementById('palleon-image');
                    // Make the #palleon-text element visible
                    palleonImage.classList.remove('panel-hide');
                    var palleonShapes = document.getElementById('palleon-shapes');
                    // Make the #palleon-text element visible
                    palleonShapes.classList.add('panel-hide');
               
               })
               }

               function data_func_col(){
                 $('.colorpicker4').colorpicker({format: 'hex'})
                 $('[name="font_color_col"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var color = $(this).val()
                   $('#'+el_id).css({"color":color});
                 })
                 $('[name="border_col"]').change(function(){
                   var pos = $(this).val()
                   var el_id = $(this).attr('data-id');
                   var _style = "border-"+pos;
                   if($(this).is(":checked") == true){
                     $('#'+el_id).css(_style,"1px solid");
                   }else{
                     $('#'+el_id).css(_style,"none");
                   }
                 })
                 $('[name="style_col"]').change(function(){
                   var val = $(this).val()
                   var style = $(this).attr('name')
                   var el_id = $(this).attr('data-id');
                   if($(this).is(":checked") == true){
                     if(val == 'bold')
                       $('#'+el_id).css("font-weight","bolder");
                     else
                       $('#'+el_id).css("font-style","italic");
                   }else{
                     if(val == 'bold')
                       $('#'+el_id).css("font-weight","unset");
                     else
                       $('#'+el_id).css("font-style","unset");
                   }
                 })
                 $('[name="border_color_col"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var color = $(this).val()
                   $('#'+el_id).css("border-color",color);
                 })
                 $('[name="text_value_col"]').on('input change keyup keypress',function(){
                   var el_id = $(this).attr('data-id');
                   var txt = $(this).val()
                   $('#'+el_id).text(txt);
                 })
                 $('[name="position_col[]"]').on('input keypress keyup change',function(){
                   var el_id = $(this).attr('data-id');
                   var pos = $(this).attr('data-pos')
                   var val = $(this).val()
                   $('#'+el_id).css(pos,val+"%");
   
                 })
                 $('[name="size_col[]"]').on('input keypress keyup change',function(){
                   var el_id = $(this).attr('data-id');
                   var pos = $(this).attr('font-size')
                   var val = $(this).val()
                   $('#'+el_id).css('font-size',val+"px");
   
                 })
                 $('[name="text_align_col"]').change(function(){
                   var el_id = $(this).attr('data-id');
                   var val = $(this).val()
                   $('#'+el_id).css('text-align',val);
   
                 })
                 $('[name="filename_col"]').change(function(){
                   var id = $(this).attr('data-id')
                   input = document.querySelector('input[name="filename"][data-id="'+id+'"]')
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();
                       reader.onload = function (e) {
                     var _base64, type;
                     var data = e.target.result
                       data = data.split(';base64,')
                         $('img[data-id="'+id+'"]').attr("src",e.target.result);
                       }
   
                     reader.readAsDataURL(input.files[0]);
                   }
                 })
                 $('.remove_field_col').click(function(){
                   var id = $(this).attr('data-id')
                   $('.field-item#'+id).remove()
                   $('#field-form-table').html('')
                 }) 
                 $(".child").resizable({
                            minWidth: 25,
                            minHeight: 25,
                            maxWidth: $(".parent").width(),
                            containment: "parent",
                            handles: "ne,nw,se,sw,n,w,e,s"
                        });
                 $('.field-item-table').on('mousedown',function(){
                   var _ft = $(this).attr('data-type')
                   var Ftype = $(this).attr('data-type2')
                   var _this = $(this)
                   if(Ftype!="boolean")
                   {
                    var palleonText = document.getElementById('palleon-text');
                    // Make the #palleon-text element visible
                    palleonText.classList.add('panel-hide');
                    var palleonImage = document.getElementById('palleon-image');
                    // Make the #palleon-text element visible
                    palleonImage.classList.add('panel-hide');
                    var palleonShapes = document.getElementById('palleon-shapes');
                    // Make the #palleon-text element visible
                    palleonShapes.classList.remove('panel-hide');
               
                   show_form_tables(_ft,_this,Ftype,_this.attr('id'))
                   }
                 if(_this.hasClass('ui-draggable') == false){
                   _this.draggable({
                     containment: "parent",
                     stop: function( event, ui ) {
                       var id = event.target.id 
                       var parent = $('#'+id).parent()
                       var p_height = parent.height()
                       var p_width = parent.width()
                       var pos = {};
                       var nt ,nl;
                       style =$('#'+id).attr('style')
                       style = style.replace(/ /g,'')
                       style = style.split(";")
                       Object.keys(style).map(k=>{
                         if(style[k] != ''){
                           prop = style[k].split(':')
                           prop1 = prop[0];
                           prop2 = !!prop[1] ? prop[1] : '';
                           pos[prop1] = prop2
                         }
                       })
                       var left = !!pos.left ? (pos.left).replace("px",'') : 0;
                       var top = !!pos.top ? (pos.top).replace("px",'') : 0;
                       
                       nt = ((parseFloat(top)/parseFloat(p_height)) * 100)
                       nl = ((parseFloat(left)/parseFloat(p_width)) * 100)
                       if(Ftype!="boolean")
                   {
                       $('input[name="position_col[]"][data-pos="top"]').val(nt).trigger("change")
                       $('input[name="position_col[]"][data-pos="left"]').val(nl).trigger("change")
                   }
                     }
                   })
                 }
               })
               }
               function showPDF(pdf_url)
               {
                 $("#pdf-loader").show();
   
                 PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
                   __PDF_DOC = pdf_doc;
                   __TOTAL_PAGES = __PDF_DOC.numPages;
                   
                   // Hide the pdf loader and show pdf container in HTML
                   $("#pdf-loader").hide();
                   $("#pdf-contents").show();
                   $("#pdf-total-pages").text(__TOTAL_PAGES);
   
                   // Show the first page
                   showPage(1);
                 }).catch(function(error) {
                   // If error re-show the upload button
                   $("#pdf-loader").hide();
                   $("#upload-button").show();
                   
                   alert(error.message);
                 });
               }
   
               function showPage(page_no)
               {
                 __PAGE_RENDERING_IN_PROGRESS = 1;
                 __CURRENT_PAGE = page_no;
                 // Disable Prev & Next buttons while page is being loaded
                 $("#pdf-next, #pdf-prev").attr('disabled', 'disabled');
                 // While page is being rendered hide the canvas and show a loading message
                 $("#pdf-canvas").hide();
                 $("#page-loader").show();
                 // Update current page in HTML
                 $("#pdf-current-page").text(page_no);
                 // Fetch the page
                 __PDF_DOC.getPage(page_no).then(function(page) {
                   // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
                   var scale_required = __CANVAS.width / page.getViewport(1).width;
                   // Get viewport of the page at required scale
                   var viewport = page.getViewport(scale_required);
                   // Set canvas height
                   __CANVAS.height = viewport.height;
                   var renderContext = {
                     canvasContext: __CANVAS_CTX,
                     viewport: viewport
                   };	
                   // Render the page contents in the canvas
                   page.render(renderContext).then(function() {
                     __PAGE_RENDERING_IN_PROGRESS = 0;
                     // Re-enable Prev & Next buttons
                     $("#pdf-next, #pdf-prev").removeAttr('disabled');
                     // Show the canvas and hide the page loader
                     //$("#pdf-canvas").show();
                     $("#page-loader").hide();	
                     var canvasDataURL = __CANVAS.toDataURL();
                     // Handle image background
                     $('#id-card-field').css({
                             'background': 'url(' + canvasDataURL + ')',
                             'background-repeat': 'no-repeat',
                             'background-size': 'cover'
                           });
                       $('[name="template_image"]').val(canvasDataURL)
                     // Create a temporary anchor element
                     var downloadLink = document.createElement('a');
                     // Set the href attribute to the canvas data URL
                     downloadLink.href = canvasDataURL;
                     // Set the download attribute to specify the file name
                     downloadLink.download = 'page.png';
                     // Append the anchor element to the document
                     document.body.appendChild(downloadLink);
                     // Simulate a click on the anchor to trigger the download
                       });
                   // Remove the anchor element from the document
                 // document.body.removeChild(downloadLink);	
                 });
               }
             
       </script>
    <!-- Scripts END -->
</body>
@include('ReportMaker.layout.footer')
<!-- Body END -->

</html>