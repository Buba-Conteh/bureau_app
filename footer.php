<footer class="sticky-footer bg-white text-secondary">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © BcTech 2019</span>
        </div>
    </div>
</footer>

</div>

<!-- End of Footer -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<!-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="Forms.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="Api.js"></script>
<script>
    
    document.querySelector('form[name=add-customer]').addEventListener('submit', (event) => {
        
        if(document.querySelector('form input[name=first_name]').value == ''){
            // alert('first name is required');
            document.querySelector('form input[name=first_name] + span').style.display = 'block';
            document.querySelector('form input[name=first_name] + span').textContent = 'First name is required';
            // return false;
            event.preventDefault();
        }

        if(document.querySelector('form input[name=last_name]').value == ''){
            // alert('first name is required');
            document.querySelector('form input[name=last_name] + span').style.display = 'block';
            document.querySelector('form input[name=last_name] + span').textContent = 'last name is required';
            // return false;
            event.preventDefault();
        }
        if(document.querySelector('form input[name=phone]').value == ''){
            // alert('first name is required');
            document.querySelector('form input[name=phone] + span').style.display = 'block';
            document.querySelector('form input[name=phone] + span').textContent = 'Phone number is required';
            // return false;
            event.preventDefault();
        }
        if(document.querySelector('form input[name=email]').value == ''){
            // alert('first name is required');
            document.querySelector('form input[name=email] + span').style.display = 'block';
            document.querySelector('form input[name=email] + span').textContent = 'Email is required';
            // return false;
            event.preventDefault();
        }
        if(document.querySelector('form input[name=national_id]').value == ''){
            // alert('first name is required');
            document.querySelector('form input[name=national_id] + span').style.display = 'block';
            document.querySelector('form input[name=national_id] + span').textContent = 'National ID is required';
            // return false;
            event.preventDefault();
        }
        if(document.querySelector('form input[name=address]').value == ''){
            // alert('first name is required');
            document.querySelector('form input[name=address] + span').style.display = 'block';
            document.querySelector('form input[name=address] + span').textContent = 'Address is required';
            // return false;
            event.preventDefault();
        }
        
        // alert('alert');
    });


    function trigger(){
    document.querySelector('#profile_img').click();
}
function displayImage(e){
    if(e.files[0]){
        let reader = new FileReader();
        reader.onload=function(e){

        document.querySelector('#img').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        document.querySelector('#submit-profile').style.display="block";
    }
    
}


</script>

<!-- Page level custom scripts -->
<!-- <script src="js/demo/chart-area-demo.js"></script> -->
<!-- <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>