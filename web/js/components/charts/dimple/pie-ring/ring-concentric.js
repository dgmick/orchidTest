/*=========================================================================================
    File Name: ring-concentric.js
    Description: Dimple ring concentric chart
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Theme
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Ring concentric chart
// ------------------------------
$(window).on("load", function(){

    // Construct chart
    var svg = dimple.newSvg("#ring-concentric", "100%", 500);

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
        myChart.addMeasureAxis("p", "Unit Sales");

        // Construct layout
        // ------------------------------

        // Add pie
        var outerRing = myChart.addSeries("Channel", dimple.plot.pie);
        var innerRing = myChart.addSeries("Price Tier", dimple.plot.pie);

        // Negatives are calculated from outside edge, positives from center
        outerRing.innerRadius = "-30px";
        innerRing.outerRadius = "-40px";
        innerRing.innerRadius = "-70px";

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

        // Draw
        myChart.draw();

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

            }, 100);
        }
    });
});