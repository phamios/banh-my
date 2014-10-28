<article class="module width_full">
    <header><h3 class="tabs_involved"> Danh sách báo vi phạm </h3>

    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Người báo cáo</th> 
                        <th>Sản phẩm vi phạm</th> 
                        <th>Thời điểm báo</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_bad): ?>
                        <?php foreach ($list_bad as $bad): ?>
                            <tr> 
                                <td><?php echo $bad->id;?></td>
                                <td>
                                    <?php foreach ($list_user as $user): ?>
                                        <?php if ($user->id == $bad->userid): ?>
                                            <?php echo $user->username; ?>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <?php foreach ($list_content as $content): ?>
                                        <?php if ($content->id == $bad->contentid): ?>
                                    <a href="<?php echo site_url("details/" . create_slug($content->title) . "-" . $content->id . ".html")?>"><?php echo $content->title; ?></a>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?php echo $bad->createdate;?></td>
                            </tr> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->


    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

