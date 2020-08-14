$(document).ready(function () {

    obtenerUsuariosTags();

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
            generarGraficoUsuariosTags(data);
        }
    });


}

function generarGraficoUsuariosTags(data) {

    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart
        var chart = am4core.create("chartdiv", am4charts.PieChart);

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
        chart.legend.valueLabels.template.text = "{category}: {value.value}";


    });

}