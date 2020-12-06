
  <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


  <script src="<?=url()?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=url()?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- <?=url()?>Vendor JS       -->
    <script src="<?=url()?>vendor/slick/slick.min.js">
    </script>
    <script src="<?=url()?>vendor/wow/wow.min.js"></script>
    <script src="<?=url()?>vendor/animsition/animsition.min.js"></script>
    <script src="<?=url()?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=url()?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=url()?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=url()?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=url()?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=url()?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=url()?>vendor/select2/select2.min.js">
    </script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.js"></script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="<?=url()?>js/main.js"></script>
    <script>
        function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
    </script>
    <script>
        function showTime2(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay2").innerText = time;
    document.getElementById("MyClockDisplay2").textContent = time;
    
    setTimeout(showTime2, 1000);
    
}

showTime2();
    </script>
</body>

</html>
<!-- end document-->