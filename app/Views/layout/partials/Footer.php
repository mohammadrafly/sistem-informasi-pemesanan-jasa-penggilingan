                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <span id="current-year"></span>. SIPJP
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Dibuat dengan <i class="mdi mdi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

                <script>
                // JavaScript code to get the current year
                var currentYear = new Date().getFullYear();

                // Insert the current year into the HTML element
                document.getElementById("current-year").innerHTML = currentYear;
                </script>