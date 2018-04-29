$('#form_delete').on('click', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});

// $('#upload').on('click', function(e){
//     var $form=$(this);
//     $('#crop-image').modal({ backdrop: 'static', keyboard: false })
//         .on('click', '#continue-btn', function(){
//             $form.submit();
//         });
// });

var basic = $('#crop').croppie(window.croppieSettings);
//improve code add refinement
$(function() {
    $("input:file").change(function (e){
        var comp = $(this);
      var fileName = comp.val();
      var files = e.target.files;
     // alert(files.length);
       var reader = new FileReader();

       for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }
       // Closure to capture the file information.
       reader.onload = (function(theFile) {
         return function(e) {
           // Render thumbnail.
           basic.croppie('bind', {
            url: e.target.result
        });
           
                   
         };
       })(f);
 
       // Read in the image file as a data URL.
       reader.readAsDataURL(f);
     
    }
         
      $('#crop-image').modal({ backdrop: 'static', keyboard: false })
         .on('click', '#continue-btn', function(){
            basic.croppie('result',
            window.resultSettings
            ).then(function(canvas) {
               document.getElementById('cropped').value = canvas;
               document.getElementById('thumbnail').src = canvas;
               $(function () {
                $('#crop-image').modal('hide');
             });
            });
       });

       $('#crop-image').modal({ backdrop: 'static', keyboard: false })
         .on('click', '#cancel-btn', function(){
            document.getElementById('upload').value = ""; 
            document.getElementById('thumbnail').src = "";
          //  alert('staph');
       });
    });
 });
