<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .chart {
            width: 100%;
            height: 500px;
        }
    </style>
</head>
<body>
    <h1>Reporte de Ventas</h1>
    <div id="chartdiv" class="chart"></div>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script>
        am5.ready(function() {
            var root = am5.Root.new("chartdiv");
            root.setThemes([am5themes_Animated.new(root)]);

            var chart = root.container.children.push(am5xy.XYChart.new(root, {}));

            var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
                baseInterval: { timeUnit: "day", count: 1 },
                renderer: am5xy.AxisRendererX.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {})
            }));

            var series = chart.series.push(am5xy.LineSeries.new(root, {
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.strokes.template.setAll({
                strokeWidth: 2
            });

            series.bullets.push(function() {
                return am5.Bullet.new(root, {
                    sprite: am5.Circle.new(root, {
                        radius: 5,
                        fill: series.get("fill")
                    })
                });
            });

            var data = <?php echo $sales; ?>;
            data = data.map(item => ({
                date: new Date(item.date).getTime(),
                value: item.value
            }));

            series.data.setAll(data);

            // Línea de límite
            var range = yAxis.createAxisRange(yAxis.makeDataItem({
                value: 500
            }));

            range.get("grid").setAll({
                stroke: am5.color(0xff0000),
                strokeWidth: 2,
                strokeOpacity: 0.5,
                strokeDasharray: [2, 2]
            });

            range.get("label").setAll({
                text: "Límite",
                inside: true,
                centerY: am5.p100,
                centerX: am5.p100,
                paddingBottom: 5,
                paddingRight: 5
            });
        });
    </script>
</body>
</html>
