 
  </div>
  <!-- row ends here  -->
</div>
<!-- container-fluid ends here -->

<!-- main section ends -->
<footer class="d-inline-block w-100 bg-dark pt-3 text-white mt-4 d-print-none">
   <div class="below-footer">
      <div class="container ">
        <p class="text-center">
            Design &amp; Developed By <a href="https://nandysagar.in" target="_blank" class="text-warning">Sagar Nandy</a>
        </p>
      </div>
   </div>
</div></footer>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>DataTables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>DataTables/Buttons-2.3.3/js/buttons.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>DataTables/Buttons-2.3.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>DataTables/Buttons-2.3.3/js/buttons.html5.min.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>DataTables/Responsive-2.4.0/js/responsive.bootstrap4.min.js"></script>




<script>
//   $(document).ready( function () {
//     $('#myTable').DataTable();
// } );
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

$(document).ready(function() {
    $('#isAnnouncementTable').DataTable( {
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

$(document).ready(function() {
    $('#isBodyTable').DataTable(
        {
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
} );

$(document).ready(function() {
    $('#isExamTable').DataTable(
        {
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
} );




$(document).ready(function() {
    $('#txnHistTable').DataTable(
        {
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
} );


$(document).ready(function() {
    $('#isNoticeTable').DataTable(
        {
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
} );

$(document).ready(function() {
    $('#userTable').DataTable(
        {
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
} );

</script>



</body>

</html>