/*=========================================================================================
    File Name: pie-grouped-lollipop.js
    Description: Dimple pie grouped lollipop chart
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Theme
    Version: 1.0
    Author: GeeksLabs
    Author URL: http://www.themeforest.net/user/geekslabs
==========================================================================================*/

// Pie grouped lollipop chart
// ------------------------------
$(window).on("load", function(){

    // Construct chart
    var svg = dimple.newSvg("#pie-grouped-lollipop", "100%", 500);

    // Chart setup
    // ------------------------------

    d3.tsv("../../../robust-assets/demo-data/dimple/example-data.tsv", function (data) {

        // Create chart
        // ------------------------------

        // Define chart
        var myChart = new dimple.chart(svg, data);

        // Set bounds
        myChart.setBounds(0, 0, "100%", "100%");

        // Set margins
        myChart.setMargins(40, 40, 0, 50);


        // Create Pie
        // ------------------------------
        var x = myChart.addCategoryAxis("x", ["Price Tier", "Channel"]);

        var y = myChart.addMeasureAxis("y", "Unit Sales");

        myChart.addMeasureAxis("p", "Unit Sales");

        // Construct layout
        // ------------------------------

        // Add pie
        var pies = myChart.addSeries("Owner", dimple.plot.pie);
            pies.radius = 20;

        myChart.addLegend(0, 10, "100%", "5%", "right");

        // Assign Color
        myChart.defaultColors = [
            new dimple.color("#99B898"),
            new dimple.color("#FECEA8"),
            new dimple.color("#FF847C"),
            new dimple.color("#E84A5F"),
            new dimple.color("#2A363B"),
            new dimple.color("#37BC9B"),
            new dimple.color("#F6BB42"),
            new dimple.color("#3BAFDA"),
        ];

        // Add styles
        // ------------------------------

        // Font size
        x.fontSize = "12";
        y.fontSize = "12";

        // Draw
        myChart.draw();

        // Remove axis titles
        x.titleShape.remove();
        y.titleShape.remove();

        // Resize chart
        // ------------------------------

        // Add a method to draw the chart on resize of the window
        $(window).on('resize', resize);
        $(".menu-toggle").on('click', resize);

        // Resize function
        function resize() {
            setTimeout(function() {

                // Redraw chart
                myChart.draw(0, true);

                // Remove axis titles
                x.titleShape.remove();
                y.titleShape.remove();

            }, 100);
        }
    });
});