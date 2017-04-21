/*=========================================================================================
    File Name: column-grouped.js
    Description: Dimple column grouped chart
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Theme
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Column grouped chart
// ------------------------------
$(window).on("load", function(){

    // Construct chart
    var svg = dimple.newSvg("#column-grouped", "100%", 500);


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
        myChart.setMargins(40, 10, 0, 50);


        // Create axes
        // ------------------------------

        // Horizontal
        var x = myChart.addCategoryAxis("x", ["Price Tier", "Channel"]);

        // Vertical
        var y = myChart.addPctAxis("y", "Unit Sales");

        // Construct layout
        // ------------------------------

        // Add bar
        var s = myChart.addSeries("Owner", dimple.plot.bar);

        // Assign Color
        myChart.defaultColors = [
            new dimple.color("#673AB7"),
            new dimple.color("#E91E63"),
            new dimple.color("#00BCD4"),
            new dimple.color("#FF5722"),
            new dimple.color("#FFC107"),
            new dimple.color("#009688"),
            new dimple.color("#3F51B5"),
            new dimple.color("#FFEB3B"),
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