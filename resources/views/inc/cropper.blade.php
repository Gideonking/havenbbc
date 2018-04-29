@if(isset($cropSettings))
<div class="modal" id="crop-image">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="continer">
                    <div id="crop" style="overflow:hidden">
                        <img src="" alt="">
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="continue-btn" >Continue</button>
                    <button type="button" class="btn btn-sm btn-default" id="cancel-btn" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
  
    <script>
var croppieSettings ={
    enableExif: {{$cropSettings['cropper']['enableExif']}},
    viewport: {
        width: {{$cropSettings['cropper']['viewport']['width']}},
        height: {{$cropSettings['cropper']['viewport']['height']}},
        type: '{{$cropSettings['cropper']['viewport']['type']}}'
    },
    boundary: {
        width: {{$cropSettings['cropper']['boundary']['width']}},
        height: {{$cropSettings['cropper']['boundary']['height']}}
    }
};

var resultSettings ={    
                        type: '{{$cropSettings['result']['type']}}',
                        size: {
                            width:{{$cropSettings['result']['size']['width']}},
                            height:{{$cropSettings['result']['size']['height']}}
                        }
                    };

    </script>
@endif