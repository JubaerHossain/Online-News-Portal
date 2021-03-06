         <!-- news part start here -->
        <script type="text/javascript">
            $(document).ready(function () {

                $('#breaking_news').carousel({
                    interval: 2000
                });
                var current = $('#playPauseButton').attr('data-status');
                $('#playPauseButton').click(function () {
                    if (current == 'pause') {
                        current = 'play';
                        $('#breaking_news').carousel('cycle');
                        $(this).children(".glyphicon").addClass("glyphicon-play");
                        $(this).children(".glyphicon").removeClass("glyphicon-pause");
                    } else {
                        current = 'pause';
                        $('#breaking_news').carousel('pause');
                        $(this).children(".glyphicon").removeClass("glyphicon-play");
                        $(this).children(".glyphicon").addClass("glyphicon-pause");
                    }
                })
            });
        </script>
        <div class="breaking-news">
            <div class="container">
                <div class="row breaking_news-content"> 
                    <div class="col-md-12">
                        <div class="breaking_news_lbl">Breaking News</div>
                        <div id="breaking_news" class="carousel slide breaking_news_slider" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <?php
                                 $news = new NewsAddN();
                                  $breakingNews = $news->getAllBreakingNews();
                                  $i = 1;
                             foreach ($breakingNews as $slidetop_pro) {
                                        if ($i==1) {    
                             ?>
                             <div class="item active" style="transition: transform .2s ease-in-out;">
                                 <?php } else{ ?>
                                 <div class="item">
                                  <?php } ?> 
                                    <p><?php echo $slidetop_pro['title']; ?></p>

                                 </div> 
                             <?php $i++;} ?>

                             </div>
                           </div>  

                         <div class="slider_controller">
                            
                            <a class="left" href="#breaking_news" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="left" id="playPauseButton" href="javascript:void(0)" data-status="play">
                                <span class="glyphicon glyphicon glyphicon-play" aria-hidden="true"></span>
                                <span class="sr-only">Pause Play</span>
                            </a>
                            <a class="right" href="#breaking_news" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div> 

                    </div> 
                </div>
              </div>
        </div>
      </div>

        <!--Breaking news part end here-->