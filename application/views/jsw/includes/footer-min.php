<script src="<?php echo base_url();?>Theme/assets/js/data-table/datatables.min.js"></script>
<script src="<?php echo base_url();?>Theme/assets/js/data-table/datatables-init.js"></script>
<script src="<?php echo base_url();?>Theme/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Theme/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Theme/assets/js/plugins/perfect-scrollbar.jquery.min.js" ></script>
<script src="<?php echo base_url();?>Theme/assets/js/plugins/sweetalert2.js"></script>
 <!--Forms Validations Plugin--> 
<script src="<?php echo base_url();?>Theme/assets/js/plugins/jquery.validate.min.js"></script>
<script async defer src="<?php echo base_url();?>Theme/assests/js/buttons.js"></script>
  <!--Notifications Plugin-->    
<script src="<?php echo base_url();?>Theme/assets/js/plugins/bootstrap-notify.js"></script>
<script src="<?php echo base_url();?>Theme/assets/js/material-dashboard.min40a0.js?v=2.0.2" type="text/javascript"></script>
 <!--Sharrre libray--> 
<script src="<?php echo base_url();?>Theme/assets/demo/jquery.sharrre.js"></script>
 <script type="text/javascript">

    var button = document.querySelector('#fullscreen');
    button.addEventListener('click', fullscreen);
    // when you are in fullscreen, ESC and F11 may not be trigger by keydown listener.
    // so don't use it to detect exit fullscreen
    document.addEventListener('keydown', function (e) {
        console.log('key press' + e.keyCode);
    });
    // detect enter or exit fullscreen mode
    document.addEventListener('webkitfullscreenchange', fullscreenChange);
    document.addEventListener('mozfullscreenchange', fullscreenChange);
    document.addEventListener('fullscreenchange', fullscreenChange);
    document.addEventListener('MSFullscreenChange', fullscreenChange);

    function fullscreen() {
        // check if fullscreen mode is available
        if (document.fullscreenEnabled ||
          document.webkitFullscreenEnabled ||
          document.mozFullScreenEnabled ||
          document.msFullscreenEnabled) {

            // which element will be fullscreen
            var iframe = document.querySelector('#frame');
            // Do fullscreen
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.webkitRequestFullscreen) {
                iframe.webkitRequestFullscreen();
            } else if (iframe.mozRequestFullScreen) {
                iframe.mozRequestFullScreen();
            } else if (iframe.msRequestFullscreen) {
                iframe.msRequestFullscreen();
            }
        }
        else {
            document.querySelector('.error').innerHTML = 'Your browser is not supported';
        }
    }

    function fullscreenChange() {
        if (document.fullscreenEnabled ||
             document.webkitIsFullScreen ||
             document.mozFullScreen ||
             document.msFullscreenElement) {
            console.log('enter fullscreen');
        }
        else {
            console.log('exit fullscreen');
        }
        // force to reload iframe once to prevent the iframe source didn't care about trying to resize the window
        // comment this line and you will see
        var iframe = document.querySelector('iframe');
        iframe.src = iframe.src;
    }
</script>
<script>
    $(document).ready(function(){
    var sess = sessionStorage.getItem("divShow");
          $("#"+sess).show();
    });
    </script>