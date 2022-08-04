@extends('layouts.master')

@section('content')

<style>
    #chartdiv {
      width: 100%;
      height:80%;
    }
    </style>
    
<div class="page-content">
    <h3>Dashboard</h3>
</div>
<section class="row">
    <div class="col-12 ">
        <div class="row">
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Total Kas</h6>
                                <h6 class="font-extrabold mb-0">@currency($kas)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldArrow---Up"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Kas Masuk</h6>
                                <h6 class="font-extrabold mb-0">@currency($kasMasuk)</h6>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldArrow---Down"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Kas Keluar</h6>
                                <h6 class="font-extrabold mb-0">@currency($kasPengeluaran)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>


        <div id="chartdiv"></div>

        
    </div>

</section>


<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");
    
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelX: "panX",
      wheelY: "zoomX",
      layout: root.verticalLayout,
    }));

    
    
    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(
      am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50,
        
        
        
      })
    );
    
    var data = [
    //   {
    //   "year": "2021",
    //   "europe": 22.5,
    //   "namerica": 2.5,
    //   "asia": 2.1,
    //   "lamerica": 1,
    //   "meast": 0.8,
    //   "africa": 0.4
    // }, {
    //   "year": "2022",
    //   "europe": 2.0,
    //   "namerica": 2.7,
    //   "asia": 2.2,
    //   "lamerica": 0.5,
    //   "meast": 0.4,
    //   "africa": 0.3
    // }, {
    //   "year": "2023",
    //   "europe": 2.8,
    //   "namerica": 2.9,
    //   "asia": 2.4,
    //   "lamersica": 0.3,
    //   "meast": 0.9,
    //   "africa": 0.5
    // }
    

// 



  ]
    
    chart.plotContainer.get("background").setAll({
//   stroke: am5.color(0x297373),
//   strokeOpacity: 1,
//   fill: am5.color(0x297373),
//   fillOpacity: 1,

});


chart.get("colors").set("colors", [
  am5.color(0x57caeb),
  am5.color(0x5ddab4),
  am5.color(0xff7976)

]);


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "year",
      renderer: am5xy.AxisRendererX.new(root, {
        cellStartLocation: 0.1,
        cellEndLocation: 0.9
      }),
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    xAxis.data.setAll(data);
    
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: am5xy.AxisRendererY.new(root, {
        
      })
    }));
    var yRenderer = yAxis.get("renderer");
 
yRenderer.grid.template.setAll({
  stroke: am5.color(0xadadad),
  strokeWidth:1
});
yRenderer.labels.template.setAll({
  fill: am5.color(0x25396f),
  fontSize: "1.5em"
});
var xRenderer = xAxis.get("renderer");
xRenderer.labels.template.setAll({
  fill: am5.color(0x25396f),
  fontSize: "1.5em"
});


// var tooltip = am5.Tooltip.new(root, {
//   autoTextColor: false,
//   labelText: "[bold]{name}[/]\n{valueX.formatDate()}: {valueY}"
// });

// tooltip.label.setAll({
//   fill: am5.color(0xff5566)
// });
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "year",
        autoTextColor:false

    
        
     
  
      }));
      var tooltip = am5.Tooltip.new(root, {
  getFillFromSprite: false,
  getStrokeFromSprite: true,
  autoTextColor: false,
  getLabelFillFromSprite: true,
});

// var name = am5.name.new(root,{
//     autoTextColor:false,
// })

tooltip.get("background").setAll({
  fill: am5.color(0xffffff),
  fillOpacity: 0.8,
  stroke: am5.color(0x000000),
  strokeOpacity: 0.8
});

series.set("tooltip", tooltip);
// series.set("fill",am5.color(0x000000"));
      series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}:{valueY}",
        width: am5.percent(90),
        tooltipY: 0,
        
       
      });


      
      series.data.setAll(data);
    
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      series.appear();
    
    //   series.bullets.push(function () {
    //     return am5.Bullet.new(root, {
    //       locationY: 2110,
    //       sprite: am5.Label.new(root, {
    //         text: "{valueY}",
    //         fill: root.interfaceColors.get("alternativeText"),
    //         centerY: 0,
    //         centerX: am5.p50,
    //         populateText: true
    //       })
    //     });
    //   });
    
      legend.data.push(series);
    }
    
    makeSeries("Total Kas", "europe");
    makeSeries("Kas Masuk", "namerica");
    makeSeries("Kas Keluar", "asia");
    // makeSeries("Latin America", "lamerica");
    // makeSeries("Middle East", "meast");
    // makeSeries("Africa", "africa");
    
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    
    }); // end am5.ready()


    </script>
@endsection