<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Thành viên chưa kích hoạt', <?php echo $total_user_unactive?>],
          ['Thành viên kích hoạt', <?php echo $total_user_active?>],
          ['Bài viết publish', <?php echo $total_content_active?>],
          ['Bài viết chờ duyệt', <?php echo $total_content_unactive?>]
        ]);

        // Set chart options
        var options = {'title':'Số lượng thành viên',
                       'width':700,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


<article class="module width_full">
    <header><h3>Stats</h3></header>
    <div class="module_content">
        <article class="stats_graph">
           <div id="chart_div"></div>

        </article>

        <article class="stats_overview">
            <div class="overview_today">
                <p class="overview_day">Tổng giao dịch</p>
                <p class="overview_count"><?php echo $total_trans?></p>
                <p class="overview_type">Tổng tin nhắn gửi</p>
                <p class="overview_count"><?php echo $total_message?></p>
                <p class="overview_type">tin</p>
            </div>
            <div class="overview_previous">
                <p class="overview_day">Yesterday</p>
                <p class="overview_count">1,646</p>
                <p class="overview_type">Hits</p>
                <p class="overview_count">2,054</p>
                <p class="overview_type">Views</p>
            </div>
        </article>
        <div class="clear"></div>
    </div>
</article> 