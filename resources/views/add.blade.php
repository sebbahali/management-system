<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style1.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title> </title>



</head>

<body>
    <div class="container">
        <header> إضافة المنتج </header>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title"> تفاصيل المنتج </span>

                    @csrf
                    <div class="fields">
                        <div class="input-field">
                            <label>اسم المنتج
</label>
                            <input name='affiliate_first_name' type="text" 
                                required>
                        </div>
                        <div class="input-field">
                            <label>وصف المنتج
</label>
                            <input name="product_name" type="text" placeholder=""
                                required>
                        </div>



                        <div class="input-field">
                            <label>الوصف الإعلاني
</label>
                            <input name='description_ad' type="text" placeholder="" required>
                        </div>
                        <div class="input-field">
                            <label>أقل سعر
</label>
                            <input name='min_price' type="number"  required>
                        </div>

                        <div class="input-field">
                            <label> أعلى سعر
</label>
                            <input name='max_price' type="text" required>
                        </div>

                                <div class="input-field">
                                    <label>السعر المتوسط
 </label>
                                    <input name='average_price' type="text"  required>
                                </div>

                                <div class="input-field">
                                    <label>عمولة المسوق
 </label>
                                    <input name='affilate_commision' type="text"  required>
                                </div>

                                <div class="col-xxl-12 col-md-12 mb-4">
                                    <div class="file-drop-area">
                                        <br>

                                        <span class="choose-file-button">    إضافة صورة رئيسية
</span>
                                        <span class="file-message">إضافة</span>
                                        <br>
                                        <br>
                                        <input type="file" name="image"class="file-input"
                                            accept=".jfif,.jpg,.jpeg,.png,.gif" required multiple>

                                    </div>

                                    <div id="divImageMediaPreview">

                                    </div>
                                </div>
                                <div class="row">
                            <div class="col-md-8">
                          <!-- .form-group --><div class="input-group realprocode control-group lst increment" >
                                   <input type="file" name="filenames[]" class="myfrm form-control">
                                   <div class="input-group-btn"> 
                                     <button class="btn btn-success" type="button"> <i class="fldemo glyphicon glyphicon-plus"></i>إضافة</button>
                                   </div>
                                 </div><div class="clone hide">
                                   <div class="realprocode control-group lst input-group" style="margin-top:10px">
                                     <input type="file" name="filenames[]" class="myfrm form-control" >
                                     <div class="input-group-btn"> 
                                       <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> حدف</button>
                                     </div>
                                   </div>
                                 </div>
                                 
                            </div>


                            </div>

                            <button>
                                <span class="submit" type='submit'> إضافة</span>

                            </button>
                        </div>
                    </div>


        </form>
    </div>

    <script></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".realprocode").remove();
      });
    });
</script>
<script type="text/javascript">
    $(document).on('change', '.file-input', function() {
    
    
    var filesCount = $(this)[0].files.length;
    
    var textbox = $(this).prev();
    
    if (filesCount === 1) {
    var fileName = $(this).val().split('\\').pop();
    textbox.text(fileName);
    } else {
    textbox.text(filesCount + ' files selected');
    }
    
    
    
    if (typeof (FileReader) != "undefined") {
    var dvPreview = $("#divImageMediaPreview");
    dvPreview.html("");            
    $($(this)[0].files).each(function () {
    var file = $(this);                
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = $("<img />");
            img.attr("style", "width: 150px; height:100px; padding: 10px");
            img.attr("src", e.target.result);
            dvPreview.append(img);
        }
        reader.readAsDataURL(file[0]);                
    });
    } else {
    alert("This browser does not support HTML5 FileReader.");
    }
    
    
    });
    </script>
</body>

</html>
