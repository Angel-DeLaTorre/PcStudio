$(document).ready(function () {

    obtenerUsuariosTags();
    obtenerProductosMasVendidos();

});

function obtenerUsuariosTags() {

    var token = $("meta[name='csrf-token']").attr("content");


    $.ajax({
        type: "post",
        data: {
            "_token": token
        },
        url: '/usersTag',

        success: function (data) {
            generarGrafico1UsuariosTags(data);
            generarGrafico2UsuariosTags(data);

        }
    });
}

function obtenerProductosMasVendidos() {
    console.log('ALGO');

    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        type: "post",
        data: {
            "_token": token
        },
        url: '/productosTop',

        success: function (data) {
            generarGraficoProductosMasVendidos(data);
        }
    });

}

//Gráfico 1
function generarGraficoProductosMasVendidos(data) {
    console.log(data);
    am4core.ready(function () {

        var category = 'producto';
        var value = 'unidades';
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartdiv1", am4charts.XYChart);
        chart.padding(40, 40, 40, 40);

        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = category;
        categoryAxis.renderer.minGridDistance = 1;
        categoryAxis.renderer.inversed = true;
        categoryAxis.renderer.grid.template.disabled = true;
        categoryAxis.renderer.grid.template.disabled = true;
        categoryAxis.renderer.labels.template.fill = am4core.color("#FFF");

        var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxis.min = 0;
        valueAxis.renderer.labels.template.fill = am4core.color("#FFF");
        valueAxis.renderer.grid.template.stroke = am4core.color("#FFF");



        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryY = category;

        series.dataFields.valueX = value;
        series.tooltipText = "{valueX.value}"
        series.columns.template.strokeOpacity = 0;
        series.columns.template.column.cornerRadiusBottomRight = 5;
        series.columns.template.column.cornerRadiusTopRight = 5;
        series.tooltip.getFillFromObject = true;
        series.tooltip.autoTextColor = false;
        series.tooltip.label.fill = am4core.color("#FFFFFF");

        var labelBullet = series.bullets.push(new am4charts.LabelBullet())
        labelBullet.label.horizontalCenter = "left";
        labelBullet.label.dx = 10;
        labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
        labelBullet.locationX = 1;
        labelBullet.label.fill = am4core.color("#FFF");

        // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });


        categoryAxis.sortBySeries = series;
        chart.data = data
    });

}



//Gráfica 2

function generarGrafico1UsuariosTags(data) {
  
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart
        var chart = am4core.create("chartdiv2", am4charts.PieChart);

        //chart.innerRadius = am4core.percent(40);
        // Add data
        chart.data = data;

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "cantidad";
        pieSeries.dataFields.category = "tag";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.propertyFields.fill = "color";
        pieSeries.colors.step = 1;


        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;
        pieSeries.labels.template.fill = am4core.color("white");
        chart.hiddenState.properties.radius = am4core.percent(0);
        pieSeries.tooltip.getFillFromObject = true;
        pieSeries.tooltip.autoTextColor = false;
        pieSeries.tooltip.label.fill = am4core.color("#FFFFFF");
        pieSeries.ticks.template.disabled = true;
        pieSeries.alignLabels = false;
        pieSeries.labels.template.text = "{value.percent.formatNumber('#.0')}%";
        pieSeries.labels.template.radius = am4core.percent(-40);
        pieSeries.labels.template.fill = am4core.color("white");
        pieSeries.labels.template.relativeRotation = 90;

        chart.legend = new am4charts.Legend();
        chart.legend.labels.template.fill = am4core.color("white");
        chart.legend.valueLabels.template.fill = am4core.color("white");
        chart.legend.valueLabels.template.text = "{value.value}";
    });
}

//Gráfica 3
function generarGrafico2UsuariosTags(data) {

    var value = 'cantidad';
    var category = 'tag';

    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartdiv3", am4charts.XYChart);

        chart.data = data;

        chart.padding(40, 40, 40, 40);

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = category;
        categoryAxis.renderer.minGridDistance = 60;
        categoryAxis.renderer.inversed = true;
        categoryAxis.renderer.grid.template.disabled = true;
        categoryAxis.renderer.labels.template.fill = am4core.color("#FFF");

        var valueAxisY = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxisY.min = 0;
        valueAxisY.extraMax = 0.1;
        valueAxisY.renderer.labels.template.fill = am4core.color("#FFF");
        valueAxisY.renderer.grid.template.stroke = am4core.color("#FFF");




        //valueAxis.rangeChangeEasing = am4core.ease.linear;
        //valueAxis.rangeChangeDuration = 1500;


        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryX = category;
        series.dataFields.valueY = value;
        series.tooltipText = "{valueY.value}"
        series.columns.template.strokeOpacity = 0;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.cornerRadiusTopLeft = 10;

        //series.interpolationDuration = 1500;
        //series.interpolationEasing = am4core.ease.linear;
        var labelBullet = series.bullets.push(new am4charts.LabelBullet());
        labelBullet.label.verticalCenter = "bottom";
        labelBullet.label.dy = -10;
        labelBullet.label.fill = am4core.color("#FFF");
        labelBullet.label.text = "{values.valueY.workingValue.formatNumber('#.')}";

        chart.zoomOutButton.disabled = true;

        // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        setInterval(function () {
            am4core.array.each(chart.data, function (item) {
                item.visits += Math.round(Math.random() * 200 - 100);
                item.visits = Math.abs(item.visits);
            })
            chart.invalidateRawData();
        }, 2000)

        categoryAxis.sortBySeries = series;

    });
}