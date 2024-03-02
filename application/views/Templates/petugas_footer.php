

    <!-- Jquery JS-->
    <script src="<?= base_url('assets/')?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script>
     $(document).ready(function(){
 
 $('#kategori').change(function(){ 
     var id=$(this).val();
     $.ajax({
         url : "<?php echo base_url()?>Masyarakat/get_sub_kategori",
         method : "POST",
         data : {id : id},
         async : true,
         dataType : 'json',
         success: function(data){
              
             var html = '';
             var i;
             for(i=0; i<data.length; i++){
              
                 html += '<option value='+data[i].sub_kategori+'>'+data[i].sub_kategori+'</option>';
             }
             $('#sub_kategori').html(html);
            // console.dir(data);
            // console.log();    

         }
     });
     return false;
    
 }); 
  
});
</script>

    <script src="<?= base_url('assets/')?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/')?>js/scripts.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/')?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/')?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url('assets/')?>vendor/slick/slick.min.js">
    </script>
    <script src="<?= base_url('assets/')?>vendor/wow/wow.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url('assets/')?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url('assets/')?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/')?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src=" <?= base_url('assets/')?>js/main.js"></script>

</body>

</html>
<!-- end document-->
