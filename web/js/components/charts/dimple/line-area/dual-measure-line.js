/*=========================================================================================
    File Name: dual-measure-line.js
    Description: Dimple dual measure line chart
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Theme
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Dual measure line chart
// ------------------------------
$(window).on("load", function(){

    // Construct chart
    var svg = dimple.newSvg("#dual-measure-line", "100%", 500);


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
        myChart.setMargins(40, 50, 10, 50);


        // Create axes
        // ------------------------------

        // Horizontal
        var x = myChart.addMeasureAxis("x", "Distribution");
            x.overrideMin = 20;

        // Vertical
        var y = myChart.addMeasureAxis("y", "Price");
            y.overrideMin = 50;


        // Construct layout
        // ------------------------------

        // Add line
        var s = myChart.addSeries(["Month", "Owner"], dimple.plot.line);
            s.addOrderRule("Date");
            s.aggregate = dimple.aggregateMethod.avg;
            myChart.addLegend(0, 10, "100%", "5%", "right");

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