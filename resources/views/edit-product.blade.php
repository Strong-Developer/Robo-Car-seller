@extends('layout-old')
@section('content')
<link rel="stylesheet" href="afterlogin_assets/fileupload/fileinput.css">
<style type="text/css">
  .panel{margin-bottom:20px;background-color:#fff;border:1px solid transparent;border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}.panel-body{padding:15px}.panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px}.panel-heading>.dropdown .dropdown-toggle{color:inherit}.panel-title{margin-top:0;margin-bottom:0;font-size:16px;color:inherit}.panel-title>.small,.panel-title>.small>a,.panel-title>a,.panel-title>small,.panel-title>small>a{color:inherit}.panel-footer{padding:10px 15px;background-color:#f5f5f5;border-top:1px solid #ddd;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.list-group,.panel>.panel-collapse>.list-group{margin-bottom:0}.panel>.list-group .list-group-item,.panel>.panel-collapse>.list-group .list-group-item{border-width:1px 0;border-radius:0}.panel>.list-group:first-child .list-group-item:first-child,.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child{border-top:0;border-top-left-radius:3px;border-top-right-radius:3px}.panel>.list-group:last-child .list-group-item:last-child,.panel>.panel-collapse>.list-group:last-child .list-group-item:last-child{border-bottom:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child{border-top-left-radius:0;border-top-right-radius:0}.panel-heading+.list-group .list-group-item:first-child{border-top-width:0}.list-group+.panel-footer{border-top-width:0}.panel>.panel-collapse>.table,.panel>.table,.panel>.table-responsive>.table{margin-bottom:0}.panel>.panel-collapse>.table caption,.panel>.table caption,.panel>.table-responsive>.table caption{padding-right:15px;padding-left:15px}.panel>.table-responsive:first-child>.table:first-child,.panel>.table:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child,.panel>.table:first-child>thead:first-child>tr:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table:first-child>thead:first-child>tr:first-child th:first-child{border-top-left-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table:first-child>thead:first-child>tr:first-child th:last-child{border-top-right-radius:3px}.panel>.table-responsive:last-child>.table:last-child,.panel>.table:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child{border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child{border-bottom-right-radius:3px}.panel>.panel-body+.table,.panel>.panel-body+.table-responsive,.panel>.table+.panel-body,.panel>.table-responsive+.panel-body{border-top:1px solid #ddd}.panel>.table>tbody:first-child>tr:first-child td,.panel>.table>tbody:first-child>tr:first-child th{border-top:0}.panel>.table-bordered,.panel>.table-responsive>.table-bordered{border:0}.panel>.table-bordered>tbody>tr>td:first-child,.panel>.table-bordered>tbody>tr>th:first-child,.panel>.table-bordered>tfoot>tr>td:first-child,.panel>.table-bordered>tfoot>tr>th:first-child,.panel>.table-bordered>thead>tr>td:first-child,.panel>.table-bordered>thead>tr>th:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,.panel>.table-responsive>.table-bordered>thead>tr>td:first-child,.panel>.table-responsive>.table-bordered>thead>tr>th:first-child{border-left:0}.panel>.table-bordered>tbody>tr>td:last-child,.panel>.table-bordered>tbody>tr>th:last-child,.panel>.table-bordered>tfoot>tr>td:last-child,.panel>.table-bordered>tfoot>tr>th:last-child,.panel>.table-bordered>thead>tr>td:last-child,.panel>.table-bordered>thead>tr>th:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,.panel>.table-responsive>.table-bordered>thead>tr>td:last-child,.panel>.table-responsive>.table-bordered>thead>tr>th:last-child{border-right:0}.panel>.table-bordered>tbody>tr:first-child>td,.panel>.table-bordered>tbody>tr:first-child>th,.panel>.table-bordered>thead>tr:first-child>td,.panel>.table-bordered>thead>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,.panel>.table-responsive>.table-bordered>thead>tr:first-child>td,.panel>.table-responsive>.table-bordered>thead>tr:first-child>th{border-bottom:0}.panel>.table-bordered>tbody>tr:last-child>td,.panel>.table-bordered>tbody>tr:last-child>th,.panel>.table-bordered>tfoot>tr:last-child>td,.panel>.table-bordered>tfoot>tr:last-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th{border-bottom:0}.panel>.table-responsive{margin-bottom:0;border:0}.panel-group{margin-bottom:20px}.panel-group .panel{margin-bottom:0;border-radius:4px}.panel-group .panel+.panel{margin-top:5px}.panel-group .panel-heading{border-bottom:0}.panel-group .panel-heading+.panel-collapse>.list-group,.panel-group .panel-heading+.panel-collapse>.panel-body{border-top:1px solid #ddd}.panel-group .panel-footer{border-top:0}.panel-group .panel-footer+.panel-collapse .panel-body{border-bottom:1px solid #ddd}.panel-default{border-color:#ddd}.panel-default>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd}.panel-default>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ddd}.panel-default>.panel-heading .badge{color:#f5f5f5;background-color:#333}.panel-default>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ddd}.panel-primary{border-color:#337ab7}.panel-primary>.panel-heading{color:#fff;background-color:#337ab7;border-color:#337ab7}.panel-primary>.panel-heading+.panel-collapse>.panel-body{border-top-color:#337ab7}.panel-primary>.panel-heading .badge{color:#337ab7;background-color:#fff}.panel-primary>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#337ab7}.panel-success{border-color:#d6e9c6}.panel-success>.panel-heading{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.panel-success>.panel-heading+.panel-collapse>.panel-body{border-top-color:#d6e9c6}.panel-success>.panel-heading .badge{color:#dff0d8;background-color:#3c763d}.panel-success>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#d6e9c6}.panel-info{border-color:#bce8f1}.panel-info>.panel-heading{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.panel-info>.panel-heading+.panel-collapse>.panel-body{border-top-color:#bce8f1}.panel-info>.panel-heading .badge{color:#d9edf7;background-color:#31708f}.panel-info>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#bce8f1}.panel-warning{border-color:#faebcc}.panel-warning>.panel-heading{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.panel-warning>.panel-heading+.panel-collapse>.panel-body{border-top-color:#faebcc}.panel-warning>.panel-heading .badge{color:#fcf8e3;background-color:#8a6d3b}.panel-warning>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#faebcc}.panel-danger{border-color:#ebccd1}.panel-danger>.panel-heading{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.panel-danger>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ebccd1}.panel-danger>.panel-heading .badge{color:#f2dede;background-color:#a94442}.panel-danger>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ebccd1}.panel-body:after,.panel-body:before,.row:after,.row:before{display:table;content:" "}.btn-group-vertical>.btn-group:after,.btn-toolbar:after,.clearfix:after,.container-fluid:after,.container:after,.dl-horizontal dd:after,.form-horizontal .form-group:after,.modal-footer:after,.modal-header:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.pager:after,.panel-body:after,.row:after{clear:both}
</style>

<div class="row">
   <div class="col-md-12 pr-0">
      <div class="card">
         <div class="card-body">
            <section class="dark-grey-text">
                {{\App\Http\Controllers\PagesHandler::notification()}}
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    Update your Product
                  </div>
                  <div class="panel-body">
                    @if(! empty($errors_seller) && $errors_seller > 0 )
                      <div class="alert alert-danger">
                         {{$errors_seller}} Products failed to import
                      </div>
                    @endif
                    <form action="{{route('editProduct.submit')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="pid" value="{{$product->id}}">
                      <input type="hidden" name="request_id" value="{{$product->request_id}}">
                      <div class="panel panel-info">
                        <div class="panel-heading">Product Information</div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  @if($errors->has('category'))
                                  <div class="alert alert-danger">
                                     {{$errors->first('category')}}
                                  </div>
                                  @endif
                                  <select required name="category" onchange="setAttributes(this.value)" class="custom-select" style="display: block
                                     !important;">
                                     <option value="">Select Category *</option>
                                     <option @if($product->category=="Automobiles") selected="" @endif>Automobiles</option>
                                     <option @if($product->category=="Electronics") selected="" @endif>Electronics</option>
                                     <option @if($product->category=="Appliances") selected="" @endif>Appliances</option>
                                     <option>Equity Offering</option>
                                     <option @if($product->category=="Outdoor Sports") selected="" @endif>Outdoor Sports</option>
                                     <option>Miscellaneous</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  @if($errors->has('product_title'))
                                  <div class="alert alert-danger">
                                     {{$errors->first('product_title')}}
                                  </div>
                                  @endif
                                  <input type="text" class="form-control" placeholder="Product Title *" required
                                     value="{{$product->product_title}}"         name="product_title">
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  @if($errors->has('upc_product_code'))
                                  <div class="alert alert-danger">
                                     {{$errors->first('upc_product_code')}}
                                  </div>
                                  @endif
                                  <input type="text" class="form-control" placeholder="Product Code (UPC or SKU or  VIN) *" value="{{$product->upc_product_code}}" required name="upc_product_code" readonly>
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  <input type="text" class="form-control" placeholder="URL(More Information)
                                     (Optional)"
                                     name="url" value="{{$product->url}}">
                               </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <textarea class="form-control" placeholder="Enter Some Product Description to Proceed" rows="5" id="product_description" name="product_description">{{$product->product_description}}</textarea>
                              </div>
                            </div>
                            <!-- image view -->
                            <div align="center" id="img-contaioner">
                              <div class="col-md-12">
                                <div class="form-group">
                                  @foreach($product->images as $image)
                                  <img src="{{$image->main_file_path}}" width="200px">
                                  @endforeach
                                </div>
                                <div class="form-group">
                                  <button type="button" class="btn btn-success remove-img"><i class="fa fa-plus"></i>Add New Images</button>
                                </div>
                              </div>
                            </div>
                            <!-- File Upload Section -->
                            <div id="pic">
                              <div class="col-md-12">
                                 <p class="font-weight-bold pb-2">Upload 5-6 photos ( at least 1 photo is required)</p>
                              </div>
                                <div class="col-md-12">
                                <span class="btn btn-default btn-file">
                                    <input id="input-1" name="product_img[]" type="file" accept="image/*"  class="file form-control" multiple data-show-upload="true" data-show-caption="true">
                                </span>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            </div> -->
                          </div>
                        </div>
                      </div>

                      <div class="panel panel-warning">
                        <div class="panel-heading">Product Attributes</div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-2">
                               <div class="form-group">
                                  <input type="text" class="form-control" id="attributeId_1" placeholder="Attribute 1 / Make  (Optional)"
                                     name="make"
                                     value="{{$product->make}}">
                               </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                  <input type="text" class="form-control" id="attributeId_2" placeholder="Attribute 2 / Model(Optional)"
                                     name="model"
                                     value="{{$product->model}}">
                               </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                  <input type="text" class="form-control" id="attributeId_3" placeholder="Attribute 3/Condition (Optional)"
                                     name="condition" value="{{$product->condition}}">
                               </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                  <input type="text" class="form-control" id="attributeId_4" placeholder="Attribute 4/Color (Optional)"
                                     name="color"
                                     value="{{$product->color}}">
                               </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                  <input type="text" class="form-control" id="attributeId_5" placeholder="Attribute 5/Size (Optional)"
                                     name="size"
                                     value="{{$product->size}}">
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="panel panel-danger">
                        <div class="panel-heading">Deal Information</div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  @if($errors->has('price'))
                                  <div class="alert alert-danger">
                                     {{$errors->first('price')}}
                                  </div>
                                  @endif
                                  <input type="text" class="form-control" placeholder="Listing Price (USD) *"
                                     name="price"
                                     required value="{{$product->price}}">
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Special RoboNegotiator Deal  Price *" name="special_deal_price" value="{{$product->special_deal_price}}">
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  @if($errors->has('lowest_price'))
                                  <div class="alert alert-danger">
                                     {{$errors->first('lowest_price')}}
                                  </div>
                                  @endif
                                  <input type="text" class="form-control" placeholder="Provide us the lowest price  at which you would like to sell if we need to  negotiate further? @if(Auth::user
                                  ()->negotiation !== 'auto') (Optional) @else  *  @endif" name="lowest_price"
                                  @if(Auth::user()->negotiation === 'auto') required  @endif   value="{{$product->lowest_price
                                  }}">
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  @if($errors->has('seller_original_quantity'))
                                  <div class="alert alert-danger">
                                     {{$errors->first('seller_original_quantity')}}
                                  </div>
                                  @endif
                                  <input type="text" class="form-control" placeholder="Quantity Available for this deal *" required name="seller_original_quantity" value="{{$product->seller_original_quantity}}">
                               </div>
                            </div>
                            <input type="hidden" name="api_key" value="f07862522e9585ffd7ca6a6138ec262480b0d91f">
                            <div class="col-md-6">
                               <div class="form-group">
                                  @if($errors->has('deal_expiry_date'))
                                  <div class="alert alert-danger">
                                     {{$errors->first('deal_expiry_date')}}
                                  </div>
                                  @endif
                                  <input type="text" onfocus="(this.type='date')" class="form-control" placeholder="Deal Expiry Date *"
                                     id="datePicker" name="expiry_date" value="{{$product->deal_expiry_date}}" required>
                               </div>
                            </div>
                          </div>
                        </div>
                          <div class="panel panel-primary">
                              <div class="panel-heading">Negotiation</div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label><input type="radio" name="negotiation" @if($product->negotiation_mode == "classic") checked @endif value="classic"   style="padding-right: 5px; color: #fff;"> &nbsp;I would like to negotiate myself.</label>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label><input type="radio" name="negotiation" @if($product->negotiation_mode == "auto") checked @endif value="auto" style="padding-right: 5px; color: #fff"> &nbsp;I would like RoboNegotiator to expedite/do negotiations.</label>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <button id="up_button" onclick="disable_upload_button()" class="btn btn-lg btn-block" style="background-color: #00aeef; color: #fff;">
                              <i class="fa fa-check"></i>
                              UPLOAD DEAL
                          </button>
                      </div>
                    </form>
                  </div>
                </div>
            </section>
         </div>
      </div>
   </div>
</div>

<style>
/***************** datepicker *******************/
.form-control{border-color: #00aeef;}

/***************** drag and drop *******************/
 .container {
  padding: 30px 4%;
}

.box {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}

.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}

.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}

</style>
<script src="afterlogin_assets/fileupload/fileinput.js"></script>
<script>
    function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var htmlPreview =
        '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

/*$(".dropzone").change(function() {
  readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
  var boxZone = $(this).parents('.preview-zone').find('.box-body');
  var previewZone = $(this).parents('.preview-zone');
  var dropzone = $(this).parents('.form-group').find('.dropzone');
  boxZone.empty();
  previewZone.addClass('hidden');
  reset(dropzone);
});*/

/*Code Made By Subhagata Mandal*/
function setAttributes(category){
  autoArray = ['','','','',''];
  if (category == 'Automobiles') {
    autoArray = ['Make','Model','Miles','Year','Color'];
  }
  else if(category == 'Electronics'){
    autoArray = ['Subcategory','Brand','Model','Condition','Other Info'];
  }
  else if(category == 'Equity Offering'){
    autoArray = ['Company','Funding Round','Industry','Patents','Revenue'];
  }
  else if(category == 'Appliances'){
    autoArray = ['Make','Model','Size','Color','Condition'];
  }
  else if(category == 'Industrial'){
    autoArray = ['Make','Model','Condition','Color','Size'];
  }
  else if(category == 'Furniture'){
    autoArray = ['Make','Model','Condition','Color','Size'];
  }
  else if(category == 'Miscellaneous'){
    autoArray = ['Attribute1','Attribute2','Attribute3','Attribute4','Attribute5'];
  }
  for (var i = 1; i <= 5; i++) {
    var attributePassingId = '#attributeId_'+i;
    $(attributePassingId).attr("placeholder", autoArray[i-1]);
  }
}

</script>

<!------- date picker--------->
<script>
    $(function () {
  $("#datepicker").datepicker({
        autoclose: true,
        todayHighlight: true
  }).datepicker('update', new Date());
});

$('#pic').hide();
$('.remove-img').on("click", function(){
  $("#img-contaioner").hide();
  $('#pic').show();
});

    function disable_upload_button() {
        $('#up_button').css('display', 'none');
        $('#up_button').prop('disabled', true);
        setTimeout(function () {
            $('#up_button').css('display', 'block');
        }, 5000)
    }
</script>

@endsection
