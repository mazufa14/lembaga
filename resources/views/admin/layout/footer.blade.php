<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Voler</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('admin/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    
    <script src="{{asset('admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>


    <script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script>
        // $(document).ready(function() {
        //     $('#table1').DataTable({
            
        //     });
        // });

        $(document).ready(function() {
            $('#table1').DataTable({
                "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Search:",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
                }

            });
            });
    </script>
</body>
</html>

<!-- blade untuk generate engine si laravel dan terhubung ke view,model dan controller -->