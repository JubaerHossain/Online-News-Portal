<div style="margin-top: -12px" class="archive">
                        <h1><a href="#">World Cup 2018</a></h1>
                        <hr />
                      <?php
                         $news = new NewsAddN();
                          $facebookkothon = $news->getFacebookKothonAllNews();
                          if ($facebookkothon) {
                            while ($result = $facebookkothon->fetch_assoc()) {
                      ?>
                        <div class="col-lg-6">
                            <div class="thumbnail thumbnail_content">
                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="facebo"></a>
                                <div class="caption">
                                    <h3>
                                        <a style="height: 61px"> href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                      <?php } } ?>  

                    </div>