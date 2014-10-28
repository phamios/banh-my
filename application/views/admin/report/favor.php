<article class="module width_full">
    <header><h3 class="tabs_involved"> Danh sách sản phẩm được khách hàng yêu thích </h3>

    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Người thích</th> 
                        <th>Sản phẩm </th> 
                        <th>Thời điểm thích</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_favor): ?>
                        <?php foreach ($list_favor as $fav): ?>
                            <tr> 
                                <td><?php echo $fav->id;?></td>
                                <td>
                                    <?php foreach ($list_user as $user): ?>
                                        <?php if ($user->id == $fav->userid): ?>
                                            <?php echo $user->username; ?>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <?php foreach ($list_content as $content): ?>
                                        <?php if ($content->id == $fav->contentid): ?>
                                    <a href="<?php echo site_url("details/" . create_slug($content->title) . "-" . $content->id . ".html")?>"><?php echo $content->title; ?></a>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?php echo $fav->createdate;?></td>
                            </tr> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->


    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

