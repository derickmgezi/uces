                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer" class="my-jumbotron">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div style="text-align: center;height: 60px;">
                        <br>
                        <p class="text-muted">
                            <strong class="text-primary">Designed by UCES Team &copy; 2014</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script("js/jquery-1.10.2.min.js")}}
    {{HTML::script("js/bootstrap.min.js")}}
    
<!--    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body></html>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
    </script>-->
    
    @if(Session::has('editQuestion'))
        <script>
                $('#editQuestion').fadeIn(100,function(){
                    $('#editQuestion').modal('show');
                });
        </script>
    @endif
    
</body>

<!-- Mirrored from getbootstrap.com/examples/sticky-footer/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 12 Dec 2013 12:15:08 GMT -->
</html>